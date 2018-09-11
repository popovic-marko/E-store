<?php
include 'init.php';

$vesti = Vest::vratiSveVesti();

include 'view/vest/vesti.php';
