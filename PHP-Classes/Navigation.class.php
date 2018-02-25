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
            if (count($arr) != array_search($i, $arr)) {
                echo count($arr);
                echo " ";
                echo array_search($i, $arr);
                $output .= "<li>" . $this->Spacer . "</li>";
            }
        }
        $output .= "</ul>";
        return $output;
    }
}
?>