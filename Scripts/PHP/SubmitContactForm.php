<?php
    header('Content-type:application/json;charset=utf-8');
    spl_autoload_register(function($class) {
        include_once('../../PHP-Classes/' . $class . '.class.php');
    });

    $SLACK = array(
        "URL" => "https://hooks.slack.com/services/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",
        "Color" => '#2F2F2F',
        "Date" => date("Y-m-d"),
        "Time" => date("h:i:s A T"),
        "Sent" => 0
    );

    function EncodeAndExit($out) { echo json_encode($out); exit(); }
    $Data = array();

    $output = array(
        "Error" => null,
        "Data" => ''
    );
    $DB = new DB();
    $CONN = $DB->Connect('Darnel-K');

    if ($CONN['Error'] != null || $CONN['ErrNo'] != null) {
        $output['Error'] = $CONN['Error'];
        $output['ErrNo'] = $CONN['ErrNo'];
        EncodeAndExit($output);
    }

    if (isset($_POST['Form_Data'])) {
        $Data = $_POST['Form_Data'];
    } else {
        $output['Error'] = 'Form Data Not Received!';
        EncodeAndExit($output);
    }

    foreach ($Data as $k => $v) {
        $Data[$k] = $CONN['Connection']->real_escape_string($v);
    }

    $Data['FName'] = ucwords($Data['FName']);
    $Data['Email'] = strtolower($Data['Email']);
    $Data['Subject'] = ucfirst($Data['Subject']);
    $Data['MSG'] = ucfirst($Data['MSG']);

    $SlackData = array(
        'username' => $Data['FName'],
        'attachments' => array([
            'fallback' => $Data['Subject'],
            'pretext' => $SLACK['Date'] . ' ' . $SLACK['Time'] . ': Message From ' . $Data['FName'],
            'color' => $SLACK['Color'],
            'fields' => array(
                [
                    'title' => 'Email',
                    'value' => $Data['Email'],
                    'short' => false
                ],
                [
                    'title' => 'Subject',
                    'value' => $Data['Subject'],
                    'short' => false
                ],
                [
                    'title' => 'Message',
                    'value' => $Data['MSG'],
                    'short' => false
                ]
            )
        ])
    );

    $SlackData = json_encode($SlackData);

    $ch = curl_init($SLACK['URL']);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $SlackData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($SlackData))
    );

    $result = curl_exec($ch);

    if ($result) {
        $SLACK['Sent'] = 1;
    }

    $SQL = "INSERT INTO Contact_Submissions (FUll_Name, Email, Subject, MSG, Slack_Sent, Date_Added) VALUES ('{$Data['FName']}', '{$Data['Email']}', '{$Data['Subject']}', '{$Data['MSG']}', '{$SLACK['Sent']}', '{$SLACK['Date']}')";
    if ($CONN['Connection']->query($SQL) === TRUE) {
        $output['Error'] = ($SLACK['Sent'] == 0 ? 'Unable to send to slack, will try again later.' : null);
        $output['Data'] = ($SLACK['Sent'] == 1 ? 'Message stored & sent to slack successfully.' : 'Message stored but not sent to slack.');
    } else {
        $output['Error'] = ($SLACK['Sent'] == 0 ? 'Something went wrong, your message was not stored or sent to slack.' : 'Something went wrong, your message could not be stored but has been sent to slack.');
        $output['Data'] = null;
    }
    EncodeAndExit($output);
?>