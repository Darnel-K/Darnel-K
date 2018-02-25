<?php
class Navigation {
    public $NavLinks = array();
    public $Spacer = "";

    public function __construct(array $LinkArray, $spacer = '|') {
        $this->NavLinks = $LinkArray;
        $this->Spacer = $spacer;
    }

    public function GenNavHTML() {
        $output = "<ul>";
        $arr = $this->NavLinks;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i[1] . "'>" . $i[0] . "</a></li>";
            if (count($arr) - 1 != array_search($i, $arr)) {
                $output .= "<li class='NavBarSpacer'>" . $this->Spacer . "</li>";
            }
        }
        $output .= "</ul>";
        return $output;
    }
}
?>