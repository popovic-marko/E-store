<?php
include 'init.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include ROOT . 'view/telefon/unos.php';
} else {
    $rez = Telefon::vratiTelefonAkoPostoji(trim($_POST['model']));
    if (!empty($rez)) {
        $poruka = 'Telefon sa unetim modelom vec postoji!';
        $telefon = new Telefon(-1, $_POST['proizvodjac'], $_POST['cena'], $_POST['model'], $_POST['ekran'],
                                $_POST['kamera'], $_POST['procesor'], $_POST['os'], $_POST['memorija'],
                                $_POST['kolicina'] ,$_POST['dodatniOpis']);
        include ROOT . 'view/telefon/unos.php';
    } else {
        $telefon = new Telefon(-1, $_POST['proizvodjac'], $_POST['cena'], $_POST['model'], $_POST['ekran'],
                                $_POST['kamera'], $_POST['procesor'], $_POST['os'], $_POST['memorija'], $_POST['kolicina'],
                                $_POST['dodatniOpis']);
        Telefon::unesiTelefon($telefon);

        if(isset($_FILES['file'])) {
            $_FILES['file']['name'] = $telefon->getModel() . '.jpg';
            $res = move_uploaded_file($_FILES['file']['tmp_name'], 'D:\Fon/VII\Internet tehnologije\PHP-AJAX-MYSQL\\view/resources/' . $_FILES['file']['name']);
        }

        //include ROOT . '/view/telefon/telefoni.php';
        header('Location: http://dev.iteh.com/telefoni/');
        exit();
    }
}
