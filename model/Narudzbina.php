<?php

class Narudzbina
{
    private $id;
    private $proizvodjac;
    private $model;
    private $ukupno;
    private $ime;
    private $prezime;
    private $email;
    private $adresa;

    public function __construct($id, $proizvodjac, $model, $ukupno, $ime, $prezime, $email, $adresa)
    {
        $this->id = $id;
        $this->proizvodjac = $proizvodjac;
        $this->model = $model;
        $this->ukupno = $ukupno;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->email = $email;
        $this->adresa = $adresa;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProizvodjac()
    {
        return $this->proizvodjac;
    }

    public function setProizvodjac($proizvodjac)
    {
        $this->proizvodjac = $proizvodjac;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getUkupno()
    {
        return $this->ukupno;
    }

    public function setUkupno($ukupno)
    {
        $this->ukupno = $ukupno;
    }

    public function getIme()
    {
        return $this->ime;
    }

    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    public function getPrezime()
    {
        return $this->prezime;
    }

    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAdresa()
    {
        return $this->adresa;
    }

    public function setAdresa($adresa)
    {
        $this->adresa = $adresa;
    }

    /**
     * @param Narudzbina $narudzbina
     */
    public static function unesiNarudzbinu($narudzbina)
    {
        $valueArray = array();

        $valueArray['proizvodjac'] = trim($narudzbina->getProizvodjac(), ' ');
        $valueArray['model'] = trim($narudzbina->getModel(), ' ');
        $valueArray['ukupno'] = intval(trim($narudzbina->getUkupno(), ' '));
        $valueArray['ime'] = trim($narudzbina->getIme(), ' ');
        $valueArray['prezime'] = trim($narudzbina->getPrezime(), ' ');
        $valueArray['email'] = trim($narudzbina->getEmail(), ' ');
        $valueArray['adresa'] = trim($narudzbina->getAdresa(), ' ');

        $db = DBBroker::getInstance();
        $db->insert('narudzbina', $valueArray);
    }

}