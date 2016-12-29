<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 12/27/16
 * Time: 11:09 PM
 */

include("PHP Klase/Knjiga.php");

/*   $naziv;
$skola;
$predmet;
$godIzdavanja;
$stanje;
$cijena;
$mogucnostRazmjene;*/

$testniPodaci = array();
array_push($testniPodaci, new Knjiga("Udzbenik za 2. razred", "Osnovna", "Historija", 2015, true, 20, true));
array_push($testniPodaci, new Knjiga("Udzbenik za 3. razred", "Srednja", "Matematika", 2016, true, 15, true));

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><knjige></knjige>');
$xml->addAttribute('version', '1.0');
$xml->addChild('datetime', date('Y-m-d H:i:s'));

foreach ($testniPodaci as $Knjiga){
    $person = $xml->addChild('knjiga');
    $person->addChild('naziv', $Knjiga->getNaziv());
    $person->addChild('skola', $Knjiga->getSkola());
    $person->addChild('predmet', $Knjiga->getPredmet());
    $person->addChild('GodinaIzdavanja', $Knjiga->getGodIzdavanja());
    $person->addChild('stanje', $Knjiga->getStanje());
    $person->addChild('cijena', $Knjiga->getCijena());
    $person->addChild('MogucnostRazmjene', $Knjiga->getMogucnostRazmjene());
}

echo $xml->asXML("knjige.xml");
print_r($xml);