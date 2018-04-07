<?php
    header('Content-type:application/json;charset=utf-8');
    spl_autoload_register(function($class) {
        include_once('../../PHP-Classes/' . $class . '.class.php');
    });

    $SlackURL = "https://hooks.slack.com/services/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";

    function EncodeAndExit($out) { echo json_encode($out); exit(); }
    $Data = array();

    $output = array(
        "Error" => null,
        "Data" => ''
    );
    $DB = new DB();
    $CONN = $DB->Connect('Darnel-K');
    $Slack = new Slack($SlackURL);

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
    $Data['Date'] = date("Y-m-d");
    $Data['Time'] = date("h:i:s A T");
    $Data['Slack_Sent'] = 0;
    $Data['Color'] = '#2F2F2F';

    $SlackData = array(
        array(
        'username' => $Data['FName'],
        'attachments' => array([
            'fallback' => $Data['Subject'],
            'pretext' => $Data['Date'] . ' ' . $Data['Time'] . ': Message From ' . $Data['FName'],
            'color' => $Data['Color'],
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
                ),
                array(
        'username' => $Data['FName'],
        'attachments' => array([
            'fallback' => $Data['Subject'],
            'pretext' => $Data['Date'] . ' ' . $Data['Time'] . ': Message From ' . $Data['FName'],
            'color' => $Data['Color'],
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
    )
    );

    $result = $Slack->SendMultiple($SlackData);

    if ($result) {
        $Data['Slack_Sent'] = 1;
    }

    $SQL = "INSERT INTO Contact_Submissions (FUll_Name, Email, Subject, MSG, Slack_Sent, Date_Added) VALUES ('{$Data['FName']}', '{$Data['Email']}', '{$Data['Subject']}', '{$Data['MSG']}', '{$Data['Slack_Sent']}', '{$Data['Date']}')";
    if ($CONN['Connection']->query($SQL) === TRUE) {
        $output['Error'] = ($Data['Slack_Sent'] == 0 ? 'Unable to send to slack, will try again later.' : null);
        $output['Data'] = ($Data['Slack_Sent'] == 1 ? 'Message stored & sent to slack successfully.' : 'Message stored but not sent to slack.');
    } else {
        $output['Error'] = ($Data['Slack_Sent'] == 0 ? 'Something went wrong, your message was not stored or sent to slack.' : 'Something went wrong, your message could not be stored but has been sent to slack.');
        $output['Data'] = null;
    }
    $output['Data'] = $result;
    EncodeAndExit($output);
?>