<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 12/27/16
 * Time: 10:10 PM
 */

session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

$_SESSION['user'] = 'Prijava';
echo 'You have cleaned session';
header('Location: mainPage.php');
exit();
