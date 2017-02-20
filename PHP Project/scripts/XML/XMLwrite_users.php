<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 12/27/16
 * Time: 11:09 PM
 */

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><korisnici></korisnici>');
$xml->addAttribute('version', '1.0');
$xml->addChild('datetime', date('Y-m-d H:i:s'));

$i=50;

    $person = $xml->addChild('korisnik');
    $person->addChild('id', '1');
    $person->addChild('Ime', "PostojiID");
    $person->addChild('Prezime',  "test");
    $person->addChild('Telefon', "061-111-111");
    $person->addChild('Lokacija', "test");
    $person->addChild('userName', "testUser");
    $person->addChild('eMail', "test@test.com");
    $person->addChild('password', "test2222");
    $i++;

    $person = $xml->addChild('korisnik');
    $person->addChild('id', '50');
    $person->addChild('Ime', "NepostojiID");
    $person->addChild('Prezime',  "test");
    $person->addChild('Telefon', "061-111-111");
    $person->addChild('Lokacija', "test");
    $person->addChild('userName', "testUser"`);
    $person->addChild('eMail', "test@test.com");
    $person->addChild('password', "test2222");

echo $xml->asXML("korisnici.xml");
print_r($xml);