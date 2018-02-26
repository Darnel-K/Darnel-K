<?php
    spl_autoload_register(function($class) {
        include_once('PHP-Classes/' . $class . '.class.php');
    });
    require_once 'PHP-Includes/GlobalVars.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/SASS/Main.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/JS/jquery-3.3.1.min.js"></script>
    <script src="/JS/particles.min.js"></script>
    <script src="/JS/Main.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div id='particles-js'></div>
        <div id='overlay'>
            <nav>
                <?php
                    $Nav = new Navigation($NavLinks);
                    echo $Nav->GenNavHTML();
                ?>
            </nav>
            <section>
                <img src='Images/Logo - White Text.svg' alt='Logo SVG'>
                <h2>Freelance Web Design &amp; Development</h2>
            </section>
        </div>
    </header>
    <div id="wrapper">
        <p id="DownArrowContainer">
            <i class="fas fa-angle-down fa-3x bounce" id="DownArrow"></i>
        </p>
    </div>
    <!-- /#wrapper -->
</body>
</html>