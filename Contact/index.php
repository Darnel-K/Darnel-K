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
                <section id="Contact">
                    <div id="C_Head">
                        <h2>Contact Me</h2>
                        <p>Use the form, one of my social media links or my email below to contact me.</p>
                    </div>
                    <form method="post">
                        <input type="text" name="FName" id="FName" placeholder="Full Name *" autocomplete="name" aria-label="Full Name" autofocus required>
                        <input type="email" name="Email" id="Email" placeholder="Email *" autocomplete="email" aria-label="Email" required>
                        <input type="text" name="Subject" id="Subject" placeholder="Subject" aria-label="Subject">
                        <textarea name="MSG" id="MSG" placeholder="Message *" aria-label="Message" required></textarea>
                        <button type="submit">Send</button>
                        <p><i class="fab fa-slack fa-2x"></i><span>Powered By Slack</span></p>
                    </form>
                    <div class="Bar"></div>
                    <div id="ContactSocial">
                        <?php echo Factory::GetContactSocialList(GlobalVars::$SocialLinks); ?>
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
