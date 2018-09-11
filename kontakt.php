<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['id'])) {
        $telefon = new Telefon($_POST['id'], $_POST['proizvodjac'], $_POST['cena'], $_POST['model'], '',
                              '', '', '', '', -1, '');

        include 'view/kontakt.php';
    } else {
        $narudzbina = new Narudzbina(-1, trim($_POST['proizvodjac']), trim($_POST['model']), trim($_POST['ukupno']),
            trim($_POST['ime']), trim($_POST['prezime']), trim($_POST['e-mail']),
            trim($_POST['adresa']));
        Narudzbina::unesiNarudzbinu($narudzbina);

        header('Location: http://dev.iteh.com/');
        exit();
    }
}