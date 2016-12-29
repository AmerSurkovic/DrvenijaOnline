<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registracija ba</title>

    <link rel="stylesheet" href="lib/css/dropdown.css">
    <link rel="stylesheet" href="lib/css/registracija.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <script src="lib/js/registracija.js"></script>
    <script src="lib/js/dropdown.js"></script>
</head>

<BODY>

<!--Meni-->
<div id="meni" class="row">
    <div id="moto" class="column one">

        <div class="dropdownJS">
            <button onclick="myFunction()" class="dropbtnJS">☰ Drvenija.ba</button>
            <div id="myDropdownJS" class="dropdownJS-content">
                <input type="text" placeholder="Pretraži.." id="myInput" onkeyup="filterFunction()">
                <a href="mainPage.html">Početna</a>
                <a href="prijava.php">Prijava</a>
                <a href="registracija.php">Registracija</a>
                <a href="kupi.html">Kupi</a>
                <a href="prodaj.html">Prodaj</a>
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
                <a href="kupi.html">Kupi</a>
                <a href="prodaj.html">Prodaj/zamjeni</a>
            </div>
        </div>
    </div>
    <div class="column two"><h2> <a id="prijavaLink" href="prijava.php">👤 Prijava</a></h2></div> <!--Prijava-->

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
<form onsubmit="alertRegistracija()">
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
        <div id="potvrdaRow" class="column three"><h3> <input id="potvrdaButton" type="submit" value="Registruj se"> </h3></div>
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