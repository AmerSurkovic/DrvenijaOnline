<?php
session_start();

$postoji=true;

if($_SESSION['username'] != 'admin'){
    header('Location: prijava.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<HEADER>
    <link rel="stylesheet" href="lib/css/adminDashboard.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="lib/js/adminDashboard.js"></script>
</HEADER>

<BODY>

<?php
$red_izmjena=-1;
if(isset($_REQUEST['Naziv']) && !empty($_REQUEST['Naziv']) && isset($_REQUEST['Skola']) && !empty($_REQUEST['Skola']) && isset($_REQUEST['Predmet']) && !empty($_REQUEST['Predmet']) && isset($_REQUEST['GodinaIzdavanja']) && !empty($_REQUEST['GodinaIzdavanja']) && isset($_REQUEST['Stanje']) && !empty($_REQUEST['Stanje']) && isset($_REQUEST['Cijena']) && !empty($_REQUEST['Cijena']) && isset($_REQUEST['MogucnostRazmjene']) && !empty($_REQUEST['MogucnostRazmjene'])){
    if($_REQUEST['Opcija']=="Dodaj"){
     /*   $dodaj= array();
        $dodaj[0]=$_REQUEST['Naziv'];
        $dodaj[1]=$_REQUEST['Skola'];
        $dodaj[2]=$_REQUEST['Predmet'];
        $dodaj[3]=$_REQUEST['GodinaIzdavanja'];
        $dodaj[4]=$_REQUEST['Stanje'];
        $dodaj[5]=$_REQUEST['Cijena'];
        $dodaj[6]=$_REQUEST['MogucnostRazmjene'];
*/
        $xml=simplexml_load_file("knjige.xml") or $postoji=false;

        if($postoji==false){
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><knjige></knjige>');
            $xml->addAttribute('version', '1.0');
            $xml->addChild('datetime', date('Y-m-d H:i:s'));
        }

        $person = $xml->addChild('knjiga');
        $person->addChild('naziv', $_REQUEST['Naziv']);
        $person->addChild('skola', $_REQUEST['Skola']);
        $person->addChild('predmet', $_REQUEST['Predmet']);
        $person->addChild('GodinaIzdavanja', $dodaj[3]=$_REQUEST['GodinaIzdavanja']);
        $person->addChild('stanje', $_REQUEST['Stanje']);
        $person->addChild('cijena', $_REQUEST['Cijena']);
        $person->addChild('MogucnostRazmjene', $_REQUEST['MogucnostRazmjene']);
        $xml->asXML("knjige.xml");

        header('Location: admin_udzbenici.php');
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

            header('Location: admin_udzbenici.php');

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
            $xml->knjiga[$koji_red-1]->GodinaIzdavanja = $_REQUEST['GodinaIzdavanja'];
            $xml->knjiga[$koji_red-1]->stanje = $_REQUEST['Stanje'];
            $xml->knjiga[$koji_red-1]->cijena = $_REQUEST['Cijena'];
            $xml->knjiga[$koji_red-1]->MogucnostRazmjene = $_REQUEST['MogucnostRazmjene'];
            $xml->asXML("knjige.xml");

            header('Location: admin_udzbenici.php');
        }
        else{
            $red_izmjena=$koji_red;
        }
    }
}
?>

<h1 id="naslov">Drvenija.ba</h1>
<h3 id="naslov2">Admin dasboard</h3>

<nav>
    <ul>
        <li><a class="brick dashboard" href="admin_dashboard.php"><span class='icon ion-home'></span>Dashboard</a></li>
        <li><a class="brick pages" href="admin_korisnici.php"><span class='icon ion-document'></span>Registrovani korisnici</a></li>
        <li><a class="brick navigation" href="admin_udzbenici.php"><span class='icon ion-android-share-alt'></span>Udžbenici u prodaji</a></li>
        <li><a class="brick settings" href="admin_izvjestaji.php"><span class='icon ion-gear-a'></span>Izvještaji</a></li>
        <li><a class="brick users" href="logout.php"><span class='icon ion-person'></span>👤 Odjavi se</a></li>
    </ul>
</nav>

<div id="content" class="pages">

    <header>
        <div class="brick identify">
            <span class="icon ion-document"></span>
        </div>

        <div class="brick title">
            <h2>Trenutno ste na pregledu svih artikala registrovanih za prodaju.</h2>
            <a href="mainPage.html" target="_blank">Pregled "Drvenija.ba"</a>
        </div>

        <div class="brick close">
            <span class="text"></span>
            <span class="icon ion-close"></span>
        </div>


        <div class="brick save">
            <span class="text"></span>
            <span class="icon ion-checkmark"></span>
        </div>

    </header>


    <div class="brick closed">
        <hgroup>
            <h2>Udžbenici u prodaji</h2>
            <p>
            <form action="admin_udzbenici.php" method="get">
                <table>
                    <tr>
                        <th>
                            Naziv
                        </th>
                        <th>
                            Škola
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
                            Brisanje
                        </th>
                        <th>
                            Editovanje
                        </th>
                    </tr>
                    <?php
                    $broj = 0;
                    if (file_exists("knjige.xml")) {
                        $xml = simplexml_load_file("knjige.xml") or die("Error: Cannot create object");
                        foreach ($xml as $knjiga) {
                            if ($broj != $red_izmjena && !empty($knjiga->naziv)) {
                                echo "<tr>";
                                echo "<td>" . $knjiga->naziv . "</td><td>" . $knjiga->skola . "</td><td>" . $knjiga->predmet . "</td><td>" . $knjiga->GodinaIzdavanja . "</td><td>" . $knjiga->stanje . "</td><td>" . $knjiga->cijena . "</td><td>" . $knjiga->MogucnostRazmjene . "</td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "' value='Obrisi'></td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "'value='Izmjeni'></td>";
                                echo "</tr>";
                            } else if (!empty($knjiga->naziv)) {
                                echo "<tr>";
                                echo "<td><input type='text' name='Naziv' value='" . $knjiga->naziv . "'></td>";
                                echo  "<td><input type='text' name='Skola' value='" . $knjiga->skola . "'></td>";
                                echo  "<td><input type='text' name='Predmet' value='" . $knjiga->predmet . "'></td>";
                                echo "<td><input type='text' name='GodinaIzdavanja' value='" . $knjiga->GodinaIzdavanja . "'></td>";
                                echo  "<td><input type='text' name='Stanje' value='" . $knjiga->stanje . "'></td>";
                                echo  "<td><input type='text' name='Cijena' value='" . $knjiga->cijena . "'></td>";
                                echo "<td><input type='text' name='MogucnostRazmjene' value='" . $knjiga->MogucnostRazmjene . "'></td>";
                                echo  "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "' value='Obrisi'>";
                                echo   "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "' value='Sacuvaj'>";
                                echo "</tr>";
                            }
                            $broj++;
                        }
                    }
                    ?>
                    <?php
                    if($red_izmjena==-1){
                        echo "<tr>";
                        echo "<td><input type='text' name='Naziv' value=''></td>";
                        echo  "<td><input type='text' name='Skola' value=''></td>";
                        echo  "<td><input type='text' name='Predmet' value=''></td>";
                        echo "<td><input type='text' name='GodinaIzdavanja' value=''></td>";
                        echo  "<td><input type='text' name='Stanje' value=''></td>";
                        echo  "<td><input type='text' name='Cijena' value=''></td>";
                        echo  "<td><input type='text' name='MogucnostRazmjene' value=''></td>";
                        echo  "<td colspan='2'><input class='dugme' type='submit' name='Opcija' value='Dodaj'></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </form>
            </p>
        </hgroup>
    </div>


</div>

</BODY>

</html>