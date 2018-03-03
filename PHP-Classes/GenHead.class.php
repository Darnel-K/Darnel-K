<?php
class GenHead {

    public static function GenCSS(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<link rel='stylesheet' " . ( $i['Async'] ? 'ASYNC' : '') . ($i['Async'] && $i['Defer'] ? ' ' : '') . ( $i['Defer'] ? 'DEFER' : '') . ($i['Async'] || $i['Defer'] ? ' ' : '') . ($i['Path'] ? "href='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Media'] ? "media='" . $i['Media'] . "'" : '') . ">";
        }
        return $out;
    }

    public static function GenSocialCards() {

    }

    public static function GenIconLinks() {

    }

    public static function GenScripts() {

    }
}
?>