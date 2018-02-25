<?php
$HeaderBar = "<header><nav>";
$Nav = new Navigation($NavLinks);
$HeaderBar .= $Nav->GenNavHTML();
$HeaderBar .= "</nav><img src='Images/Logo - White Text.svg' alt='Logo SVG'></header>";
?>