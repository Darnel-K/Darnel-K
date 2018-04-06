<?php
    header('Content-type:application/json;charset=utf-8');
    spl_autoload_register(function($class) {
        include_once('../../PHP-Classes/' . $class . '.class.php');
    });

    $SLACK = array(
        "URL" => "https://hooks.slack.com/services/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",
        "Color" => '#2F2F2F',
        "Date" => date("Y-m-d"),
        "Time" => date("h:i:s A T")
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

    $output["Data"] = curl_exec($ch);

    // $SQL = "SELECT ID, FingerprintID FROM Fingerprint_Data WHERE FingerprintID = '{$Data['FP']}'";
    // if ($CONN['Connection']->query($SQL)->num_rows <= 0) {
    //     $Data['FP_Data']['Date'] = date("Y-m-d");
    //     $SQL = "INSERT INTO Fingerprint_Data (FingerprintID, User_Agent, Language, Color_Depth, Pixel_Ratio, Hardware_Concurrency, Resolution, Available_Resolution, Timezone_Offset, CPU_Class, Navigator_Platform, Regular_Plugins, Canvas, WebGL, AdBlock, Has_Lied_Languages, Has_Lied_Resolution, Has_Lied_OS, Has_Lied_Browser, Touch_Support, JS_Fonts, First_Visit_Date, WebGL_Vendor, Do_Not_Track) VALUES ('{$Data['FP']}', '{$Data['FP_Data']['user_agent']}', '{$Data['FP_Data']['language']}', '{$Data['FP_Data']['color_depth']}', '{$Data['FP_Data']['pixel_ratio']}', '{$Data['FP_Data']['hardware_concurrency']}', '{$Data['FP_Data']['resolution']}', '{$Data['FP_Data']['available_resolution']}', '{$Data['FP_Data']['timezone_offset']}', '{$Data['FP_Data']['cpu_class']}', '{$Data['FP_Data']['navigator_platform']}', '{$Data['FP_Data']['regular_plugins']}', '{$Data['FP_Data']['canvas']}', '{$Data['FP_Data']['webgl']}', '{$Data['FP_Data']['adblock']}', '{$Data['FP_Data']['has_lied_languages']}', '{$Data['FP_Data']['has_lied_resolution']}', '{$Data['FP_Data']['has_lied_os']}', '{$Data['FP_Data']['has_lied_browser']}', '{$Data['FP_Data']['touch_support']}', '{$Data['FP_Data']['js_fonts']}', '{$Data['FP_Data']['Date']}', '{$Data['FP_Data']['webgl_vendor']}', '{$Data['FP_Data']['do_not_track']}')";
    //     if ($CONN['Connection']->query($SQL) === TRUE) {
    //         $output['Error'] = null;
    //         $output['Data'] = 'Fingerprint Stored Successfully';
    //     } else {
    //         $output['Error'] = $CONN['Connection']->error;
    //         $output['Data'] = $Data['FP'];
    //     }
    // } else {
    //     $output['Error'] = 'Fingerprint ID: ' . $Data['FP'] . ' Already Found!';
    //     $output['Data'] = $Data['FP'];
    // }
    EncodeAndExit($output);
?>