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
    <title>Kupi ba</title>

    <link rel="stylesheet" href="../lib/css/dropdown.css">
    <link rel="stylesheet" href="../lib/css/buy.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <script src="../lib/js/buy.js"></script>
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
                <a href="kupi.html">Kupi</a>
                <a href="sell.php">Prodaj/zamjeni</a>
            </div>
        </div>
    </div>
    <div class="column two"><h2> <a id="prijavaLink" href="login.php">👤 <?php setActiveUser(); ?></a></h2></div> <!--Prijava-->

</div>


<!--Listing-->
<div class="row">
    <div class="column four">
        <div id="ponude" class="row"><h3>Aktuelne ponude</h3></div>
        <form>
        <div id="pretraga" class="row two">Pretraga: <input type="search" name="search">
            <!--<img id="arrow" src="Pictures/arrowImg.png">-->
        </div>
        </form>

        <div class="row one">
            <div class="column seven">
                <div class="gallery" align="center">
                    <h3 id="mostWantedTitle">Najtraženije</h3>
                    <div class="thumbnails">
                        <img onmouseover="preview.src=img1.src" name="img1" src="../resources/pictures/bosanski.jpg" alt="" />
                        <img onmouseover="preview.src=img2.src" name="img2" src="../resources/pictures/mojaOkolina.jpg" alt="" />
                        <img onmouseover="preview.src=img3.src" name="img3" src="../resources/pictures/matematika2.jpg" alt="" />
                        <img onmouseover="preview.src=img4.src" name="img4" src="../resources/pictures/historija.jpg" alt="" />
                        <img onmouseover="preview.src=img5.src" name="img5" src="../resources/pictures/biologija.jpg" alt="" />
                    </div>
                    <div class="preview">
                        <img name="preview" id="previewImage" onclick="load()" src="../resources/pictures/historija.jpg" alt=""/>
                        <h3 id="opis"><span class="spacer">Cijena: 7KM</span><br>
                            <span class="spacer">Lokacija: Sarajevo</span>
                        </h3>
                    </div>
                </div> <!-- Close the gallery div -->

                <div id="openModal" class="modalDialog">
                    <div class="column seven">
                        <a href="#close" id="Close" title="Close" class="close">X</a>
                        <img name="fullScreen" id="fullScreen" src="" alt="">
                    </div>
                </div>

            </div>
        </div>

        <div class="row one">
            <div class="column five">
                <img src="../resources/pictures/matematika2.jpg">
            </div>
            <div class="column six">
                <p>
                    Mogućnost razmjene: <b>DA</b> <br>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in faucibus enim. Vestibulum vel fringilla quam, id vehicula purus. Sed sagittis pulvinar risus eget ullamcorper. Morbi a elit id sem consectetur pretium sed at ligula. Cras vehicula arcu sodales augue bibendum eleifend. Aliquam condimentum nisl ligula, sit amet pretium arcu mollis tempor. Nunc feugiat dui eu ipsum congue consequat. Aenean a luctus lectus. Etiam varius maximus nisl, eu vestibulum ante. Nam dictum tempor purus, ac sagittis risus. Fusce vel leo lobortis, lacinia urna quis, facilisis nulla. Vestibulum pellentesque at nisi ac pulvinar. Nunc lacinia pellentesque urna a sagittis. Nullam ac lacinia enim. Ut libero neque, suscipit ac velit vitae, lobortis pulvinar tellus. Morbi sollicitudin mattis tincidunt.

                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti. Morbi sed elit quis justo mattis iaculis sit amet in arcu. Quisque vel consectetur justo. Aenean sit amet consequat lacus. Phasellus sagittis sit amet sem quis mollis. Fusce a risus metus. Phasellus pellentesque dolor ut facilisis dignissim. Aenean auctor lacinia iaculis. Fusce molestie, est in accumsan efficitur, nisi justo mattis turpis, at gravida mi urna ut sem. Nullam sollicitudin venenatis iaculis. Pellentesque sit amet dolor urna. Mauris finibus purus vitae sapien tincidunt, ut facilisis ligula semper. Phasellus a consequat tellus. Sed gravida tempor mi, non accumsan neque finibus et. Aenean luctus fermentum enim, vitae varius arcu vehicula nec.
                </p>
                <button class="dropbtn one">Kupi</button>
                <button class="dropbtn one">Zamjeni</button>
                <button class="dropbtn one">Tračaj</button>
            </div>
        </div>
        <div class="row one">
            <div class="column five">
                <img src="../resources/pictures/biologija.jpg">
            </div>
            <div class="column six">
                <p>
                    Mogućnost razmjene: <b>NE</b> <br>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in faucibus enim. Vestibulum vel fringilla quam, id vehicula purus. Sed sagittis pulvinar risus eget ullamcorper. Morbi a elit id sem consectetur pretium sed at ligula. Cras vehicula arcu sodales augue bibendum eleifend. Aliquam condimentum nisl ligula, sit amet pretium arcu mollis tempor. Nunc feugiat dui eu ipsum congue consequat. Aenean a luctus lectus. Etiam varius maximus nisl, eu vestibulum ante. Nam dictum tempor purus, ac sagittis risus. Fusce vel leo lobortis, lacinia urna quis, facilisis nulla. Vestibulum pellentesque at nisi ac pulvinar. Nunc lacinia pellentesque urna a sagittis. Nullam ac lacinia enim. Ut libero neque, suscipit ac velit vitae, lobortis pulvinar tellus. Morbi sollicitudin mattis tincidunt.

                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti. Morbi sed elit quis justo mattis iaculis sit amet in arcu. Quisque vel consectetur justo. Aenean sit amet consequat lacus. Phasellus sagittis sit amet sem quis mollis. Fusce a risus metus. Phasellus pellentesque dolor ut facilisis dignissim. Aenean auctor lacinia iaculis. Fusce molestie, est in accumsan efficitur, nisi justo mattis turpis, at gravida mi urna ut sem. Nullam sollicitudin venenatis iaculis. Pellentesque sit amet dolor urna. Mauris finibus purus vitae sapien tincidunt, ut facilisis ligula semper. Phasellus a consequat tellus. Sed gravida tempor mi, non accumsan neque finibus et. Aenean luctus fermentum enim, vitae varius arcu vehicula nec.
                </p>
                <button class="dropbtn one">Kupi</button>
                <button class="dropbtn one">Tračaj</button>
            </div>
        </div>
        <div class="row one">
            <div class="column five">
                <img src="../resources/pictures/historija.jpg">
            </div>
            <div class="column six">
                <p>
                    Mogućnost razmjene: <b>DA</b> <br>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in faucibus enim. Vestibulum vel fringilla quam, id vehicula purus. Sed sagittis pulvinar risus eget ullamcorper. Morbi a elit id sem consectetur pretium sed at ligula. Cras vehicula arcu sodales augue bibendum eleifend. Aliquam condimentum nisl ligula, sit amet pretium arcu mollis tempor. Nunc feugiat dui eu ipsum congue consequat. Aenean a luctus lectus. Etiam varius maximus nisl, eu vestibulum ante. Nam dictum tempor purus, ac sagittis risus. Fusce vel leo lobortis, lacinia urna quis, facilisis nulla. Vestibulum pellentesque at nisi ac pulvinar. Nunc lacinia pellentesque urna a sagittis. Nullam ac lacinia enim. Ut libero neque, suscipit ac velit vitae, lobortis pulvinar tellus. Morbi sollicitudin mattis tincidunt.

                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti. Morbi sed elit quis justo mattis iaculis sit amet in arcu. Quisque vel consectetur justo. Aenean sit amet consequat lacus. Phasellus sagittis sit amet sem quis mollis. Fusce a risus metus. Phasellus pellentesque dolor ut facilisis dignissim. Aenean auctor lacinia iaculis. Fusce molestie, est in accumsan efficitur, nisi justo mattis turpis, at gravida mi urna ut sem. Nullam sollicitudin venenatis iaculis. Pellentesque sit amet dolor urna. Mauris finibus purus vitae sapien tincidunt, ut facilisis ligula semper. Phasellus a consequat tellus. Sed gravida tempor mi, non accumsan neque finibus et. Aenean luctus fermentum enim, vitae varius arcu vehicula nec.
                </p>
                <button class="dropbtn one">Kupi</button>
                <button class="dropbtn one">Zamjeni</button>
                <button class="dropbtn one">Tračaj</button>
            </div>
        </div>
    </div>

    <div id="kategorije" class="column three"><h3>Drvenija.ba<br><br>Kategorije:</h3>
        <ul>
            <li>Osnovna škola
                <ul>
                    <li>Predmet 1</li>
                    <li>Predmet 2</li>
                    <li>Predmet 3</li>
                    <li>Predmet 4</li>
                    <li>Predmet 5</li>
                    <li>Predmet 6</li>
                    <li>Predmet 7</li>
                    <li>Predmet 8</li>
                </ul>
            </li>
            <li>Srednja škola
                <ul>
                    <li>Predmet 1</li>
                    <li>Predmet 2</li>
                    <li>Predmet 3</li>
                    <li>Predmet 4</li>
                    <li>Predmet 5</li>
                    <li>Predmet 6</li>
                    <li>Predmet 7</li>
                    <li>Predmet 8</li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<!--Copyright-->
<div class="row">
    <div id="copyright" class="column three">Made with ♥ by Amer Šurković in Sarajevo. ©</div>
</div>

</BODY>

</html>