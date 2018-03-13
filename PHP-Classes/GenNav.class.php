<?php
class GenNav {

    public static function GenNavHTML(array $LinkArray, $spacer = '|') {
        $output = "<ul id='links'>";
        $arr = $LinkArray;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i[1] . "'>" . $i[0] . "</a></li>";
            if (count($arr) - 1 != array_search($i, $arr)) {
                $output .= "<li class='NavBarSpacer'>" . $spacer . "</li>";
            }
        }
        $output .= "</ul>";
        return $output;
    }
}
?>