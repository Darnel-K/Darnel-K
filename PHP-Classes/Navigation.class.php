<?php
class Navigation {
    protected $NavLinks = null;

    public function __construct(array $LinkArray, $spacer = '|') {
        $this->$NavLinks = $LinkArray;
    }

    public function GenNavHTML() {
        $output = "<ul>";
        $arr = $this->$NavLinks;
        foreach ($arr as $i) {
            $output += "<li><a href='" . $i[1] . "'>" . $i[0] . "</a></li>";
            var_dump(pos($arr));
        }
        $output += "</ul>";
        return $output;
    }
}
?>