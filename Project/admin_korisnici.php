<?php
session_start();

$postoji=true;

if($_SESSION['username'] != 'admin'){
    header('Location: prijava.php');
}

$errorTest = '';

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
if(isset($_REQUEST['Ime']) && !empty($_REQUEST['Ime']) && isset($_REQUEST['Prezime']) && !empty($_REQUEST['Prezime']) && isset($_REQUEST['Telefon']) && !empty($_REQUEST['Telefon']) && isset($_REQUEST['Lokacija']) && !empty($_REQUEST['Lokacija']) && isset($_REQUEST['userName']) && !empty($_REQUEST['userName']) && isset($_REQUEST['eMail']) && !empty($_REQUEST['eMail']) && isset($_REQUEST['password']) && !empty($_REQUEST['password'])){
    if($_REQUEST['Opcija']=="Dodaj"){

        if(strlen($_REQUEST['Ime']) < 3) {
            $errorTest = "Ime mora imati barem 3 slova." . "<br>";
        }
        else if(strlen($_REQUEST['Prezime']) < 3) {
            $errorTest .= "Prezime mora imati barem 3 slova." . "<br>";
        }
        else if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3,4}$/', strval($_REQUEST['Telefon']))) {
            $errorTest .= "Broj telefona mora imati oblik 000-000-000(0)" . "<br>";
        }
        else if(!preg_match('/^[A-Za-z0-9, ]{3,20}$/', strval($_REQUEST['Lokacija']))) {
            $errorTest .= "Lokacija mora imati barem 5 slova." . "<br>";
        }
        else if(!preg_match('/^[A-Za-z0-9_]{1,20}$/', strval($_REQUEST['userName']))) {
            $errorTest .= "Username mora imati barem 3 slova bez specijalnih karaktera." . "<br>";
        }
        else if(!preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', strval($_REQUEST['eMail']))) {
            $errorTest .= "Neispravan mail" . "<br>";
        }
        else if(!preg_match('/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/', strval($_REQUEST['password']))) {
            $errorTest .= "Neispravan password" . "<br>";
        }
        else{
            header("Refresh:0");
            $dodaj= array();
            $dodaj[0]=$_REQUEST['Ime'];
            $dodaj[1]=$_REQUEST['Prezime'];
            $dodaj[2]=$_REQUEST['Telefon'];
            $dodaj[3]=$_REQUEST['Lokacija'];
            $dodaj[4]=$_REQUEST['userName'];
            $dodaj[5]=$_REQUEST['eMail'];
            $dodaj[6]=$_REQUEST['password'];

            $xml=simplexml_load_file("korisnici.xml") or $postoji=false;

            if($postoji==false){
                $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><korisnici></korisnici>');
                $xml->addAttribute('version', '1.0');
                $xml->addChild('datetime', date('Y-m-d H:i:s'));
            }

            $person = $xml->addChild('korisnik');
            $person->addChild('Ime', $dodaj[0]);
            $person->addChild('Prezime', $dodaj[1]);
            $person->addChild('Telefon', $dodaj[2]);
            $person->addChild('Lokacija', $dodaj[3]);
            $person->addChild('userName', $dodaj[4]);
            $person->addChild('eMail', $dodaj[5]);
            $person->addChild('password', $dodaj[6]);
            $xml->asXML("korisnici.xml");

            header('Location: admin_korisnici.php');
        }
    }
}

$keys=array_keys($_GET);
foreach ($keys as $key => $value) {
    if($_REQUEST[$keys[$key]]=="Obrisi" || $_REQUEST[$keys[$key]]=="Izmjeni" || $_REQUEST[$keys[$key]]=="Sacuvaj"){

        $koji_red=intval(explode("_",$keys[$key])[1]);
        if($_REQUEST[$keys[$key]]=="Obrisi"){
            $red = 0;

            $xml=simplexml_load_file("korisnici.xml");

            unset($xml->korisnik[$koji_red-1]);

            $xml->asXML("korisnici.xml");

            header('Location: admin_korisnici.php');

        }
        else if($_REQUEST[$keys[$key]]=="Sacuvaj"){
            if(strlen($_REQUEST['Ime']) < 3) {
                $errorTest = "Ime mora imati barem 3 slova." . "<br>";
            }
            else if(strlen($_REQUEST['Prezime']) < 3) {
                $errorTest .= "Prezime mora imati barem 3 slova." . "<br>";
            }
            else if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3,4}$/', strval($_REQUEST['Telefon']))) {
                $errorTest .= "Broj telefona mora imati oblik 000-000-000(0)" . "<br>";
            }
            else if(!preg_match('/^[A-Za-z0-9, ]{3,20}$/', strval($_REQUEST['Lokacija']))) {
                $errorTest .= "Lokacija mora imati barem 5 slova." . "<br>";
            }
            else if(!preg_match('/^[A-Za-z0-9_]{1,20}$/', strval($_REQUEST['userName']))) {
                $errorTest .= "Username mora imati barem 3 slova bez specijalnih karaktera." . "<br>";
            }
            else if(!preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', strval($_REQUEST['eMail']))) {
                $errorTest .= "Neispravan mail" . "<br>";
            }
            else if(!preg_match('/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/', strval($_REQUEST['password']))) {
                $errorTest .= "Neispravan password" . "<br>";
            }
            else{
            $red = 0;

            $xml=simplexml_load_file("korisnici.xml") or $postoji=false;

            if($postoji==false){
                $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><korisnici></korisnici>');
                $xml->addAttribute('version', '1.0');
                $xml->addChild('datetime', date('Y-m-d H:i:s'));
            }

            $xml->korisnik[$koji_red-1]->Ime = $_REQUEST['Ime'];
            $xml->korisnik[$koji_red-1]->Prezime = $_REQUEST['Prezime'];
            $xml->korisnik[$koji_red-1]->Telefon = $_REQUEST['Telefon'];
            $xml->korisnik[$koji_red-1]->Lokacija = $_REQUEST['Lokacija'];
            $xml->korisnik[$koji_red-1]->userName = $_REQUEST['userName'];
            $xml->korisnik[$koji_red-1]->eMail = $_REQUEST['eMail'];
            $xml->korisnik[$koji_red-1]->password = $_REQUEST['password'];
            $xml->asXML("korisnici.xml");

            header('Location: admin_korisnici.php');
            }
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
            <h2>Trenutno ste na pregledu svih korisnika registrovanih na stranici.</h2>
            <a href="mainPage.php" target="_blank">Pregled "Drvenija.ba"</a>
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
            <h2>Registrovani korisnici</h2>
            <p>
            <form action="admin_korisnici.php" method="get">
                <table>
                    <tr>
                        <th>
                            Ime
                        </th>
                        <th>
                            Prezime
                        </th>
                        <th>
                            Telefon
                        </th>
                        <th>
                            Lokacija
                        </th>
                        <th>
                            Korisničko ime
                        </th>
                        <th>
                            E-mail adresa
                        </th>
                        <th>
                            Password
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
                    if (file_exists("korisnici.xml")) {
                        $xml = simplexml_load_file("korisnici.xml") or die("Error: Cannot create object");
                        foreach ($xml as $korisnik) {
                            if ($broj != $red_izmjena && !empty($korisnik->Ime)) {
                                echo "<tr>";
                                echo "<td>" . $korisnik->Ime . "</td><td>" . $korisnik->Prezime . "</td><td>" . $korisnik->Telefon . "</td><td>" . $korisnik->Lokacija . "</td><td>" . $korisnik->userName . "</td><td>" . $korisnik->eMail . "</td><td>" . $korisnik->password . "</td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "' value='Obrisi'></td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "'value='Izmjeni'></td>";
                                echo "</tr>";
                            } else if(!empty($korisnik->Ime)) {
                                echo "<tr>";
                                echo "<td><input type='text' name='Ime' value='" . $korisnik->Ime . "'></td>";
                                echo  "<td><input type='text' name='Prezime' value='" . $korisnik->Prezime . "'></td>";
                                echo  "<td><input type='text' name='Telefon' value='" . $korisnik->Telefon . "'></td>";
                                echo "<td><input type='text' name='Lokacija' value='" . $korisnik->Lokacija . "'></td>";
                                echo  "<td><input type='text' name='userName' value='" . $korisnik->userName . "'></td>";
                                echo  "<td><input type='text' name='eMail' value='" . $korisnik->eMail . "'></td>";
                                echo "<td><input type='text' name='password' value='" . $korisnik->password . "'></td>";
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
                        echo "<td><input type='text' name='Ime' value=''></td>";
                        echo  "<td><input type='text' name='Prezime' value=''></td>";
                        echo  "<td><input type='text' name='Telefon' value=''></td>";
                        echo "<td><input type='text' name='Lokacija' value=''></td>";
                        echo  "<td><input type='text' name='userName' value=''></td>";
                        echo  "<td><input type='text' name='eMail' value=''></td>";
                        echo  "<td><input type='text' name='password' value=''></td>";
                        echo  "<td colspan='2'><input class='dugme' type='submit' name='Opcija' value='Dodaj'></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            <p><?php
                echo $errorTest;
                ?></p>
            </form>
            </p>
        </hgroup>
    </div>
<!--
    <div class="brick closed">
        <hgroup>
            <h2>Test</h2>
            <a href="#" class="icon ion-close js-close close"></a>
            <form>
                <textarea></textarea>
            </form>
        </hgroup>
    </div>

    <div class="brick closed">
        <hgroup>
            <h2>Test</h2>
            <a href="#" class="icon ion-close js-close close"></a>
            <form>
                <textarea></textarea>
            </form>
        </hgroup>
    </div>

    <div class="brick closed">
        <hgroup>
            <h2>Test</h2>
            <a href="#" class="icon ion-close js-close close"></a>
            <form>
                <textarea></textarea>
            </form>
        </hgroup>
    </div>
-->

</div>

</BODY>

</html>