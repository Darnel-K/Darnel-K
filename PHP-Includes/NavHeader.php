<?php
$HeaderBar = "<header><div id='particles-js'></div><div id='overlay'><nav>";
$Nav = new Navigation($NavLinks);
$HeaderBar .= $Nav->GenNavHTML();
$HeaderBar .= "</nav><section><img src='Images/Logo - White Text.svg' alt='Logo SVG'></section></div></header>";
?>