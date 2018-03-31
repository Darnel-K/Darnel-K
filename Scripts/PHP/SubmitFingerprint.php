<?php
    header('Content-type:application/json;charset=utf-8');
    spl_autoload_register(function($class) {
        include_once('../../PHP-Classes/' . $class . '.class.php');
    });
    $output = array(
        "Error" => null,
        "Data" => ''
    );
    $DB = new DB();
    $CONN = $DB->Connect('DarnelK');

    if ($CONN['Error'] != null || $CONN['ErrNo'] != null) {
        $output['Error'] = $CONN;
        $output['ErrNo'] = $CONN['ErrNo'];
        exit();
    }

    echo json_encode($output);
?>