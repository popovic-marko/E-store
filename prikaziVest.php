<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $vest = Vest::vratiVest($id);

    include ROOT . 'view/vest/prikazi.php';
}