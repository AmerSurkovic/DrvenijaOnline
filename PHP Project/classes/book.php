<?php

/**
 * Created by PhpStorm.
 * User: amer
 * Date: 12/27/16
 * Time: 10:38 PM
 */
class Knjiga
{
    private $naziv;
    private $skola;
    private $predmet;
    private $godIzdavanja;
    private $stanje;
    private $cijena;
    private $mogucnostRazmjene;

    # Konstruktor
    function __construct($tempNazivC, $tempSkolaC, $tempPredmetC, $tempGodIzdavanjaC, $tempStanjeC, $tempCijenaC, $tempRazmjenaC)
    {
        $this->setNaziv($tempNazivC);
        $this->setSkola($tempSkolaC);
        $this->setPredmet($tempPredmetC);
        $this->setGodIzdavanja($tempGodIzdavanjaC);
        $this->setStanje($tempStanjeC);
        $this->setCijena($tempCijenaC);
        $this->setMogucnostRazmjene($tempRazmjenaC);
    }

    # String vrijednost
    public function setNaziv($tempNaziv){
        $this->naziv = $tempNaziv;
    }
    public function getNaziv(){
        return $this->naziv;
    }

    # String vrijednost.
    # Moze biti samo Osnovna ili Srednja skola
    public function setSkola($tempSkola){
        $this->skola=$tempSkola;
    }
    public function getSkola(){
        return $this->skola;
    }

    # String vrijednost
    public function setPredmet($tempPredmet){
        $this->predmet = $tempPredmet;
    }
    public function getPredmet(){
        return $this->predmet;
    }

    # Cjelobrojna vrijednost
    # > 1910 i < od trenutnog datuma
    public function setGodIzdavanja($tempGodIzdavanja){
        if($tempGodIzdavanja<1910 || $tempGodIzdavanja>2016){ echo "Error!"; }
        else{
            $this->godIzdavanja = $tempGodIzdavanja;
        }
    }
    public function getGodIzdavanja(){
        return $this->godIzdavanja;
    }

    # Bool vrijednost
    # TRUE = nova knjiga
    # FALSE = stara knjiga
    public function setStanje($tempStanje){
        if(gettype($tempStanje)!='boolean'){ echo "Error!"; }
        else{
            $this->stanje = $tempStanje;
        }
    }
    public function getStanje(){
        return $this->stanje;
    }

    # Vrijednost Double
    public function setCijena($tempCijena){
        $this->cijena = $tempCijena;
    }
    public function getCijena(){
        return $this->cijena;
    }

    # Bool
    # Mogucnost razmjene = true
    public function setMogucnostRazmjene($tempRazmjena){
        if(gettype($tempRazmjena)!='boolean'){ echo "Error!"; }
        else{
            $this->mogucnostRazmjene = $tempRazmjena;
        }
    }
    public function getMogucnostRazmjene($tempRazmjena){
        return $this->mogucnostRazmjene;
    }

}