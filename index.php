<?php
    spl_autoload_register(function($class) {
        include_once('PHP-Classes/' . $class . '.class.php');
    });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        echo GenHead::GenCSS($CSS);
    ?>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/JS/jquery-3.3.1.min.js"></script>
    <script src="/JS/particles.min.js"></script>
    <script src="/JS/Main.js"></script>
    <title>Darnel-K | Home</title>
</head>
<body id="HomePage">
    <nav>
        <?php
            $Nav = new GenNav(GlobalVars::$NavLinks);
            echo $Nav->GenNavHTML();
        ?>
    </nav>
    <header>
        <div id='particles-js'></div>
        <div id='overlay'>
            <section>
                <img src='<?php echo GlobalVars::$LogoPath; ?>' alt='Logo SVG'>
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