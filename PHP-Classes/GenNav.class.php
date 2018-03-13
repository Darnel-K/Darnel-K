<?php
class GenNav {

    public static function GenSocialButtonsHTML(array $SocialLinks) {
        $output = '';
        $arr = $SocialLinks;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i[1] . "'>" . $i[0] . "</a></li>";
        }
    }

    public static function GenNavHTML(array $LinkArray, $spacer = '|', array $SocialLinks = null) {
        $output = "<ul id='links'>";
        $arr = $LinkArray;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i['Path'] . "'>" . $i['Text'] . "</a></li>";
            $output .= (count($arr) - 1 != array_search($i, $arr) ? "<li class='NavBarSpacer'>" . $spacer . "</li>" : '');
            if (count($arr) - 1 != array_search($i, $arr)) {
                $output .= "<li class='NavBarSpacer'>" . $spacer . "</li>";
            }
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