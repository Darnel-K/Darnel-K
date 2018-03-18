<?php
class Factory {
    public static function GetFooter() {
        
    }

    public static function GetCSS(array $arr, $NoScript) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<link rel='stylesheet' " . ($i['Path'] ? "href='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Media'] ? " media='" . $i['Media'] . "'" : '') . ">";
        }
        $out .= "<noscript><link rel='stylesheet' href='" . $NoScript . "'></noscript>";
        return $out;
    }

    public static function GetSocialCards(array $Twitter, array $OpenGraph) {
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

    public static function GetLinks(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<link" . ($i['Path'] && $i['Rel'] ? '' : ' DISABLED') . " rel='" . $i['Rel'] . "' href='" . $i['Path'] . "'" . ($i['Type'] ? " type='" . $i['Type'] . "'" : '') . ($i['Size'] ? " sizes='" . $i['Size'] . "'" : '') . " >";
        }
        return $out;
    }

    public static function GetExtraMetadata(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= ($i['Name'] && $i['Content'] ? "<meta name='" . $i['Name'] . "' content='" . $i['Content'] . "'>" : '');
        }
        return $out;
    }

    public static function GetScripts(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<script " . ( $i['Async'] ? 'ASYNC' : '') . ($i['Async'] && $i['Defer'] ? ' ' : '') . ( $i['Defer'] ? 'DEFER' : '') . ($i['Async'] || $i['Defer'] ? ' ' : '') . ($i['Path'] ? "src='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Type'] ? "type='" . $i['Type'] . "'" : '') . '></script>';
        }
        return $out;
    }

    public static function GetSocialButtonsList(array $SocialLinks) {
        $output = '';
        $arr = $SocialLinks;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . " target='_BLANK'><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>";
        }
        return $output;
    }

    public static function GetNavList(array $LinkArray, array $SocialLinks = null, $spacer = '|') {
        $output = "<ul class='links'>";
        $arr = $LinkArray;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . ">" . $i['Text'] . "</a></li>";
            $output .= (count($arr) - 1 != array_search($i, $arr) ? "<li class='NavBarSpacer'>" . $spacer . "</li>" : '');
        }
        $output .= "</ul>";
        if ($SocialLinks != null) {
            $output .= "<ul id='social'>";
            $output .= self::GenSocialButtonsHTML($SocialLinks);
            $output .= "</ul>";
        }
        return $output;
    }
}
?>