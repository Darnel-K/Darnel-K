<?php
class GenHead {

    public static function GenCSS(array $arr, $NoScript) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<link rel='stylesheet' " . ($i['Path'] ? "href='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Media'] ? " media='" . $i['Media'] . "'" : '') . ">";
        }
        $out .= "<link rel='stylesheet' href='" . $NoScript . "'>";
        return $out;
    }

    public static function GenSocialCards(array $Twitter, array $OpenGraph) {
        $out = "";
        foreach ($Twitter as $k => $v) {
            if (strtolower($k) == 'card' || 'site' || 'creator') {
                $out .= "<meta name='twitter:" . strtolower($k) . "' content='" . $v . "' />";
            }
        }
        foreach ($OpenGraph as $k => $v) {
            if (strtolower($k) == 'card' || 'site' || 'creator') {
                $out .= "<meta property='og:" . strtolower($k) . "' content='" . $v . "' />";
            }
        }
        return $out;
    }

    public static function GenLinks(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<link" . ($i['Path'] && $i['Rel'] ? '' : ' DISABLED') . " rel='" . $i['Rel'] . "' href='" . $i['Path'] . "'" . ($i['Type'] ? " type='" . $i['Type'] . "'" : '') . ($i['Size'] ? " size='" . $i['Size'] . "'" : '') . " >";
        }
        return $out;
    }

    public static function GenExtraMetadata(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= ($i['Name'] && $i['Content'] ? "<meta name='" . $i['Name'] . "' content='" . $i['Content'] . "'>" : '');
        }
        return $out;
    }

    public static function GenScripts(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<script " . ( $i['Async'] ? 'ASYNC' : '') . ($i['Async'] && $i['Defer'] ? ' ' : '') . ( $i['Defer'] ? 'DEFER' : '') . ($i['Async'] || $i['Defer'] ? ' ' : '') . ($i['Path'] ? "src='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Type'] ? "type='" . $i['Type'] . "'" : '') . '></script>';
        }
        return $out;
    }
}
?>