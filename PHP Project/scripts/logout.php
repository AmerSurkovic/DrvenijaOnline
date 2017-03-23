<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 12/27/16
 * Time: 10:10 PM
 */

$path = $_SERVER['DOCUMENT_ROOT'] . '/PHP Project/index.php';

session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

$_SESSION['user'] = 'Prijava';
echo 'You have cleaned session';
header('Location: ../index.php');// . $path);
exit();
