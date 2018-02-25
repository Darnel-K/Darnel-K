<?php
    spl_autoload_register(function($class) {
        include_once('PHP-Classes/' . $class . '.class.php');
    });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
    include 'PHP-Includes/GlobalVars.php';
    $test = new Navigation($NavLinks);
    $test->GenNavHTML();
    ?>
</body>
</html>