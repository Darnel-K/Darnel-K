<?php
    spl_autoload_register(function($class) {
        include_once('PHP-Classes/' . $class . '.class.php');
    });
    require_once 'PHP-Includes/GlobalVars.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link async href="//use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/SASS/Main.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/JS/jquery-3.3.1.min.js"></script>
    <script src="/JS/particles.min.js"></script>
    <script src="/JS/Main.js"></script>
    <title>Darnel-K | Home</title>
</head>
<body id="HomePage">
    <nav>
        <?php
            $Nav = new Navigation($NavLinks);
            echo $Nav->GenNavHTML();
        ?>
    </nav>
    <header>
        <div id='particles-js'></div>
        <div id='overlay'>
            <section>
                <img src='Images/Logo - White Text.svg' alt='Logo SVG'>
                <h1>Freelance Web Design &amp; Development</h1>
            </section>
        </div>
    </header>
    <div id="Wrapper">
        <p id="DownArrowContainer">
            <i class="fas fa-angle-down fa-3x bounce" id="DownArrow"></i>
        </p>
    </div>
    <!-- /#wrapper -->
</body>
</html>