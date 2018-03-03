<?php
class GenHead {

    public static function GenCSS(array $arr) {
        $out = "";
        foreach ($arr as $i) {
            $out .= "<link rel='stylesheet' " . ( $i['Async'] ? 'ASYNC' : '') . ($i['Async'] && $i['Defer'] ? ' ' : '') . ( $i['Defer'] ? 'DEFER' : '') . ($i['Async'] || $i['Defer'] ? ' ' : '') . ($i['Path'] ? $i['Path'] : 'DISABLED') . ($i['Path'] && $i['Media'] ? $i['Media'] : '') . ">";
        }
        return $out;
    }

    public function GenSocialCards() {

    }

    public function GenIconLinks() {

    }

    public function GenScripts() {

    }
}
?>