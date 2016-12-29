<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 12/28/16
 * Time: 2:05 AM
 */

$xml=simplexml_load_file("knjige.xml") or die("Error: Cannot create object");

foreach($xml as $kniiga){
    echo $kniiga->naziv . "<br>";
    echo $kniiga->skola . "<br>";
    echo $kniiga->predmet . "<br>";
    echo $kniiga->godinaIzdavanja . "<br>";
    echo $kniiga->stanje . "<br>";
    echo $kniiga->cijena . "<br>";
    echo $kniiga->mogucnostRazmjene . "<br>";
}
