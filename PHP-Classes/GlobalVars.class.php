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
        array("Path" => "//use.fontawesome.com/releases/v5.0.6/css/all.css", "Media" => null),
        array("Path" => "/SASS/Main.min.css", "Media" => null),
        array("Path" => "https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Roboto:100,300,400,500,700,900&subset=latin-ext", "Media" => null)
    );

    public static $Scripts = array(
        array("Path" => "/JS/SWImport.js", "Async" => true, "Defer" => false, "Type" => false),
        array("Path" => "/JS/jquery-3.3.1.min.js", "Async" => false, "Defer" => true, "Type" => false),
        array("Path" => "/JS/particles.min.js", "Async" => false, "Defer" => true, "Type" => false),
        array("Path" => "/JS/Main.js", "Async" => false, "Defer" => true, "Type" => false)
    );

    public static $Twitter = array(
        'Card' => 'summary',
        'Site' => '@Darnel_Kumar',
        'Creator' => '@Darnel_Kumar'
    );

    public static $Links = array(
        array("Path" => "/favicon.ico", "Rel" => "shortcut icon", "Type" => "image/x-icon", "Size" => false),
        array("Path" => "/Icons/apple-icon-57x57.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "57x57"),
        array("Path" => "/Icons/apple-icon-60x60.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "60x60"),
        array("Path" => "/Icons/apple-icon-72x72.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "72x72"),
        array("Path" => "/Icons/apple-icon-76x76.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "76x76"),
        array("Path" => "/Icons/apple-icon-114x114.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "114x114"),
        array("Path" => "/Icons/apple-icon-120x120.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "120x120"),
        array("Path" => "/Icons/apple-icon-144x144.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "144x144"),
        array("Path" => "/Icons/apple-icon-152x152.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "152x152"),
        array("Path" => "/Icons/apple-icon-180x180.png", "Rel" => "apple-touch-icon", "Type" => false, "Size" => "180x180"),
        array("Path" => "/Icons/android-icon-192x192.png", "Rel" => "icon", "Type" => "image/png", "Size" => "192x192"),
        array("Path" => "/Icons/favicon-32x32.png", "Rel" => "icon", "Type" => "image/png", "Size" => "32x32"),
        array("Path" => "/Icons/favicon-96x96.png", "Rel" => "icon", "Type" => "image/png", "Size" => "96x96"),
        array("Path" => "/Icons/favicon-16x16.png", "Rel" => "icon", "Type" => "image/png", "Size" => "16x16"),
        array("Path" => "/manifest.json", "Rel" => "manifest", "Type" => false, "Size" => false)
    );

    public static $ExtraMetadata = array(
        array("Name" => "viewport", "Content" => "width=device-width, initial-scale=1.0"),
        array("Name" => "msapplication-TileColor", "Content" => "#3F3F3F"),
        array("Name" => "msapplication-TileImage", "Content" => "/Icons/ms-icon-144x144.png"),
        array("Name" => "theme-color", "Content" => "#3F3F3F")
    );

    public static $LogoPath = '/Images/Logo - White Text.svg';
}
?>