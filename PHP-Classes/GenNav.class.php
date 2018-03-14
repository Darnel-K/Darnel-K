<?php
class GenNav {

    public static function GenSocialButtonsHTML(array $SocialLinks) {
        $output = '';
        $arr = $SocialLinks;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i['Path'] . ($i['Disabled'] ? "' onclick='return false;'" : "'") . "><i class='" . $i['IconClass'] . ($i['IconSize'] ? ' ' . $i['IconSize'] : '') . "'></i></a></li>";
        }
        return $output;
    }

    public static function GenNavHTML(array $LinkArray, array $SocialLinks = null, $spacer = '|') {
        $output = "<ul id='menubutton'><li><i class='fas fa-bars fa-2x'></i></li></ul>";
        $output .= "<ul id='links'>";
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