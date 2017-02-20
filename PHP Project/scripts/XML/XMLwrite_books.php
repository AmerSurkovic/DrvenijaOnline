<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 12/27/16
 * Time: 11:09 PM
 */

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><knjige></knjige>');
$xml->addAttribute('version', '1.0');
$xml->addChild('datetime', date('Y-m-d H:i:s'));

$i=50;

    $person = $xml->addChild('knjiga');
    $person->addChild('id', '1');
    $person->addChild('naziv', "PostojiID");
    $person->addChild('skola',  "Osnovna");
    $person->addChild('predmet', "Test");
    $person->addChild('GodinaIzdavanja', "1994");
    $person->addChild('stanje', "1");
    $person->addChild('cijena', "50");
    $person->addChild('MogucnostRazmjene', "1");
    $i++;

    $person = $xml->addChild('knjiga');
    $person->addChild('id', '51');
    $person->addChild('naziv', "NepostojiID");
    $person->addChild('skola',  "Srednja");
    $person->addChild('predmet', "Test");
    $person->addChild('GodinaIzdavanja', "1994");
    $person->addChild('stanje', "1");
    $person->addChild('cijena', "50");
    $person->addChild('MogucnostRazmjene', "1");


echo $xml->asXML("books.xml");
print_r($xml);