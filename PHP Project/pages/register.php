<?php
    $_POST = array(); //workaround for broken PHPstorm
    parse_str(file_get_contents('php://input'), $_POST);

    require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/database/configuration/DATABASE_CONNECTION.php');

    ob_start();
    session_start();

    if(isset($_SESSION['username'])) {
        header('Location: ../index.php');
    }

    $postoji=true;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registracija ba</title>

    <link rel="stylesheet" href="../lib/css/dropdown.css">
    <link rel="stylesheet" href="../lib/css/register.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

  <!-- <script src="../lib/js/register.js"></script> -->
    <script src="../lib/js/dropdown.js"></script>
</head>

<BODY>

<?php
if(isset($_REQUEST['ime']) && !empty($_REQUEST['ime']) && isset($_REQUEST['prezime']) && !empty($_REQUEST['prezime']) && isset($_REQUEST['telefon']) && !empty($_REQUEST['telefon']) && isset($_REQUEST['lokacija']) && !empty($_REQUEST['lokacija']) && isset($_REQUEST['userName']) && !empty($_REQUEST['userName']) && isset($_REQUEST['eMail']) && !empty($_REQUEST['eMail']) && isset($_REQUEST['password']) && !empty($_REQUEST['password'])){
    if($_REQUEST['Opcija']=="Registruj"){
        $dodaj= array();
        $dodaj[0]=$_REQUEST['ime'];
        $dodaj[1]=$_REQUEST['prezime'];
        $dodaj[2]=$_REQUEST['telefon'];
        $dodaj[3]=$_REQUEST['lokacija'];
        $dodaj[4]=$_REQUEST['userName'];
        $dodaj[5]=$_REQUEST['eMail'];
        $dodaj[6]=$_REQUEST['password'];

        try{
            $connection = DATABASE_CONNECTION::create_PDO();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $statement = $connection->prepare("INSERT INTO users (id, name, surname, phone_number, location, username, email, password) VALUES (NULL, :name, :surname, :phone_number, :location, :username, :email, :password)");

            $name = $dodaj[0];
            $surname = $dodaj[1];
            $phone_number = $dodaj[2];
            $location = $dodaj[3];
            $username = $dodaj[4];
            $email = $dodaj[5];
            $password = $dodaj[6];

            $statement->bindParam(':name', $name);
            $statement->bindParam(':surname', $surname);
            $statement->bindParam(':phone_number', $phone_number);
            $statement->bindParam(':location', $location);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);

            $statement->execute();

            header('Location: ../index.php');
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $connection=null;

        /*$xml=simplexml_load_file("users.xml") or $postoji=false;

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
        $xml->asXML("users.xml");

        #header('Location: admin_korisnici.php');*/

    }
}

?>

<!--Meni-->
<div id="meni" class="row">
    <div id="moto" class="column one">

        <div class="dropdownJS">
            <button onclick="myFunction()" class="dropbtnJS">☰ Drvenija.ba</button>
            <div id="myDropdownJS" class="dropdownJS-content">
                <input type="text" placeholder="Pretraži.." id="myInput" onkeyup="filterFunction()">
                <a href="../index.php">Početna</a>
                <a href="login.php">Prijava</a>
                <a href="register.php">Registracija</a>
                <a href="buy.php">Kupi</a>
                <a href="sell.php">Prodaj</a>
            </div>
        </div>
        <br>
        Skromni sponzor roditelja i učenika.
    </div>
    <div class="column two"><h2> <a id="aboutUsLink" href="#aboutUsCaption">O nama</a> </h2></div> <!--O nama-->
    <div class="column two"> <!--Usluge-->
        <div class="dropdown">
            <button id="realMenu" class="dropbtn">Usluge</button>
            <div class="dropdown-content">
                <a href="buy.php">Kupi</a>
                <a href="sell.php">Prodaj/zamjeni</a>
            </div>
        </div>
    </div>
    <div class="column two"><h2> <a id="prijavaLink" href="login.php">👤 Prijava</a></h2></div> <!--Prijava-->

</div>

<!--Korisnik je prijavljen-->
<div class="row">
    <div id="prijava" class="column three"><h3>Već imate korisnički račun?
        <a id="prijavaLink1" href="javascript:loadSubPage('prijava.html')"><u>Prijavite se!</u></a>
        <!--<img id="arrow" src="Pictures/arrowImg.png">-->
    </h3>
    </div>
</div>

<!--Registracija naslov-->
<div class="row">
    <div id="registracijaNaslov" class="column three"><h3>Registracija</h3></div>
</div>

<!--Unos podataka-->
<form action="register.php" method="get" onsubmit="alertRegistracija()">
    <div class="row one">
        <div class="column four right"><h3>Ime:</h3></div>
        <div class="column four left"><h3><input type="text" name="ime" id="ime" oninvalid="invalidName()" oninput="invalidName()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span> </h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Prezime:</h3></div>
        <div class="column four left"><h3><input type="text" name="prezime" id="prezime" oninvalid="invalidSurname()" oninput="invalidSurname()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Kontakt telefon:</h3></div>
        <div class="column four left"><h3><input type="text" name="telefon" id="telefon" oninvalid="invalidPhone()" oninput="invalidPhone()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Lokacija:</h3></div>
        <div class="column four left"><h3><input type="text" name="lokacija" id="lokacija" oninvalid="invalidLocation()" oninput="invalidLocation()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Korisničko ime:</h3></div>
        <div class="column four left"><h3><input type="text" name="userName" id="userName" oninvalid="invalidUsername()" oninput="invalidUsername()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>E-mail adresa:</h3></div>
        <div class="column four left"><h3><input type="email" name="eMail" id="eMail" oninvalid="invalidMail()" oninput="invalidMail()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Lozinka:</h3></div>
        <div class="column four left"><h3><input type="password" name="password" id="password" oninvalid="invalidPassword()" oninput="invalidPassword()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Potvrdite lozinku:</h3></div>
        <div class="column four left"><h3><input type="password" name="passwordRepeat" id="passwordRepeat" oninvalid="invalidRepeatPassword()" oninput="invalidRepeatPassword()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3></div>
    </div>
    <div class="row one">
        <div id="potvrdaRow" class="column three"><h3> <input type='submit' name='Opcija' id="potvrdaButton" value="Registruj"> </h3></div>
    </div>

    <!--<div id="openModal" class="modalDialog">
        <div>
            <h2>Drvenija.ba</h2>
            <p>Poštovani, hvala Vam na registraciji.</p>
            <p>Iskoristite vaš korisnički račun i počnite sa kupovinom, prodajom i razmjenom udžbenika.</p>
            <p id="prijavaAllign"><input id="prijaviSe" type="submit" value="Prijavi se" onclick="window.location.href='#close'"></p>
        </div>
    </div>-->

</form>

<div class="row">
    <div id="copyright" class="column three">Made with ♥ by Amer Šurković in Sarajevo. ©</div>
</div>

</BODY>

</html>