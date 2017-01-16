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
        <li><a class="brick navigation" href="admin_komentari.php"><span class='icon ion-android-share-alt'></span>Komentari korisnika</a></li>
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
            <h2>Dobro došli</h2>
            <a href="mainPage.php" target="_blank">Pregled "Drvenija.ba"</a>
            <br>
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
            <script>
                function showResult(str) {
                    if (str.length==0) {
                        document.getElementById("livesearch").innerHTML="";
                        document.getElementById("livesearch").style.border="0px";
                        return;
                    }
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    } else {  // code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function() {
                        if (this.readyState==4 && this.status==200) {
                            document.getElementById("livesearch").innerHTML=this.responseText;
                            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                        }
                    }
                    xmlhttp.open("GET","livesearch.php?q="+str,true);
                    xmlhttp.send();
                }
            </script>
            <h2>Pretraga korisnika</h2>
            <form>
                <input type="text" size="30" onkeyup="showResult(this.value)">
                <div id="livesearch"></div>
            </form>
        </hgroup>
    </div>

</div>

</BODY>

</html>