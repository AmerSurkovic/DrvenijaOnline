<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 2/19/17
 * Time: 10:36 PM
 */

function updateMenu(){

    if(isset($_SESSION['username'])) {

        echo '<a href="../index.php">Početna</a>';
        echo '<a href="../pages/buy.php">Kupi</a>';
        echo '<a href="../pages/sell.php">Prodaj</a>';
        echo '<a href="../scripts/logout.php">Odjava</a>';

    }
    else {
        echo '<a href="../../index.php">Početna</a>';
        echo '<a href="../../pages/login.php">Prijava</a>';
        echo '<a href="../../pages/register.php">Registracija</a>';
        echo '<a href="../../pages/buy.php">Kupi</a>';
        echo '<a href="../../pages/sell.php">Prodaj</a>';
    }

}