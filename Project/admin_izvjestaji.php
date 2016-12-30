<?php
session_start();

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
            <h2>Trenutno ste na pregledu izvještaja dostupnih za download.</h2>
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
            <h2>CSV Izvještaji</h2>
            <form action="downloadCSVkorisnici.php" method="get">
                Download CSV izvještaj svih korisnika <input class='dugme' type='submit' name='Opcija' value='Download'>
            </form>
            <br>
            <form action="downloadCSVudzbenici.php" method="get">
                Download CSV izvještaj svih aktivnih artikala <input class='dugme' type='submit' name='Opcija' value='Download'>
            </form>
            <br>
            <h2>PDF Izvještaj</h2>
            <form action="creatingPDF_korisnici.php" method="get">
                Pregled/download PDF izvještaja svih korisnika <input class='dugme' type='submit' name='Opcija' value='Otvori'>
            </form>
            <br>
            <form action="creatingPDF_udzbenici.php" method="get">
                Pregled/download PDF svih aktivnih artikala <input class='dugme' type='submit' name='Opcija' value='Otvori'>
            </form>
            <br>
        </hgroup>
    </div>


</div>

</BODY>

</html>