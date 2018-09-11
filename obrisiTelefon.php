<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $telefon = Telefon::vratiTelefon($id);
    unlink('D:\Fon/VII\Internet tehnologije\PHP-AJAX-MYSQL\\view/resources/' . $telefon->getModel() . '.jpg');
    Telefon::izbrisiTelefon($id);

    header('Location: http://dev.iteh.com/telefoni/');
    exit();
}
