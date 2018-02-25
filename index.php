<?php
    spl_autoload_register(function($class) {
        include_once('PHP-Classes/' . $class . '.class.php');
    });
    require_once 'PHP-Includes/GlobalVars.php';
    require_once 'PHP-Includes/NavHeader.php';
    $HTML .= $HeaderBar;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php echo $HTML; ?>
</body>
</html>