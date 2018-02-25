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
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/SASS/Main.min.css">
    <script src="/JS/particles.min.js"></script>
    <script src="/JS/Main.js"></script>
    <title>Document</title>
</head>
<body>
    <?php echo $HTML; ?>
</body>
</html>