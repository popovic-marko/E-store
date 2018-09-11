<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $najSkuplji = Telefon::vratiSveTelefone(null, 'cena DESC', '0,4');
    $najJefitniji = Telefon::vratiSveTelefone(null, 'cena ASC', '0,4');

    include  ROOT . 'view/index.php';
}