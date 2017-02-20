<?php
$_POST = array(); //workaround for broken PHPstorm
parse_str(file_get_contents('php://input'), $_POST);

require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/scripts/Session Control/activeUser.php');
require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/scripts/Session Control/setMenu.php');

ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prodaj ba</title>

    <link rel="stylesheet" href="../lib/css/dropdown.css">
    <link rel="stylesheet" href="../lib/css/sell.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <script src="../lib/js/sell.js"></script>
    <script type="text/javascript" src="../lib/js/dropdown.js"></script>
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
                <a href="buy.php">Kupi</a>
                <a href="sell.php">Prodaj/zamjeni</a>
            </div>
        </div>
    </div>
    <div class="column two"><h2> <a id="prijavaLink" href="login.php">👤 <?php setActiveUser(); ?></a></h2></div> <!--Prijava-->

</div>

<!--Prodaja naslov-->
<div class="row">
    <div id="prodajaNaslov" class="column three"><h3>Prodaja</h3></div>
</div>

<!--Unos podataka-->
<form onsubmit="alertProdaja()">
    <div class="row one">
        <div class="column four right"><h3>Naziv udžbenika:</h3></div>
        <div class="column four left"><h3><input type="text" name="naziv" id="naziv" placeholder="npr. Vene II" oninvalid="invalidBookName()" oninput="invalidBookName()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3>
        </div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Škola:</h3></div>
        <div class="column four left">
            <h3><input type="radio" name="skola" required>Osnovna</h3>
            <h3><input type="radio" name="skola" required>Srednja</h3>
        </div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Predmet:</h3></div>
        <div class="column four left"><h3><input type="text" name="predmet" id="predmet" placeholder="npr. Historija" oninvalid="invalidSubject()" oninput="invalidSubject()" autofocus required>
            <span class="icon-validation" data-icon="&#10004"></span></h3>
        </div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Godina izdavanja:</h3></div>
        <div class="column four left"><h3><input type="number" min="1990" id="godIzdavanja" name="godIzdavanja" placeholder="npr. 2015" oninvalid="invalidPublishingYear()" oninput="invalidPublishingYear()" autofocus required></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Stanje knjige:</h3></div>
        <div class="column four left">
            <h3><input type="radio" name="stanjeKnjige" required>Nova</h3>
            <h3><input type="radio" name="stanjeKnjige" required>Stara</h3>
        </div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Cijena:</h3></div>
        <div class="column four left"><h3><input type="number" min="0" id="cijena" name="cijena" placeholder="u KM" oninvalid="invalidPrice()" oninput="invalidPrice()" autofocus required></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Mogućnost razmjene:</h3></div>
        <div class="column four left">
            <h3><input type="radio" name="razmjena" required>Da</h3>
            <h3><input type="radio" name="razmjena" required>Ne</h3>
        </div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Dodaj sliku:</h3></div>
        <div class="column four left"><h3><input type="button" name="predmet" value="Pretraži..."></h3></div>
    </div>
    <div class="row one">
        <div id="potvrdaRow" class="column three"><h3> <input id="potvrdaButton" type="submit" value="Prodaj"> </h3></div>
    </div>
</form>

<div class="row">
    <div id="copyright" class="column three">Made with ♥ by Amer Šurković in Sarajevo. ©</div>
</div>

</BODY>

</html>