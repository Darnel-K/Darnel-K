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
            $out .= "<meta name='twitter:" . strtolower($k) . "' content='" . $v . "' />";
        }
        foreach ($OpenGraph as $k => $v) {
            $out .= "<meta property='og:" . strtolower($k) . "' content='" . $v . "' />";
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
            $output .= (!$i['Disabled'] ? "<li><a href='" . $i['Path'] . "' target='_BLANK' rel='noopener'><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>" : '');
        }
        return $output;
    }

    public static function GetNavList(array $LinkArray, array $SocialLinks = null, $Spacer = '|') {
        $output = "<ul class='links'>";
        foreach ($LinkArray as $i) {
            $output .= (!$i['Disabled'] ? "<li><a href='" . $i['Path'] . "'>" . $i['Text'] . "</a></li>" : '');
            $output .= (!$i['Disabled'] ? (count($LinkArray) - 1 != array_search($i, $LinkArray) ? "<li class='NavBarSpacer'>" . $Spacer . "</li>" : '') : '');
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
            $output .= (!$i['Disabled'] ? "<li><a href='" . $i['Path'] . "' target='_BLANK' rel='noopener'><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>" : '');
        }
        $output .= '</ul><ul>';
        foreach ($SocialLinks as $i) {
            $output .= (!$i['Disabled'] ? "<li><a href='" . $i['Path'] . "' target='_BLANK' rel='noopener'>" . $i['Text'] . "</a></li>" : '');
        }
        $output .= '</ul>';
        return $output;
    }

    public static function GetFooter() {
        $output = '';
        $output .= "<section class='S1'></section>";
        $output .= "<section class='S2'></section>";
        $output .= "<section class='S3'></section>";
        $output .= "<section class='S4'></section>";
        $output .= "<section class='S5'></section>";
        $output .= "<p id='Copyright'>Copyright &copy; " . date('Y') . " Darnel-K</p>";
        $output .= "<p id='Version'>V0.18.3 - 2018-10-12</p>";
        // Not created by, affiliated with, or supported by Slack Technologies, Inc.
        return $output;
    }

    public static function GTagManager() {
        $output = "<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-KBHHQVX' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>";
        return $output;
    }
}
?>
