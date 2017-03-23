<?php

session_start();

$_POST = array(); //workaround for broken PHPstorm
parse_str(file_get_contents('php://input'), $_POST);

require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/database/configuration/DATABASE_CONNECTION.php');

$postoji=true;

/*if($_SESSION['username'] != 'admin'){
    header('Location: login.php');
}*/

$errorTest = '';

?>

<!DOCTYPE html>
<html lang="en">

<HEADER>
    <link rel="stylesheet" href="../../../lib/css/adminDashboard.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="../../../lib/js/adminDashboard.js"></script>

    <!-- TESTNO
    <script type="text/javascript" src="../../../sendSessionID.js"></script>
-->
</HEADER>

<BODY>

<?php
$red_izmjena=-1;
if(isset($_REQUEST['Ime']) && !empty($_REQUEST['Ime']) && isset($_REQUEST['Prezime']) && !empty($_REQUEST['Prezime']) && isset($_REQUEST['Telefon']) && !empty($_REQUEST['Telefon']) && isset($_REQUEST['Lokacija']) && !empty($_REQUEST['Lokacija']) && isset($_REQUEST['userName']) && !empty($_REQUEST['userName']) && isset($_REQUEST['eMail']) && !empty($_REQUEST['eMail']) && isset($_REQUEST['password']) && !empty($_REQUEST['password'])){
    if($_REQUEST['Opcija']=="Dodaj"){

        if(strlen($_REQUEST['Ime']) < 3) {
            $errorTest = "Ime mora imati barem 3 slova." . "<br>";
        }
        else if(strlen($_REQUEST['Prezime']) < 3) {
            $errorTest .= "Prezime mora imati barem 3 slova." . "<br>";
        }
        else if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3,4}$/', strval($_REQUEST['Telefon']))) {
            $errorTest .= "Broj telefona mora imati oblik 000-000-000(0)" . "<br>";
        }
        else if(!preg_match('/^[A-Za-z0-9, ]{3,20}$/', strval($_REQUEST['Lokacija']))) {
            $errorTest .= "Lokacija mora imati barem 5 slova." . "<br>";
        }
        else if(!preg_match('/^[A-Za-z0-9_]{1,20}$/', strval($_REQUEST['userName']))) {
            $errorTest .= "Username mora imati barem 3 slova bez specijalnih karaktera." . "<br>";
        }
        else if(!preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', strval($_REQUEST['eMail']))) {
            $errorTest .= "Neispravan mail" . "<br>";
        }
        else if(!preg_match('/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/', strval($_REQUEST['password']))) {
            $errorTest .= "Neispravan password" . "<br>";
        }
        else{
            header("Refresh:0");
            $dodaj= array();
            $dodaj[0]=$_REQUEST['Ime'];
            $dodaj[1]=$_REQUEST['Prezime'];
            $dodaj[2]=$_REQUEST['Telefon'];
            $dodaj[3]=$_REQUEST['Lokacija'];
            $dodaj[4]=$_REQUEST['userName'];
            $dodaj[5]=$_REQUEST['eMail'];
            $dodaj[6]=$_REQUEST['password'];

            try{
              $connection = DATABASE_CONNECTION::create_PDO();
              $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // prepare sql and bind parameters
              $statement = $connection->prepare("INSERT INTO users (id, name, surname, phone_number, location, username, email, password) VALUES (NULL, :name, :surname, :phone_number, :location, :username, :email, :password)");

              $name = $dodaj[0]; 
              $surname = $dodaj[1];
              $phone_number = $dodaj[2];
              $location = $dodaj[3];
              $username = $dodaj[4];
              $email = $dodaj[5];
              $password = $dodaj[6];

              $statement->bindParam(':name', $name);
              $statement->bindParam(':surname', $surname);
              $statement->bindParam(':phone_number', $phone_number);
              $statement->bindParam(':location', $location);
              $statement->bindParam(':username', $username);
              $statement->bindParam(':email', $email);
              $statement->bindParam(':password', $password);

              $statement->execute();

              header('Location: users.php');
            }
            catch(PDOException $e){
              echo "Error: " . $e->getMessage();
            }

            $connection=null;
        }
    }
}

$keys=array_keys($_GET);
foreach ($keys as $key => $value) {
    if($_REQUEST[$keys[$key]]=="Obrisi" || $_REQUEST[$keys[$key]]=="Izmjeni" || $_REQUEST[$keys[$key]]=="Sacuvaj"){

        $koji_red=intval(explode("_",$keys[$key])[1]);
        $koji_id=intval(explode("_",$keys[$key])[2]);
        if($_REQUEST[$keys[$key]]=="Obrisi"){
            $red = 0;

            $servername = "localhost";
            $dbusername = "admin";
            $dbpassword = "admin";
            $dbname = "drvenija";

            try {
                    $conn = DATABASE_CONNECTION::create_PDO();
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $userID = $koji_id;

                    $sql = "DELETE FROM users WHERE id=$userID";

                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "Record deleted successfully";
                }
            catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }

            $conn = null;
            header('Location: users.php');

        }
        else if($_REQUEST[$keys[$key]]=="Sacuvaj"){
            if(strlen($_REQUEST['Ime']) < 3) {
                $errorTest = "Ime mora imati barem 3 slova." . "<br>";
            }
            else if(strlen($_REQUEST['Prezime']) < 3) {
                $errorTest .= "Prezime mora imati barem 3 slova." . "<br>";
            }
            else if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3,4}$/', strval($_REQUEST['Telefon']))) {
                $errorTest .= "Broj telefona mora imati oblik 000-000-000(0)" . "<br>";
            }
            else if(!preg_match('/^[A-Za-z0-9, ]{3,20}$/', strval($_REQUEST['Lokacija']))) {
                $errorTest .= "Lokacija mora imati barem 5 slova." . "<br>";
            }
            else if(!preg_match('/^[A-Za-z0-9_]{1,20}$/', strval($_REQUEST['userName']))) {
                $errorTest .= "Username mora imati barem 3 slova bez specijalnih karaktera." . "<br>";
            }
            else if(!preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', strval($_REQUEST['eMail']))) {
                $errorTest .= "Neispravan mail" . "<br>";
            }
            else if(!preg_match('/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/', strval($_REQUEST['password']))) {
                $errorTest .= "Neispravan password" . "<br>";
            }
            else{
            $red = 0;

            try {
                  $connection = DATABASE_CONNECTION::create_PDO();
                  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  // prepare sql and bind parameters
                  $statement = $connection->prepare("UPDATE users SET name=:name, surname=:surname, phone_number=:phone_number, location=:location, username=:username, email=:email, password=:password WHERE id=:id");

                  $id = $koji_id;
                  $name= $_REQUEST['Ime'];
                  $surname = $_REQUEST['Prezime'];
                  $phone_number = $_REQUEST['Telefon'];
                  $location = $_REQUEST['Lokacija'];
                  $username = $_REQUEST['userName'];
                  $email = $_REQUEST['eMail'];
                  $password = $_REQUEST['password'];

                  $statement->bindParam(':id', $id);
                  $statement->bindParam(':name', $name);
                  $statement->bindParam(':surname', $surname);
                  $statement->bindParam(':phone_number', $phone_number);
                  $statement->bindParam(':location', $location);
                  $statement->bindParam(':username', $username);
                  $statement->bindParam(':email', $email);
                  $statement->bindParam(':password', $password);

                  $statement->execute();

                  header('Location: users.php');
                }
            catch(PDOException $e){
              echo "Error: " . $e->getMessage();
            }

            $conn = null;
            }
        }
        else{
            $red_izmjena=$koji_red;
        }
    }
}
?>

<h1 id="naslov">Drvenija.ba</h1>
<h3 id="naslov2">Admin dasboard</h3>

<nav>
    <ul>
        <li><a class="brick dashboard" href="../landingPage.php"><span class='icon ion-home'></span>Dashboard</a></li>
        <li><a class="brick pages" href="users.php"><span class='icon ion-document'></span>Registrovani korisnici</a></li>
        <li><a class="brick navigation" href="books.php"><span class='icon ion-android-share-alt'></span>Udžbenici u prodaji</a></li>
        <li><a class="brick navigation" href="comments.php"><span class='icon ion-android-share-alt'></span>Komentari korisnika</a></li>
        <li><a class="brick settings" href="../reports.php"><span class='icon ion-gear-a'></span>Izvještaji</a></li>
        <li><a class="brick users" href="../../logout.php"><span class='icon ion-person'></span>👤 Odjavi se</a></li>
    </ul>
</nav>

<div id="content" class="pages">

    <header>
        <div class="brick identify">
            <span class="icon ion-document"></span>
        </div>

        <div class="brick title">
            <h2>Trenutno ste na pregledu svih korisnika registrovanih na stranici.</h2>
            <a href="../../../index.php" target="_blank">Pregled "Drvenija.ba"</a>
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
            <h2>Registrovani korisnici</h2>
            <p>
            <form action="users.php" method="get">
                <table>
                    <tr>
                        <th>
                            Ime
                        </th>
                        <th>
                            Prezime
                        </th>
                        <th>
                            Telefon
                        </th>
                        <th>
                            Lokacija
                        </th>
                        <th>
                            Korisničko ime
                        </th>
                        <th>
                            E-mail adresa
                        </th>
                        <th>
                            Password
                        </th>
                        <th>
                            Brisanje
                        </th>
                        <th>
                            Editovanje
                        </th>
                    </tr>
                    <?php

                    $broj = 0;

                        try {
                            $conn = DATABASE_CONNECTION::create_PDO();

                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT id, name, surname, phone_number, location, username, email, password FROM users");
                            $stmt->execute();

                            $result = $stmt->fetchAll();
                        }
                        catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;

                        # End of changes
                        foreach ($result as $korisnik) {
                            if ($broj != $red_izmjena && !empty($korisnik['name'])) {
                                echo "<tr>";
                                echo "<td>" . $korisnik['name'] . "</td><td>" . $korisnik['surname'] . "</td><td>" . $korisnik['phone_number'] . "</td><td>" . $korisnik['location'] . "</td><td>" . $korisnik['username'] . "</td><td>" . $korisnik['email'] . "</td><td>" . $korisnik['password'] . "</td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $korisnik['id'] ."' value='Obrisi'></td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $korisnik['id'] ."'value='Izmjeni'></td>";
                                echo "</tr>";
                            } else if(!empty($korisnik['name'])) {
                                echo "<tr>";
                                echo "<td><input type='text' name='Ime' value='" . $korisnik['name'] . "'></td>";
                                echo  "<td><input type='text' name='Prezime' value='" . $korisnik['surname'] . "'></td>";
                                echo  "<td><input type='text' name='Telefon' value='" . $korisnik['phone_number'] . "'></td>";
                                echo "<td><input type='text' name='Lokacija' value='" . $korisnik['location'] . "'></td>";
                                echo  "<td><input type='text' name='userName' value='" . $korisnik['username'] . "'></td>";
                                echo  "<td><input type='text' name='eMail' value='" . $korisnik['email'] . "'></td>";
                                echo "<td><input type='text' name='password' value='" . $korisnik['password'] . "'></td>";
                                echo  "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $korisnik['id'] ."' value='Obrisi'>";
                                echo   "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $korisnik['id'] ."' value='Sacuvaj'>";
                                echo "</tr>";
                            }
                            $broj++;

                    }
                    ?>
                    <?php
                    if($red_izmjena==-1){
                        echo "<tr>";
                        echo "<td><input type='text' name='Ime' value=''></td>";
                        echo  "<td><input type='text' name='Prezime' value=''></td>";
                        echo  "<td><input type='text' name='Telefon' value=''></td>";
                        echo "<td><input type='text' name='Lokacija' value=''></td>";
                        echo  "<td><input type='text' name='userName' value=''></td>";
                        echo  "<td><input type='text' name='eMail' value=''></td>";
                        echo  "<td><input type='text' name='password' value=''></td>";
                        echo  "<td colspan='2'><input class='dugme' type='submit' name='Opcija' value='Dodaj'></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            <p><?php
                echo $errorTest;
                ?></p>
            </form>
            </p>
        </hgroup>
    </div>

</div>

</BODY>

</html>