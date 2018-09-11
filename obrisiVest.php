<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $vest = Vest::vratiVest($id);
    if($vest->getNazivSlike() != "/") {
        unlink('D:\Fon/VII\Internet tehnologije\PHP-AJAX-MYSQL\\view/resources/' . $vest->getNazivSlike());
    }
    Vest::izbrisiVest($id);

    header('Location: http://dev.iteh.com/telefoni/');
    exit();
}