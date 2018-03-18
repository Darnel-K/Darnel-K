<?php
class GenNav {

    public static function GenSocialButtonsHTML(array $SocialLinks) {
        $output = '';
        $arr = $SocialLinks;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . " target='_BLANK'><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>";
        }
        return $output;
    }

    public static function GenNavHTML(array $LinkArray, array $SocialLinks = null, $spacer = '|') {
        $output = "<ul class='links'>";
        $arr = $LinkArray;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . ">" . $i['Text'] . "</a></li>";
            $output .= (count($arr) - 1 != array_search($i, $arr) ? "<li class='NavBarSpacer'>" . $spacer . "</li>" : '');
        }
        $output .= "</ul>";
        if ($SocialLinks != null) {
            $output .= "<ul class='social'>";
            $output .= self::GenSocialButtonsHTML($SocialLinks);
            $output .= "</ul>";
        }
        return $output;
    }
}
?>