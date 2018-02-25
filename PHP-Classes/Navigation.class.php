<?php
class Navigation {
    public $NavLinks = array();

    public function __construct(array $LinkArray, $spacer = '|') {
        $this->NavLinks = $LinkArray;
    }

    public function GenNavHTML() {
        $output = "<ul>";
        $arr = $this->NavLinks;
        foreach ($arr as $i) {
            $output .= "<li><a href='" . $i[1] . "'>" . $i[0] . "</a></li>";
        }
        $output .= "</ul>";
        return $output;
    }
}
?>