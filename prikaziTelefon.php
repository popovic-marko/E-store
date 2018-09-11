<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $telefon = Telefon::vratiTelefon($id);

    include 'view/telefon/prikazi.php';
}