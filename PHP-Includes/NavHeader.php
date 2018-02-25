<?php
$HeaderBar = "<header><div id='particle-js'></div><div id='overlay'><nav>";
$Nav = new Navigation($NavLinks);
$HeaderBar .= $Nav->GenNavHTML();
$HeaderBar .= "</nav><img src='Images/Logo - White Text.svg' alt='Logo SVG'></div></header>";
?>