<?php
class GenHead {

    public static function GenCSS(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<link rel='stylesheet' " . ( $i['Async'] ? 'ASYNC' : '') . ($i['Async'] && $i['Defer'] ? ' ' : '') . ( $i['Defer'] ? 'DEFER' : '') . ($i['Async'] || $i['Defer'] ? ' ' : '') . ($i['Path'] ? "href='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Media'] ? "media='" . $i['Media'] . "'" : '') . ">";
        }
        return $out;
    }

    public static function GenSocialCards(array $Twitter, array $OpenGraph) {
        $out = "";
        foreach ($Twitter as $k => $v) {
            if (strtolower($k) == 'card' || 'site' || 'creator') {
                $out .= "<meta name='twitter:" . strtolower($k) . "' content='" . $v . "' />";
            }
        }
        return $out;
    }

    public static function GenIconLinks() {

    }

    public static function GenScripts(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<script " . ( $i['Async'] ? 'ASYNC' : '') . ($i['Async'] && $i['Defer'] ? ' ' : '') . ( $i['Defer'] ? 'DEFER' : '') . ($i['Async'] || $i['Defer'] ? ' ' : '') .($i['Path'] ? "src='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Type'] ? "type='" . $i['Type'] . "'" : '') . '></script>';
        }
        return $out;
    }
}
?>