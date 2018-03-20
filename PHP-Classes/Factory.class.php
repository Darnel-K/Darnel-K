<?php
class Factory {
    public static function GetCSS(array $CSS, $NoScript) {
        $out = "";
        foreach ($CSS as $i) {
            $out .= "<link rel='stylesheet' " . ($i['Path'] ? "href='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Media'] ? " media='" . $i['Media'] . "'" : '') . ">\n";
        }
        $out .= "<noscript><link rel='stylesheet' href='" . $NoScript . "'></noscript>\n";
        return $out;
    }

    public static function GetSocialCards(array $Twitter, array $OpenGraph) {
        $out = "";
        foreach ($Twitter as $k => $v) {
            if (strtolower($k) == 'card' || 'site' || 'creator') {
                $out .= "<meta name='twitter:" . strtolower($k) . "' content='" . $v . "' />\n";
            }
        }
        foreach ($OpenGraph as $k => $v) {
            if (strtolower($k) == 'card' || 'site' || 'creator') {
                $out .= "<meta property='og:" . strtolower($k) . "' content='" . $v . "' />\n";
            }
        }
        return $out;
    }

    public static function GetLinks(array $Links) {
        $out = "";
        foreach ($Links as $i) {
            $out .= "<link" . ($i['Path'] && $i['Rel'] ? '' : ' DISABLED') . " rel='" . $i['Rel'] . "' href='" . $i['Path'] . "'" . ($i['Type'] ? " type='" . $i['Type'] . "'" : '') . ($i['Size'] ? " sizes='" . $i['Size'] . "'" : '') . " >\n";
        }
        return $out;
    }

    public static function GetExtraMetadata(array $Meta) {
        $out = "";
        foreach ($Meta as $i) {
            $out .= ($i['Name'] && $i['Content'] ? "<meta name='" . $i['Name'] . "' content='" . $i['Content'] . "'>\n" : '');
        }
        return $out;
    }

    public static function GetScripts(array $Scripts) {
        $out = "";
        foreach ($Scripts as $i) {
            $out .= "<script " . ( $i['Async'] ? 'ASYNC' : '') . ($i['Async'] && $i['Defer'] ? ' ' : '') . ( $i['Defer'] ? 'DEFER' : '') . ($i['Async'] || $i['Defer'] ? ' ' : '') . ($i['Path'] ? "src='" . $i['Path'] . "'" : 'DISABLED') . ($i['Path'] && $i['Type'] ? "type='" . $i['Type'] . "'" : '') . "></script>\n";
        }
        return $out;
    }

    public static function GetSocialButtonsList(array $SocialLinks) {
        $output = '';
        foreach (array_reverse($SocialLinks, true) as $i) {
            $output .= (!$i['Disabled'] ? "<li><a href='" . $i['Path'] . "' target='_BLANK'><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>\n" : '');
        }
        return $output;
    }

    public static function GetNavList(array $LinkArray, array $SocialLinks = null, $Spacer = '|') {
        $output = "<ul class='links'>\n";
        foreach ($LinkArray as $i) {
            $output .= (!$i['Disabled'] ? "<li><a href='" . $i['Path'] . "'>" . $i['Text'] . "</a></li>\n" : '');
            $output .= (!$i['Disabled'] ? (count($LinkArray) - 1 != array_search($i, $LinkArray) ? "<li class='NavBarSpacer'>" . $Spacer . "</li>\n" : '') : '');
        }
        $output .= "</ul>\n";
        if ($SocialLinks != null) {
            $output .= "<ul id='social'>\n";
            $output .= self::GetSocialButtonsList($SocialLinks);
            $output .= "</ul>\n";
        }
        return $output;
    }

    public static function GetContactSocialList(array $SocialLinks) {
        $output = '<ul>';
        foreach ($SocialLinks as $i) {
            $output .= (!$i['Disabled'] ? "<li><a href='" . $i['Path'] . "' target='_BLANK'><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>" : '');
        }
        $output .= '</ul><ul>';
        foreach ($SocialLinks as $i) {
            $output .= (!$i['Disabled'] ? "<li><a href='" . $i['Path'] . "' target='_BLANK'>" . $i['Text'] . "</a></li>" : '');
        }
        $output .= '</ul>';
        return $output;
    }

    public static function GetFooter() {
        $output = '';
        $output .= "<p id='Copyright'>Copyright &copy; " . date('Y') . " Darnel-K</p>";
        return $output;
    }
}
?>