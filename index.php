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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/JS/jquery-3.3.1.min.js"></script>
    <script src="/JS/particles.min.js"></script>
    <script src="/JS/Main.js"></script>
    <title>Document</title>
</head>
<body>
    <?php echo $HTML; ?>
</body>
</html>