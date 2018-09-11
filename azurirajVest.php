<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $vest = Vest::vratiVest($id);

    include 'view/vest/azuriraj.php';
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nazivSlike = '/';
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
        $nazivSlike = $_FILES['file']['name'];
        $res = move_uploaded_file($_FILES['file']['tmp_name'], 'D:\Fon/VII\Internet tehnologije\PHP-AJAX-MYSQL\\view/resources/' . $_FILES['file']['name']);
    } else {
        $id = $_POST['id'];
        $vest = Vest::vratiVest($id);
        if($vest->getNazivSlike() != '/') {
            $slikaZaBrisanje = $_POST['nazivSlike'];
            unlink('D:\Fon/VII\Internet tehnologije\PHP-AJAX-MYSQL\\view/resources/' . $slikaZaBrisanje);
        }
    }

    $tekst = nl2br($_POST['tekst']);
    $vest = new Vest(intval($_POST['id']), trim($_POST['naslov']), trim($tekst), $nazivSlike);
    Vest::azurirajVest($vest);

    header('Location: http://dev.iteh.com/vesti/');
    exit();
}
