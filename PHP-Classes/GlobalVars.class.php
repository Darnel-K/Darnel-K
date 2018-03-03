<?php
class GlobalVars {
    public static $NavLinks = array(
        array('Home', '/'),
        array('CV', '/CV'),
        array('Portfolio', '/Portfolio'),
        array('Projects', '/Projects'),
        array('Get A Quote', '/QuoteMe'),
        array('Contact', '/Contact')
    );

    public static $CSS = array(
        array("Path" => "//use.fontawesome.com/releases/v5.0.6/css/all.css", "Media" => null, "Async" => true, "Defer" => false),
        array("Path" => "/SASS/Main.min.css", "Media" => null, "Async" => true, "Defer" => false)
    );

    public static $Scripts = array(
        array("Path" => "/JS/jquery-3.3.1.min.js", "Async" => false, "Defer" => false, "Type" => false),
        array("Path" => "/JS/particles.min.js", "Async" => false, "Defer" => false, "Type" => false),
        array("Path" => "/JS/Main.js", "Async" => false, "Defer" => false, "Type" => false)
    );

    public static $LogoPath = '/Images/Logo - White Text.svg';
}
?>