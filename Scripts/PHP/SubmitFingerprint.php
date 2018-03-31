<?php
    header('Content-type:application/json;charset=utf-8');
    spl_autoload_register(function($class) {
        include_once('../../PHP-Classes/' . $class . '.class.php');
    });

    function EncodeAndExit($out) { echo json_encode($out); exit(); }
    $Data = array(
        "FP" => "",
        "FP_Data" => array()
    );

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

    if (isset($_POST['FP'])) {
        $Data['FP'] = $CONN['Connection']->real_escape_string($_POST['FP']);
    } else {
        $output['Error'] = 'Fingerprint ID Not Received!';
        EncodeAndExit($output);
    }
    if (isset($_POST['FP_Data'])) {
        $Data['FP_Data'] = $_POST['FP_Data'];
    } else {
        $output['Error'] = 'Fingerprint Data Not Received!';
        EncodeAndExit($output);
    }

    foreach ($Data['FP_Data'] as $k => $v) {
        if (is_array($v)) {
            $arr = array();
            foreach ($v as $va) {
                array_push($arr, $CONN['Connection']->real_escape_string($va));
            }
            $Data['FP_Data'][$k] = json_encode($arr);
        } else {
            // if (strtolower($v) == true || strtolower($v) == 'true') {
            //     $v = 1;
            // } elseif (strtolower($v) == false || strtolower($v) == 'false') {
            //     $v = 0;
            // }
            $Data['FP_Data'][$k] = $CONN['Connection']->real_escape_string($v);
        }
    }

    $SQL = "SELECT ID, FingerprintID FROM Fingerprint_Data";
    if ($CONN['Connection']->query($SQL)->num_rows <= 0) {
        $Data['FP_Data']['Date'] = date("Y-m-d");
        $SQL = "INSERT INTO Fingerprint_Data (FingerprintID, User_Agent, Language, Color_Depth, Pixel_Ratio, Hardware_Concurrency, Resolution, Available_Resolution, Timezone_Offset, Session_Storage, Local_Storage, Indexed_DB, Open_Database, CPU_Class, Navigator_Platform, Regular_Plugins, Canvas, WebGL, AdBlock, Has_Lied_Languages, Has_Lied_Resolution, Has_Lied_OS, Has_Lied_Browser, Touch_Support, JS_Fonts, First_Visit_Date, WebGL_Vendor) VALUES ('{$Data['FP']}', '{$Data['FP_Data']['user_agent']}', '{$Data['FP_Data']['language']}', '{$Data['FP_Data']['color_depth']}', '{$Data['FP_Data']['pixel_ratio']}', '{$Data['FP_Data']['hardware_concurrency']}', '{$Data['FP_Data']['resolution']}', '{$Data['FP_Data']['available_resolution']}', '{$Data['FP_Data']['timezone_offset']}', '{$Data['FP_Data']['session_storage']}', '{$Data['FP_Data']['local_storage']}', '{$Data['FP_Data']['indexed_db']}', '{$Data['FP_Data']['open_database']}', '{$Data['FP_Data']['cpu_class']}', '{$Data['FP_Data']['navigator_platform']}', '{$Data['FP_Data']['regular_plugins']}', '{$Data['FP_Data']['canvas']}', '{$Data['FP_Data']['webgl']}', '{$Data['FP_Data']['adblock']}', '{$Data['FP_Data']['has_lied_languages']}', '{$Data['FP_Data']['has_lied_resolution']}', '{$Data['FP_Data']['has_lied_os']}', '{$Data['FP_Data']['has_lied_browser']}', '{$Data['FP_Data']['touch_support']}', '{$Data['FP_Data']['js_fonts']}', '{$Data['FP_Data']['Date']}', '{$Data['FP_Data']['webgl_vendor']}')";
        if ($CONN['Connection']->query($SQL) === TRUE) {
            $output['Error'] = null;
            $output['Data'] = 'Fingerprint Stored Successfully';
        } else {
            $output['Error'] = $CONN['Connection']->error;
            $output['Data'] = $Data['FP'];
        }
    } else {
        $output['Error'] = 'Fingerprint ID: ' . $Data['FP'] . ' Already Found!';
        $output['Data'] = $Data['FP'];
    }
    $output['FP_Data'] = $Data;
    EncodeAndExit($output);
?>