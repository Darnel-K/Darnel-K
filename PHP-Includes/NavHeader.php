<?php
$HeaderBar = "<header><nav><img src='Images/Logo - White Text.svg' alt='Logo SVG'>";
$Nav = new Navigation($NavLinks);
$HeaderBar .= $Nav->GenNavHTML();
$HeaderBar .= "</nav></header>";
?>