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
        $Data['FP'] = mysqli_real_escape_string($CONN['Connection'], $_POST['FP']);
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
                array_push($arr, mysqli_real_escape_string($CONN['Connection'], $va));
            }
            $Data['FP_Data'][$k] = $arr;
        } else {
            $Data['FP_Data'][$k] = mysqli_real_escape_string($CONN['Connection'], $v);
        }
    }

    $output['Data'] = $Data;

    EncodeAndExit($output);
?>