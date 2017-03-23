<?php
    $_POST = array(); //workaround for broken PHPstorm
    parse_str(file_get_contents('php://input'), $_POST);

    require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/scripts/Session Control/loginValidation.php');

    ob_start();
    session_start();

    if(isset($_SESSION['username'])) {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Prijava ba</title>

    <link rel="stylesheet" href="../lib/css/dropdown.css">
    <link rel="stylesheet" href="../lib/css/login.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <script src="../lib/js/login.js"></script>
    <script src="../lib/js/dropdown.js"></script>
</head>

<BODY>

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
    <div class="column two"><h2> <a id="prijavaLink" name='testt' href="login.php">👤 Prijava</a></h2></div></a></h2></div> <!--Prijava-->

</div>

<!--Korisnik nije prijavljen-->
<div class="row">
    <div id="registracija" class="column three"><h3>Nemate korisnički račun?
        <a id="registracijaLink" href="register.php"><u>Registrujte se!</u></a>
        <!--<img id="arrow" src="Pictures/arrowImg.png">-->
    </h3>
    </div>
</div>

<!--Prijava naslov-->
<div class="row">
    <div id="prijavNaslov" class="column three"><h3>Prijava</h3></div>
</div>

<?php
    validate();
?>

<!--Unos podataka-->
<form role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
    <div class="row one">
        <div class="column four right"><h3>Korisničko ime:</h3></div>
        <div class="column four left"><h3><input type="text" name="userName"></h3></div>
    </div>
    <div class="row one">
        <div class="column four right"><h3>Lozinka:</h3></div>
        <div class="column four left"><h3><input type="password" name="password"></h3></div>
    </div>
    <div class="row one">
        <div id="potvrdaRow" class="column three"><h3> <input id="potvrdaButton" name="login" type="submit" value="Prijavi se"> </h3></div>
    </div>

    Kliknite ovdje da se <a href="../scripts/logout.php" title="Logout">Odjavite.
</form>

</BODY>

<div class="row">
    <div id="copyright" class="column three">Made with ♥ by Amer Šurković in Sarajevo. ©</div>
</div>

</html>