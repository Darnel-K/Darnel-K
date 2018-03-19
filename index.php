<?php
    spl_autoload_register(function($class) {
        include_once('PHP-Classes/' . $class . '.class.php');
    });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        echo Factory::GetScripts(GlobalVars::$Scripts);
        echo Factory::GetCSS(GlobalVars::$CSS, GlobalVars::$NoScriptCSS);
        $OpenGraph = array(
            "Title" => "Darnel-K | Home",
            "Type" => "website",
            "URL" => ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
            "Image" => ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . str_replace(' ', '%20', GlobalVars::$OpenGraphImage),
            "Description" => "Development area of my site",
            "Locale" => "en_GB"
        );
        echo Factory::GetSocialCards(GlobalVars::$Twitter, $OpenGraph);
        echo Factory::GetLinks(GlobalVars::$Links);
        echo Factory::GetExtraMetadata(GlobalVars::$ExtraMetadata);
    ?>
    <title>Darnel-K | Home</title>
</head>
<body id="HomePage">
    <nav id='MobileNav'>
        <?php
            echo Factory::GetNavList(GlobalVars::$NavLinks);
        ?>
    </nav>
    <div id="content">
        <nav id='DesktopNav'>
            <ul id='menubutton'><li><i class='fas fa-bars fa-2x'></i></li></ul>
            <?php
                echo Factory::GetNavList(GlobalVars::$NavLinks, GlobalVars::$SocialLinks);
            ?>
        </nav>
        <header>
            <div id='particles-js'></div>
            <div id='overlay'>
                <section>
                    <img src='<?php echo str_replace(' ', '%20', GlobalVars::$LogoPath); ?>' alt='Logo SVG'>
                    <h1>Freelance Web Design &amp; Development</h1>
                </section>
            </div>
        </header>
        <div id="Wrapper">
            <p id="DownArrowContainer">
                <i class="fas fa-angle-down fa-3x bounce" id="DownArrow"></i>
            </p>
            <div class="WrapperContent">
                <section id="Contact">
                    <form action="" method="post">
                        <input type="text" name="FName" id="FName" placeholder="Full Name *" required>
                        <input type="email" name="Email" id="Email" placeholder="Email *" required>
                        <input type="text" name="Subject" id="Subject" placeholder="Subject">
                        <textarea name="MSG" id="MSG" placeholder="Message *" required></textarea>
                        <button type="submit">Submit</button>
                    </form>
                    <div id="Bar"></div>
                    <div id="ContactSocial">
                        <ul>
                            <?php echo Factory::GetSocialButtonsList(GlobalVars::$SocialLinks); ?>
                        </ul>
                    </div>
                </section>
                <footer><?php echo Factory::GetFooter(); ?></footer>
            </div>
            <!-- /.WrapperContent -->
        </div>
        <!-- /#wrapper -->
    </div>
    <!-- /#content -->
</body>
</html>