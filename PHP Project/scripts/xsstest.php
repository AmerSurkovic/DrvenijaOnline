<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 3/16/17
 * Time: 9:55 PM
 */

require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/scripts/Session Control/loginValidation.php');


$conn = DATABASE_CONNECTION::create_PDO();

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT username FROM users");
$stmt->execute();

$result = $stmt->fetchAll();

foreach ($result as $korisnik) {
        echo "<tr>";
        echo "<td>" . $korisnik['username'] . " </td>";
        echo "</tr>";
}