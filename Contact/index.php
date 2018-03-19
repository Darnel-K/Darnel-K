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
            "Title" => "Darnel-K | Contact Me",
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
    <title>Darnel-K | Contact Me</title>
</head>
<body>
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
                <section id="Contact">
                    <form action="" method="post">
                        <input type="text" name="FName" id="FName" placeholder="Full Name (*)" required>
                        <input type="email" name="Email" id="Email" placeholder="Email (*)" required>
                        <input type="text" name="Subject" id="Subject" placeholder="Subject" list="SubjectList">
                        <datalist id="SubjectList">
                            <option value="Option 1">Option 1</option>
                        </datalist>
                        <textarea name="MSG" id="MSG" placeholder="Message (*)" required></textarea>
                    </form>
                    <div id="Bar"></div>
                    <div id="ContactSocial"></div>
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