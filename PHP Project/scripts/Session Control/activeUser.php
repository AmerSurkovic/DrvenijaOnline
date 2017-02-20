<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 2/19/17
 * Time: 9:53 PM
 */

function setActiveUser(){

    $dir = getcwd();
    $bool = false;

    $analyze = explode("/", $dir);
    foreach ($analyze as $value){
        if ($value == 'pages'){
            $bool = true;
        }
    }

    if(isset($_SESSION['username'])){
        if($bool == true){
            echo '<a id="prijavaLink" href="userAccount.php">' . $_SESSION['username'];
        }
        else{
            echo '<a id="prijavaLink" href="pages/userAccount.php">' . $_SESSION['username'];
        }
    }
    else{
        if($bool == true){
            echo '<a id="prijavaLink" href="login.php"> Prijava';
        }
        else{
            echo '<a id="prijavaLink" href="pages/login.php"> Prijava';
        }
    }
}