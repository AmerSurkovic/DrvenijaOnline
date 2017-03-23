<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 3/19/17
 * Time: 11:27 PM
 */

$_POST = array(); //workaround for broken PHPstorm
parse_str(file_get_contents('php://input'), $_POST);

require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/scripts/Session Control/activeUser.php');
require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/scripts/Session Control/setMenu.php');
require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/database/configuration/DATABASE_CONNECTION.php');

ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Korisnički račun</title>

    <link rel="stylesheet" href="../../lib/css/dropdown.css">
    <link rel="stylesheet" href="../../lib/css/index.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="../../lib/js/index.js"></script>
    <script type="text/javascript" src="../../lib/js/dropdown.js"></script>
</head>

<BODY>

<!--Meni-->
<div id="meni" class="row">
    <div id="moto" class="column one">

        <div class="dropdownJS">
            <button onclick="myFunction()" class="dropbtnJS">☰ Drvenija.ba</button>
            <div id="myDropdownJS" class="dropdownJS-content">
                <input type="text" placeholder="Pretraži.." id="myInput" onkeyup="filterFunction()">
                <?php
                updateMenu();
                ?>
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
                <a href="../../pages/buy.php">Kupi</a>
                <a href="../../pages/sell.php">Prodaj/zamjeni</a>
            </div>
        </div>
    </div>
    <div class="column two"><h2> 👤 <?php setActiveUser(); ?> </a></h2>
    </div> <!--Prijava-->

</div>

<div class="subpage"  id="subpage">

    <!--O nama-->
    <div class="row" id="aboutUs">
        <div class="column three">
            <h2> Selam <?php setActiveUser();     ?> </h2>
            <h2 id="aboutUsCaption">Vaše informacije</h2>
            <p>

                <?php
                    try {
                        $conn = DATABASE_CONNECTION::create_PDO();

                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $session_username = $_SESSION['username'];

                        $stmt = $conn->prepare("SELECT id, name, surname, phone_number, location, username, email, password FROM users WHERE username = '$session_username'");

                        $stmt->execute();

                        $result = $stmt->fetchAll();

                        foreach ($result as $korisnik) {
                            echo "Ime: <b>" . $korisnik['name'] . "</b><br>";
                            echo "Prezime: <b>" . $korisnik['surname'] . "</b><br>";
                            echo "Username: <b>" . $korisnik['username'] . "</b><br>";
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;

                ?>
            </p>
        </div>
    </div>


    <!--Copyright-->
    <div class="row">
        <div id="copyright" class="column three">Made with ♥ by Amer Šurković in Sarajevo. ©</div>
    </div>

</div>

</BODY>

</html>