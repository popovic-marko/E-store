<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['kriterijum'])) {
        $kriterijum = explode(" ", trim($_GET['kriterijum']));

        switch ($kriterijum[sizeof($kriterijum)-1]) {
            case "rastuće":
                $telefoni = Telefon::vratiSveTelefone(null, 'cena ASC', null);
                break;
            case "opadajuće":
                $telefoni = Telefon::vratiSveTelefone(null, 'cena DESC', null);
                break;
            case "A-Z":
                $telefoni = Telefon::vratiSveTelefone(null, 'proizvodjac ASC', null);
                break;
            case "Z-A":
                $telefoni = Telefon::vratiSveTelefone(null, 'proizvodjac DESC', null);
                break;
        }

        if (empty($telefoni)) {
            $response = array();
        } else {
            foreach ($telefoni as $telefon) {
                $data[] = array('id' => $telefon->getId(), 'proizvodjac' => $telefon->getProizvodjac(),
                                'model' => $telefon->getModel(), 'cena' => $telefon->getCena());
            }
            $response = $data;
        }

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        return;
    }

    if (isset($_GET['proizvodjaci'])) {
        $proizvodjaci = $_GET['proizvodjaci'];
        $uslov = '';
        foreach ($proizvodjaci as $p) {
            $uslov .= "proizvodjac = '$p' OR ";
        }
        $uslov = substr($uslov, 0, -4);

        $telefoni = Telefon::vratiSveTelefone($uslov, 'proizvodjac ASC', null);

        if (empty($telefoni)) {
            $response = array();
        } else {
            foreach ($telefoni as $telefon) {
                $data[] = array('id' => $telefon->getId(), 'proizvodjac' => $telefon->getProizvodjac(),
                    'model' => $telefon->getModel(), 'cena' => $telefon->getCena());
            }
            $response = $data;
        }

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        return;
    }

    $telefoni = Telefon::vratiSveTelefone(null, 'cena DESC', null);
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = trim($_POST['search']);
    $uslov = "proizvodjac LIKE '%$search%' OR model LIKE '%$search%'";

    $telefoni = Telefon::vratiSveTelefone($uslov, 'cena DESC', null);
}

include ROOT . 'view/telefon/telefoni.php';