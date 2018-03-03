<?php
    spl_autoload_register(function($class) {
        include_once('PHP-Classes/' . $class . '.class.php');
    });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        echo GenHead::GenCSS(GlobalVars::$CSS);
        echo GenHead::GenScripts(GlobalVars::$Scripts);
        $OpenGraph = array(
            "Title" => "Darnel-K | Home",
            "Type" => "website",
            "URL" => ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
            "Image" => ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . str_replace(' ', '%20', GlobalVars::$LogoPath),
            "Description" => "Development area of my site",
            "Locale" => "en_GB"
        );
        echo GenHead::GenSocialCards(GlobalVars::$Twitter, $OpenGraph);
        echo GenHead::GenLinks(GlobalVars::$Links);
        echo GenHead::GenExtraMetadata(GlobalVars::$ExtraMetadata);
    ?>
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