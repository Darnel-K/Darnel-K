<?php
    spl_autoload_register(function($class) {
        include_once('../PHP-Classes/' . $class . '.class.php');
    });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        echo Factory::GetScripts(GlobalVars::$Scripts);
        echo Factory::GetCSS(GlobalVars::$CSS, GlobalVars::$NoScriptCSS);
        $OpenGraph = array(
            "Title" => "Darnel-K | Generate A Quote",
            "Type" => "website",
            "URL" => ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
            "Image" => ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . str_replace(' ', '%20', GlobalVars::$OpenGraphImage),
            "Image:alt" => "Open Graph Site QuoteMe Page Preview Image",
            "Description" => "Development area of my site",
            "Locale" => "en_GB"
        );
        echo Factory::GetSocialCards(GlobalVars::$Twitter, $OpenGraph);
        echo Factory::GetLinks(GlobalVars::$Links);
        echo Factory::GetExtraMetadata(GlobalVars::$ExtraMetadata);
    ?>
    <title>Darnel-K | Generate A Quote</title>
</head>
<body>
    <?php
        echo Factory::GTagManager();
    ?>
    <nav id='MobileNav' class="fixed">
        <?php
            echo Factory::GetNavList(GlobalVars::$NavLinks);
        ?>
    </nav>
    <div id="content">
        <nav id='DesktopNav' class="fixed">
            <ul id='menubutton'><li><i class='fas fa-bars fa-2x'></i></li></ul>
            <?php
                echo Factory::GetNavList(GlobalVars::$NavLinks, GlobalVars::$SocialLinks);
            ?>
        </nav>
        <div id="Wrapper">
            <div class="WrapperContent">
                <section class="Spacer"></section>
                <section id="QuoteMe">
                    
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