<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include ROOT . 'view/vest/unos.php';
} else {
    $nazivSlike = '/';
    if(isset($_FILES['file']['name']) &&  $_FILES['file']['name'] != "") {
        $nazivSlike = $_FILES['file']['name'];
        $res = move_uploaded_file($_FILES['file']['tmp_name'], 'D:\Fon/VII\Internet tehnologije\PHP-AJAX-MYSQL\\view/resources/' . $_FILES['file']['name']);
    }

    $tekst = nl2br($_POST['tekst']);
    $vest = new Vest(-1, trim($_POST['naslov']), trim($tekst), $nazivSlike);
    Vest::unesiVest($vest);

    header('Location: http://dev.iteh.com/vesti/');
    exit();
}