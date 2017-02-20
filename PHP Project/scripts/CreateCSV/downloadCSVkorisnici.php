<?php

function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w');

    $headings = array('Ime', 'Prezime', 'Telefon', 'Lokacija', 'userName', 'email', 'password');

    fputcsv($f, $headings, $delimiter);

    // loop over the input array
    foreach ($array as $line) {
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter);
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}

$array = array();

$xml=simplexml_load_file("../../users.xml") or die("Error: Cannot create object");

foreach($xml as $korisnik){
    if(empty($korisnik->Ime)) {
        // Do nothing
    }
    else{
        array_push($array, array($korisnik->Ime, $korisnik->Prezime, $korisnik->Telefon, $korisnik->Lokacija, $korisnik->userName, $korisnik->eMail, $korisnik->password));
    }
}

array_to_csv_download(
    $array,
    "korisnici.csv"
);