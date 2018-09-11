<?php

class Telefon
{
    private $id;
    private $proizvodjac;
    private $cena;
    private $model;
    private $ekran;
    private $kamera;
    private $procesor;
    private $os;
    private $memorija;
    private $kolicina;
    private $dodatniOpis;

    public function __construct($id, $proizvodjac, $cena, $model, $ekran, $kamera, $procesor, $os, $memorija, $kolicina,
                                $dodatniOpis)
    {
        $this->id = $id;
        $this->proizvodjac = $proizvodjac;
        $this->cena = $cena;
        $this->model = $model;
        $this->ekran = $ekran;
        $this->kamera = $kamera;
        $this->procesor = $procesor;
        $this->os = $os;
        $this->memorija = $memorija;
        $this->kolicina = $kolicina;
        $this->dodatniOpis = $dodatniOpis;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProizvodjac()
    {
        return $this->proizvodjac;
    }

    public function setProizvodjac($proizvodjac)
    {
        $this->proizvodjac = $proizvodjac;
    }

    public function getCena()
    {
        return $this->cena;
    }

    public function setCena($cena)
    {
        $this->cena = $cena;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getEkran()
    {
        return $this->ekran;
    }

    public function setEkran($ekran)
    {
        $this->ekran = $ekran;
    }

    public function getKamera()
    {
        return $this->kamera;
    }

    public function setKamera($kamera)
    {
        $this->kamera = $kamera;
    }

    public function getProcesor()
    {
        return $this->procesor;
    }

    public function setProcesor($procesor)
    {
        $this->procesor = $procesor;
    }

    public function getOs()
    {
        return $this->os;
    }

    public function setOs($os)
    {
        $this->os = $os;
    }

    public function getMemorija()
    {
        return $this->memorija;
    }

    public function setMemorija($memorija)
    {
        $this->memorija = $memorija;
    }

    public function getKolicina()
    {
        return $this->kolicina;
    }

    public function setKolicina($kolicina)
    {
        $this->kolicina = $kolicina;
    }

    public function getDodatniOpis()
    {
        return $this->dodatniOpis;
    }

    public function setDodatniOpis($dodatniOpis)
    {
        $this->dodatniOpis = $dodatniOpis;
    }

    public static function vratiSveTelefone($uslov = null, $orderBy = null, $limit = null)
    {
        $telefoni = array();
        $db = DBBroker::getInstance();
        $resultSet = $db->select('telefon','*', $uslov, $orderBy, $limit);
        foreach ($resultSet as $row) {
            $telefoni[] = new Telefon($row['id'], $row['proizvodjac'], $row['cena'], $row['model'], $row['ekran'],
                                        $row['kamera'], $row['procesor'], $row['os'], $row['memorija'],
                                        $row['kolicina'], $row['dodatniOpis']);
        }

        return $telefoni;
    }

    /**
     * @param Telefon $telefon
     */
    public static function unesiTelefon($telefon)
    {
        $valueArray = array();

        $valueArray['cena'] = intval(trim($telefon->getCena(), ' '));
        $valueArray['proizvodjac'] = trim($telefon->getProizvodjac(), ' ');
        $valueArray['model'] = trim($telefon->getModel(), ' ');
        $valueArray['ekran'] = trim($telefon->getEkran(), ' ');
        $valueArray['kamera'] = trim($telefon->getKamera(), ' ');
        $valueArray['procesor'] = trim($telefon->getProcesor(), ' ');
        $valueArray['os'] = trim($telefon->getOs(), ' ');
        $valueArray['memorija'] = trim($telefon->getMemorija(), ' ');
        $valueArray['kolicina'] = intval(trim($telefon->getKolicina(), ' '));
        $valueArray['dodatniOpis'] = trim($telefon->getDodatniOpis(), ' ');

        $db = DBBroker::getInstance();
        $db->insert('telefon', $valueArray);
    }

    public static function izbrisiTelefon($id)
    {
        $condition = "id=" . $id;
        $db = DBBroker::getInstance();
        $db->delete('telefon', $condition);
    }

    public static function vratiTelefon($id)
    {
        $condition = "id='" . $id . "'";
        $db = DBBroker::getInstance();
        $result = $db->select('telefon', '*', $condition);
        if (empty($result)) {
            return null;
        }

        $row = reset($result);
        $telefon = new Telefon($row['id'], $row['proizvodjac'], $row['cena'], $row['model'], $row['ekran'],
                                $row['kamera'], $row['procesor'], $row['os'], $row['memorija'],
                                $row['kolicina'], $row['dodatniOpis']);

        return $telefon;
    }

    /**
     * @param Telefon $telefon
     */
    public static function azurirajTelefon($telefon)
    {
        $valueArray = array();

        $valueArray['proizvodjac'] = trim($telefon->getProizvodjac(), ' ');
        $valueArray['cena'] = intval(trim($telefon->getCena(), ' '));
        $valueArray['model'] = trim($telefon->getModel(), ' ');
        $valueArray['ekran'] = trim($telefon->getEkran(), ' ');
        $valueArray['kamera'] = trim($telefon->getKamera(), ' ');
        $valueArray['procesor'] = trim($telefon->getProcesor(), ' ');
        $valueArray['os'] = trim($telefon->getOs(), ' ');
        $valueArray['memorija'] = trim($telefon->getMemorija(), ' ');
        $valueArray['kolicina'] = intval(trim($telefon->getKolicina(), ' '));
        $valueArray['dodatniOpis'] = trim($telefon->getDodatniOpis(), ' ');

        $setString = '';
        foreach($valueArray as $key => $value) {
            if(is_string($value)) {
                $setString .= $key . '=' . "'" . $value . "'" . ',';
            } else {
                $setString .= $key . '=' . $value . ',';
            }

        }
        $setString  = rtrim($setString, ",");
        $condition = "id=" . "'" . trim($telefon->getId(), ' ') . "'";

        $db = DBBroker::getInstance();
        $db->update('telefon', $setString, $condition);
    }

    public static function vratiTelefonAkoPostoji($uslov)
    {
        $uslov = "model='$uslov'";
        $db = DBBroker::getInstance();
        $resultSet = $db->select('telefon','*', $uslov);
        $a = 5;
        return $resultSet;
    }
}