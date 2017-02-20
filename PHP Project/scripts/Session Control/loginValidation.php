<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 2/19/17
 * Time: 10:52 PM
 */

require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/database/configuration/DATABASE_CONNECTION.php');

function validate(){
    $msg = '';
    if(isset($_POST['login']) && !empty($_POST['userName']) && !empty($_POST['password'])){

        $result = [];
        try {
            $conn = DATABASE_CONNECTION::create_PDO();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT username, password FROM users");
            $stmt->execute();

            $result = $stmt->fetchAll();

        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn=null;
        global $bool;
        $bool = false;

        $a = '';
        foreach ($result as $korisnik) {
            if ($korisnik['username'] == $_POST['userName'] && $korisnik['password'] == $_POST['password']) {
                $a = $korisnik['username'];
                $bool = true;

                break;
            }
        }

        if($bool==true){
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = strval($a);

            #$_SESSION['user'] = 'Administrator';
            header("Refresh:0");
        }

        if($bool==false){
            echo 'Neispravan unos!';
        }

        if($_SESSION['username'] == 'admin'){
            header('Location: Admin dashboard/landingPage.php');
        }

    }
}