<?php
class Factory {
    public static function GetCSS(array $CSS, $NoScript) {
        $out = "";
        foreach ($CSS as $i) {
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

    public static function GetLinks(array $Links) {
        $out = "";
        foreach ($Links as $i) {
            $out .= "<link" . ($i['Path'] && $i['Rel'] ? '' : ' DISABLED') . " rel='" . $i['Rel'] . "' href='" . $i['Path'] . "'" . ($i['Type'] ? " type='" . $i['Type'] . "'" : '') . ($i['Size'] ? " sizes='" . $i['Size'] . "'" : '') . " >";
        }
        return $out;
    }

    public static function GetExtraMetadata(array $Meta) {
        $out = "";
        foreach ($Meta as $i) {
            $out .= ($i['Name'] && $i['Content'] ? "<meta name='" . $i['Name'] . "' content='" . $i['Content'] . "'>" : '');
        }
        return $out;
    }

    public static function GetScripts(array $Scripts) {
        $out = "";
        foreach ($Scripts as $i) {
            $out .= "<script " . ( $i['Async'] ? 'ASYNC' : '') . ($i['Async'] && $i['Defer'] ? ' ' : '') . ( $i['Defer'] ? 'DEFER' : '') . ($i['Async'] || $i['Defer'] ? ' ' : '') . ($i['Path'] ? "src='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Type'] ? "type='" . $i['Type'] . "'" : '') . '></script>';
        }
        return $out;
    }

    public static function GetSocialButtonsList(array $SocialLinks) {
        $output = '';
        foreach (array_reverse($SocialLinks, true) as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . " target='_BLANK'><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>";
        }
        return $output;
    }

    public static function GetNavList(array $LinkArray, array $SocialLinks = null, $Spacer = '|') {
        $output = "<ul class='links'>";
        foreach ($LinkArray as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . ">" . $i['Text'] . "</a></li>";
            $output .= (count($LinkArray) - 1 != array_search($i, $LinkArray) ? "<li class='NavBarSpacer'>" . $Spacer . "</li>" : '');
        }
        $output .= "</ul>";
        if ($SocialLinks != null) {
            $output .= "<ul id='social'>";
            $output .= self::GetSocialButtonsList($SocialLinks);
            $output .= "</ul>";
        }
        return $output;
    }

    public static function GetContactSocialList(array $SocialLinks) {
        $output = '<ul>';
        foreach ($SocialLinks as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . " target='_BLANK'><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>";
        }
        $output .= '</ul><div class="SocialBar"></div><ul>';
        foreach ($SocialLinks as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . " target='_BLANK'>" . $i['Path'] . "</a></li>";
        }
        $output .= '</ul>';
        return $output;
    }

    public static function GetFooter() {
        
    }
}
?>