<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $telefon = Telefon::vratiTelefon($id);

    include 'view/telefon/azuriraj.php';
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id = $_POST['id'];
   // $id = Telefon::vratiTelefon($id)->getId();

    $telefon = new Telefon($id, $_POST['proizvodjac'], $_POST['cena'], $_POST['model'], $_POST['ekran'],
                            $_POST['kamera'], $_POST['procesor'], $_POST['os'], $_POST['memorija'], $_POST['kolicina'],
                            $_POST['dodatniOpis']);
    Telefon::azurirajTelefon($telefon);

    if(isset($_FILES['file']) && $_FILES['file']['name'] != "") {
        $_FILES['file']['name'] = $telefon->getModel() . '.jpg';
        $res = move_uploaded_file($_FILES['file']['tmp_name'], 'D:\Fon/VII\Internet tehnologije\PHP-AJAX-MYSQL\\view/resources/' . $_FILES['file']['name']);
    }

    header('Location: http://dev.iteh.com/telefoni/');
    exit();
}
