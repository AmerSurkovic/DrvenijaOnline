<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 12/28/16
 * Time: 8:45 PM
 */
$postoji=true;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tutorijal 7 Zadatak 1</title>
    <link rel="stylesheet" type="text/css" href="lib/css/stil.css" >
  </head>
  <body>
    <?php
    $red_izmjena=-1;
     if(isset($_REQUEST['Naziv']) && !empty($_REQUEST['Naziv']) && isset($_REQUEST['Skola']) && !empty($_REQUEST['Skola']) && isset($_REQUEST['Predmet']) && !empty($_REQUEST['Predmet']) && isset($_REQUEST['GodinaIzdavanja']) && !empty($_REQUEST['GodinaIzdavanja']) && isset($_REQUEST['Stanje']) && !empty($_REQUEST['Stanje']) && isset($_REQUEST['Cijena']) && !empty($_REQUEST['Cijena']) && isset($_REQUEST['MogucnostRazmjene']) && !empty($_REQUEST['MogucnostRazmjene'])){
         if($_REQUEST['Opcija']=="Dodaj"){
             $dodaj= array();
             $dodaj[0]=$_REQUEST['Naziv'];
             $dodaj[1]=$_REQUEST['Skola'];
             $dodaj[2]=$_REQUEST['Predmet'];
             $dodaj[3]=$_REQUEST['GodinaIzdavanja'];
             $dodaj[4]=$_REQUEST['Stanje'];
             $dodaj[5]=$_REQUEST['Cijena'];
             $dodaj[6]=$_REQUEST['Mogucnost razmjene'];

             $xml=simplexml_load_file("knjige.xml") or $postoji=false;

             if($postoji==false){
                 $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><knjige></knjige>');
                 $xml->addAttribute('version', '1.0');
                 $xml->addChild('datetime', date('Y-m-d H:i:s'));
             }

             $person = $xml->addChild('knjiga');
             $person->addChild('naziv', $dodaj[0]);
             $person->addChild('skola', $dodaj[1]);
             $person->addChild('predmet', $dodaj[2]);
             $person->addChild('godinaIzdavanja', $dodaj[3]);
             $person->addChild('stanje', $dodaj[4]);
             $person->addChild('cijena', $dodaj[5]);
             $person->addChild('mogucnostRazmjene', $dodaj[6]);
             $xml->asXML("knjige.xml");

             header('Location: udzbeniciAdmin.php');
         }
     }

     $keys=array_keys($_GET);
     foreach ($keys as $key => $value) {
         if($_REQUEST[$keys[$key]]=="Obrisi" || $_REQUEST[$keys[$key]]=="Izmjeni" || $_REQUEST[$keys[$key]]=="Sacuvaj"){
             $koji_red=intval(explode("_",$keys[$key])[1]);
             if($_REQUEST[$keys[$key]]=="Obrisi"){
                 $red = 0;

                 $xml=simplexml_load_file("knjige.xml");

                 unset($xml->knjiga[$koji_red-1]);

                 $xml->asXML("knjige.xml");

                 header('Location: udzbeniciAdmin.php');

             }
             else if($_REQUEST[$keys[$key]]=="Sacuvaj"){
                 $red = 0;

                 $xml=simplexml_load_file("knjige.xml") or $postoji=false;

                 if($postoji==false){
                     $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><knjige></knjige>');
                     $xml->addAttribute('version', '1.0');
                     $xml->addChild('datetime', date('Y-m-d H:i:s'));
                 }

                 $xml->knjiga[$koji_red-1]->naziv = $_REQUEST['Naziv'];
                 $xml->knjiga[$koji_red-1]->skola = $_REQUEST['Skola'];
                 $xml->knjiga[$koji_red-1]->predmet = $_REQUEST['Predmet'];
                 $xml->knjiga[$koji_red-1]->godinaIzdavanja = $_REQUEST['Godina izdavanja'];
                 $xml->knjiga[$koji_red-1]->stanje = $_REQUEST['Stanje'];
                 $xml->knjiga[$koji_red-1]->cijena = $_REQUEST['Cijena'];
                 $xml->knjiga[$koji_red-1]->mogucnostRazmjene = $_REQUEST['Mogucnost razmjene'];
                 $xml->asXML("knjige.xml");

                 header('Location: udzbeniciAdmin.php');
             }
             else{
                 $red_izmjena=$koji_red;
             }
         }
     }
     ?>
<form action="udzbeniciAdmin.php" method="get">
    <table>
        <tr>
            <th>
                Naziv
            </th>
            <th>
                Skola
            </th>
            <th>
                Predmet
            </th>
            <th>
                Godina izdavanja
            </th>
            <th>
                Stanje
            </th>
            <th>
                Cijena
            </th>
            <th>
                Mogućnost razmjene
            </th>
            <th>
                Opcija a
            </th>
            <th>
                Opcija b
            </th>
        </tr>
        <?php
        $broj = 0;
        if (file_exists("knjige.xml")) {
            $xml = simplexml_load_file("knjige.xml") or die("Error: Cannot create object");
            foreach ($xml as $knjiga) {
                    if ($broj != $red_izmjena) {
                        print "<tr>";
                        print "<td>" . $knjiga->naziv . "</td><td>" . $knjiga->skola . "</td><td>" . $knjiga->predmet . "</td><td>" . $knjiga->GodinaIzdavanja . "</td><td>" . $knjiga->stanje . "</td><td>" . $knjiga->cijena . "</td><td>" . $knjiga->MogucnostRazmjene . "</td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "' value='Obrisi'></td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "'value='Izmjeni'></td>";
                        print "</tr>";
                    } else {
                        print "<tr>";
                        print "<td><input type='text' name='Naziv' value='" . $knjiga->naziv . "'></td>";
                        print  "<td><input type='text' name='Skola' value='" . $knjiga->skola . "'></td>";
                        print  "<td><input type='text' name='Predmet' value='" . $knjiga->predmet . "'></td>";
                        print "<td><input type='text' name='GodinaIzdavanja' value='" . $knjiga->GodinaIzdavanja . "'></td>";
                        print  "<td><input type='text' name='Stanje' value='" . $knjiga->stanje . "'></td>";
                        print  "<td><input type='text' name='Cijena' value='" . $knjiga->cijena . "'></td>";
                        print "<td><input type='text' name='MogucnostRazmjene' value='" . $knjiga->MogucnostRazmjene . "'></td>";
                        print  "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "' value='Obrisi'>";
                        print   "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "' value='Sacuvaj'>";
                        print "</tr>";
                   }
                   $broj++;
            }
        }
        ?>
        <?php
        if($red_izmjena==-1){
            print "<tr>";
            print "<td><input type='text' name='Naziv' value=''></td>";
            print  "<td><input type='text' name='Skola' value=''></td>";
            print  "<td><input type='text' name='Predmet' value=''></td>";
            print "<td><input type='text' name='GodinaIzdavanja' value=''></td>";
            print  "<td><input type='text' name='Stanje' value=''></td>";
            print  "<td><input type='text' name='Cijena' value=''></td>";
            print  "<td><input type='text' name='MogucnostRazmjene' value=''></td>";
            print  "<td colspan='2'><input class='dugme' type='submit' name='Opcija' value='Dodaj'></td>";
            print "</tr>";
        }
        ?>
    </table>
</form>

</body>
</html>
