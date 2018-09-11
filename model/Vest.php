<?php

class Vest
{
    private $id;
    private $naslov;
    private $tekst;
    private $nazivSlike;

    public function __construct($id, $naslov, $tekst, $nazivSlike)
    {
        $this->id = $id;
        $this->naslov = $naslov;
        $this->tekst = $tekst;
        $this->nazivSlike = $nazivSlike;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNaslov()
    {
        return $this->naslov;
    }

    public function setNaslov($naslov)
    {
        $this->naslov = $naslov;
    }

    public function getTekst()
    {
        return $this->tekst;
    }

    public function setTekst($tekst)
    {
        $this->tekst = $tekst;
    }

    public function getNazivSlike()
    {
        return $this->nazivSlike;
    }

    public function setNazivSlike($nazivSlike)
    {
        $this->nazivSlike = $nazivSlike;
    }

    public static function vratiSveVesti($uslov = null, $orderBy = null, $limit = null)
    {
        $vesti = array();
        $db = DBBroker::getInstance();
        $resultSet = $db->select('vest','*', $uslov, $orderBy, $limit);
        foreach ($resultSet as $row) {
            $vesti[] = new Vest($row['id'], $row['naslov'], $row['tekst'], $row['nazivSlike']);
        }

        return $vesti;
    }

    public static function unesiVest($vest)
    {
        $valueArray = array();

        $valueArray['naslov'] = trim($vest->getNaslov(), ' ');
        $valueArray['tekst'] = trim($vest->getTekst(), ' ');
        $valueArray['nazivSlike'] = trim($vest->getNazivSlike(), ' ');

        $db = DBBroker::getInstance();
        $db->insert('vest', $valueArray);
    }

    public static function izbrisiVest($id)
    {
        $condition = "id=" . $id;
        $db = DBBroker::getInstance();
        $db->delete('vest', $condition);
    }

    public static function vratiVest($id)
    {
        $condition = "id='" . $id . "'";
        $db = DBBroker::getInstance();
        $result = $db->select('vest', '*', $condition);

        if (empty($result)) {
            return null;
        }
        $row = reset($result);
        $vest = new Vest($row['id'], $row['naslov'], $row['tekst'], $row['nazivSlike']);

        return $vest;
    }

    public static function azurirajVest($vest)
    {
        $valueArray = array();

        $valueArray['naslov'] = trim($vest->getNaslov(), ' ');
        $valueArray['tekst'] = trim($vest->getTekst(), ' ');
        $valueArray['nazivSlike'] = trim($vest->getNazivSlike(), ' ');

        $setString = '';
        foreach($valueArray as $key => $value) {
            if(is_string($value)) {
                $setString .= $key . '=' . "'" . $value . "'" . ',';
            } else {
                $setString .= $key . '=' . $value . ',';
            }

        }
        $setString  = rtrim($setString, ",");
        $condition = "id=" . trim($vest->getId(), ' ');

        $db = DBBroker::getInstance();
        $db->update('vest', $setString, $condition);
    }
}