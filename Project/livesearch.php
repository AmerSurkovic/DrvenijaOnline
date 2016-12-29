<?php

$korisnici = simplexml_load_file("korisnici.xml");

$rezultati = '';
if(isset($_GET["q"]))
{
    $q=$_GET["q"];
    if($q != '')
    {
        $brojac = 0;
        foreach ($korisnici->children() as $korisnik)
        {
            if($brojac >= 10)
                break;
            if(stristr($korisnik->Ime,$q) || stristr($korisnik->Prezime,$q))
            {
                if($brojac == 0)
                {
                    $rezultati .= "<table border='0' style='width: inherit; border-collapse: collapse'>";
                }
                $rezultati .= "<tr><td>".$korisnik->Ime."</td><td>".$korisnik->Prezime."</td></tr>";
                $brojac++;
            }
        }
        if($brojac > 0)
        {
            $rezultati .= "</table>";
        }

        if ($rezultati=='') {
            $odgovor="Nema prijedloga";
        } else {
            $odgovor=$rezultati;
        }

        echo $odgovor;
    }

}
