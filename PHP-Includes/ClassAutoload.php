<?php
    spl_autoload_register(function($class) {
        include_once('PHP-Classes/' . $class . '.class.php');
    });
?>