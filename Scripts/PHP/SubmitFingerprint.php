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
    }
    if (isset($_POST['FP_Data'])) {
        $Data['FP_Data'] = $_POST['FP_Data'];
    }

    $output['Data'] = $Data;

    EncodeAndExit($output);
?>