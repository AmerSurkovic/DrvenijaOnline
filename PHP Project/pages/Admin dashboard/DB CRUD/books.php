<?php

require($_SERVER['DOCUMENT_ROOT'] . '/PHP Project/database/configuration/DATABASE_CONNECTION.php');

session_start();

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
</HEADER>

<BODY>

<?php
$red_izmjena=-1;
if(isset($_REQUEST['Naziv']) && !empty($_REQUEST['Naziv']) && isset($_REQUEST['Skola']) && !empty($_REQUEST['Skola']) && isset($_REQUEST['Predmet']) && !empty($_REQUEST['Predmet']) && isset($_REQUEST['GodinaIzdavanja']) && !empty($_REQUEST['GodinaIzdavanja']) && isset($_REQUEST['Stanje']) && isset($_REQUEST['Cijena']) && !empty($_REQUEST['Cijena']) && isset($_REQUEST['MogucnostRazmjene'])){
    if($_REQUEST['Opcija']=="Dodaj"){
     /*   $dodaj= array();
        $dodaj[0]=$_REQUEST['Naziv'];
        $dodaj[1]=$_REQUEST['Skola'];
        $dodaj[2]=$_REQUEST['Predmet'];
        $dodaj[3]=$_REQUEST['GodinaIzdavanja'];
        $dodaj[4]=$_REQUEST['Stanje'];
        $dodaj[5]=$_REQUEST['Cijena'];
        $dodaj[6]=$_REQUEST['MogucnostRazmjene'];
*/
        if(strlen($_REQUEST['Naziv']) < 3) {
            $errorTest = "Naziv mora imati barem 3 slova." . "<br>";
        }
        else if(strlen($_REQUEST['Skola']) < 3) {
            $errorTest .= "Skola mora imati barem 3 slova." . "<br>";
        }
        else if(strlen($_REQUEST['Predmet']) < 3) {
            $errorTest .= "Predmet mora imati barem 3 slova." . "<br>";
        }
        else if(strval($_REQUEST['GodinaIzdavanja']) < 1900 || strval($_REQUEST['GodinaIzdavanja']) > 2017) {
            $errorTest .= "Godina izdavanja ne moze biti ispod 1990 ili iznad 2017." . "<br>";
        }

        else{

            header("Refresh:0");
            $dodaj= array();
            $dodaj[0]=$_REQUEST['Naziv'];
            $dodaj[1]=$_REQUEST['Skola'];
            $dodaj[2]=$_REQUEST['Predmet'];
            $dodaj[3]=$_REQUEST['GodinaIzdavanja'];
            $dodaj[4]=$_REQUEST['Stanje'];
            $dodaj[5]=$_REQUEST['Cijena'];
            $dodaj[6]=$_REQUEST['MogucnostRazmjene'];
            
            try{
              $servername = "localhost";
              $dbusername = "admin";
              $dbpassword = "admin";
              $dbname = "drvenija";

              $connection = DATABASE_CONNECTION::create_PDO();
              $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // prepare sql and bind parameters
              $statement = $connection->prepare("INSERT INTO books (id, title, school, subject, year_published, state, price, exchange_option, user) VALUES (NULL, :title, :school, :subject, :year_published, :state, :price, :exchange_option, :user)");

              $title = $dodaj[0]; 
              $school = $dodaj[1];
              $subject = $dodaj[2];
              $year_published = $dodaj[3];
              $state = $dodaj[4];
              $price = $dodaj[5];
              $exchange_option = $dodaj[6];
              $user = '3';

              $statement->bindParam(':title', $title);
              $statement->bindParam(':school', $school);
              $statement->bindParam(':subject', $subject);
              $statement->bindParam(':year_published', $year_published);
              $statement->bindParam(':state', $state);
              $statement->bindParam(':price', $price);
              $statement->bindParam(':exchange_option', $exchange_option);
              $statement->bindParam(':user', $user);

              $statement->execute();

              header('Location: books.php');
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
                    $conn = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=drvenija', 'admin', 'admin');
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $bookID = $koji_id;

                    $sql = "DELETE FROM books WHERE id=$bookID";

                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "Record deleted successfully";
                }
            catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }

            $conn = null;
            header('Location: books.php');

        }
        else if($_REQUEST[$keys[$key]]=="Sacuvaj"){
            if(strlen($_REQUEST['Naziv']) < 3) {
                $errorTest = "Naziv mora imati barem 3 slova." . "<br>";
            }
            else if(strlen($_REQUEST['Skola']) < 3) {
                $errorTest .= "Skola mora imati barem 3 slova." . "<br>";
            }
            else if(strlen($_REQUEST['Predmet']) < 3) {
                $errorTest .= "Predmet mora imati barem 3 slova." . "<br>";
            }
            else if(strval($_REQUEST['GodinaIzdavanja']) < 1900 || strval($_REQUEST['GodinaIzdavanja']) > 2017) {
                $errorTest .= "Godina izdavanja ne moze biti ispod 1990 ili iznad 2017." . "<br>";
            }
       #     else if(!preg_match('/^[0-9 ]$/', strval($_REQUEST['Cijena']))) {
       #         $errorTest .= "Cijena mora biti broj." . "<br>";
       #     }
            else{
                $red = 0;

            try {
                  $connection = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=drvenija', 'admin', 'admin');
                  // set the PDO error mode to exception
                  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $statement = $connection->prepare("UPDATE books SET title=:title, school=:school, subject=:subject, year_published=:year_published, state=:state, price=:price, exchange_option=:exchange_option WHERE id=:id");

                  $id = $koji_id;
                  $title= $_REQUEST['Naziv'];
                  $school = $_REQUEST['Skola'];
                  $subject = $_REQUEST['Predmet'];
                  $year_published = $_REQUEST['GodinaIzdavanja'];
                  $state = $_REQUEST['Stanje'];
                  $price = $_REQUEST['Cijena'];
                  $exchange_option = $_REQUEST['MogucnostRazmjene'];

                  $statement->bindParam(':id', $id);
                  $statement->bindParam(':title', $title);
                  $statement->bindParam(':school', $school);
                  $statement->bindParam(':subject', $subject);
                  $statement->bindParam(':year_published', $year_published);
                  $statement->bindParam(':state', $state);
                  $statement->bindParam(':price', $price);
                  $statement->bindParam(':exchange_option', $exchange_option);

                  $statement->execute();

                  header('Location: books.php');
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
            <h2>Trenutno ste na pregledu svih artikala registrovanih za prodaju.</h2>
            <a href="../../index.php" target="_blank">Pregled "Drvenija.ba"</a>
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
            <h2>Udžbenici u prodaji</h2>
            <p>
            <form action="books.php" method="get">
                <table>
                    <tr>
                        <th>
                            Naziv
                        </th>
                        <th>
                            Škola
                        </th>
                        <th>
                            Predmet
                        </th>
                        <th>
                            Godina izdavanja
                        </th>
                        <th>
                            Stanje
                        </th>
                        <th>
                            Cijena
                        </th>
                        <th>
                            Mogućnost razmjene
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
                            /*title=:title, school=:school, subject=:subject, year_published=:year_published, state=:state, price=:price, exchange_option=:exchange_option*/
                            $conn = DATABASE_CONNECTION::create_PDO();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT id, title, school, subject, year_published, state, price, exchange_option FROM books");
                            $stmt->execute();

                            // set the resulting array to associative
                            $result = $stmt->fetchAll();
                        }
                        catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;

                        foreach ($result as $knjiga) {
                            if ($broj != $red_izmjena && !empty($knjiga['id'])) {
                                echo "<tr>";
                                echo "<td>" . $knjiga['title'] . "</td><td>" . $knjiga['school'] . "</td><td>" . $knjiga['subject'] . "</td><td>" . $knjiga['year_published'] . "</td><td>" . $knjiga['state'] . "</td><td>" . $knjiga['price'] . "</td><td>" . $knjiga['exchange_option'] . "</td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $knjiga['id'] . "' value='Obrisi'></td><td><input class='dugme' type='submit' name='Opcija_" . $broj .  "_" . $knjiga['id'] . "'value='Izmjeni'></td>";
                                echo "</tr>";
                            } else if (!empty($knjiga['title'])) {
                                echo "<tr>";
                                echo "<td><input type='text' name='Naziv' value='" . $knjiga['title'] . "'></td>";
                                echo  "<td><input type='text' name='Skola' value='" . $knjiga['school'] . "'></td>";
                                echo  "<td><input type='text' name='Predmet' value='" . $knjiga['subject'] . "'></td>";
                                echo "<td><input type='text' name='GodinaIzdavanja' value='" . $knjiga['year_published'] . "'></td>";
                                echo  "<td><input type='text' name='Stanje' value='" . $knjiga['state'] . "'></td>";
                                echo  "<td><input type='text' name='Cijena' value='" . $knjiga['price'] . "'></td>";
                                echo "<td><input type='text' name='MogucnostRazmjene' value='" . $knjiga['exchange_option'] . "'></td>";
                                echo  "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $knjiga['id'] . "' value='Obrisi'>";
                                echo   "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $knjiga['id'] . "' value='Sacuvaj'>";
                                echo "</tr>";
                            }
                            $broj++;

                    }
                    ?>
                    <?php
                    if($red_izmjena==-1){
                        echo "<tr>";
                        echo "<td><input type='text' name='Naziv' value=''></td>";
                        echo  "<td><input type='text' name='Skola' value=''></td>";
                        echo  "<td><input type='text' name='Predmet' value=''></td>";
                        echo "<td><input type='text' name='GodinaIzdavanja' value=''></td>";
                        echo  "<td><input type='text' name='Stanje' value=''></td>";
                        echo  "<td><input type='text' name='Cijena' value=''></td>";
                        echo  "<td><input type='text' name='MogucnostRazmjene' value=''></td>";
                        echo  "<td colspan='2'><input class='dugme' type='submit' name='Opcija' value='Dodaj'></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </form>
            <p><?php
                echo $errorTest;
                ?></p>
            </p>
        </hgroup>
    </div>


</div>

</BODY>

</html>