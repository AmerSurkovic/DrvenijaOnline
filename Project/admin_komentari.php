<?php
session_start();

$postoji=true;

if($_SESSION['username'] != 'admin'){
    header('Location: prijava.php');
}

$errorTest = '';

?>

<!DOCTYPE html>
<html lang="en">

<HEADER>
    <link rel="stylesheet" href="lib/css/adminDashboard.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="lib/js/adminDashboard.js"></script>
</HEADER>

<BODY>

<?php
$red_izmjena=-1;
if(isset($_REQUEST['Komentar']) && !empty($_REQUEST['Komentar']) && isset($_REQUEST['selectedUser']) && !empty($_REQUEST['selectedUser'])){
    if($_REQUEST['Opcija']=="Dodaj"){
            header("Refresh:0");
            $dodaj= array();
            $dodaj[0]=$_REQUEST['Komentar'];
            $dodaj[1]=$_REQUEST['selectedUser'];
            
            try{
              $servername = "localhost";
              $dbusername = "admin";
              $dbpassword = "admin";
              $dbname = "drvenija";


              $connection = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
              // set the PDO error mode to exception
              $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // prepare sql and bind parameters
              $statement = $connection->prepare("INSERT INTO comments (id, comment, user) VALUES (NULL, :comment, :user)");

              $comment = $dodaj[0]; 
             # $user = $dodaj[1];
              $user = '3';

              $statement->bindParam(':comment', $comment);
              $statement->bindParam(':user', $user);

              $statement->execute();

              header('Location: admin_komentari.php');
            }
            catch(PDOException $e){
              echo "Error: " . $e->getMessage();
            }

            $connection=null;
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
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $commentID = $koji_id;

                    $sql = "DELETE FROM comments WHERE id=$commentID";

                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "Record deleted successfully";
                }
            catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }

            $conn = null;
            header('Location: admin_komentari.php');

        }
        else if($_REQUEST[$keys[$key]]=="Sacuvaj"){
                $red = 0;

            try {
                    $servername = "localhost";
                    $dbusername = "admin";
                    $dbpassword = "admin";
                    $dbname = "drvenija";

                  $connection = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
                  // set the PDO error mode to exception
                  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $statement = $connection->prepare("UPDATE comments SET comment=:comment, user=:user WHERE id=:id");

                  $id = $koji_id;
                  $comment= $_REQUEST['Komentar'];
                  $user = $_REQUEST['editSelectedUser'];

                  $statement->bindParam(':id', $id);
                  $statement->bindParam(':comment', $comment);
                  $statement->bindParam(':user', $user);

                  $statement->execute();

                  header('Location: admin_komentari.php');
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

?>

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
            <h2>Trenutno ste na pregledu svih artikala registrovanih za prodaju.</h2>
            <a href="mainPage.php" target="_blank">Pregled "Drvenija.ba"</a>
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
            <form action="admin_komentari.php" method="get">
                <table>
                    <tr>
                        <th>
                            Komentar
                        </th>
                        <th>
                            Korisnik
                        </th>
                    </tr>
                    <?php
                    $broj = 0;
                    if (file_exists("knjige.xml")) {
                        
                        $servername = "localhost";
                        $dbusername = "admin";
                        $dbpassword = "admin";
                        $dbname = "drvenija";

                        try {
                            /*title=:title, school=:school, subject=:subject, year_published=:year_published, state=:state, price=:price, exchange_option=:exchange_option*/
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT id, comment, user FROM comments");
                            $stmt->execute();

                            $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
                            $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt2 = $conn->prepare("SELECT * FROM users");
                            $stmt2->execute();

                            // set the resulting array to associative
                            $result = $stmt->fetchAll();
                            $result2 = $stmt2->fetchAll();
                        }
                        catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;

                        foreach ($result as $komentar) {
                            if ($broj != $red_izmjena && !empty($komentar['id'])) {
                                echo "<tr>";
                                echo "<td>" . $komentar['comment'] . "</td><td>" . $komentar['user'] . "</td><td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $komentar['id'] . "' value='Obrisi'></td><td><input class='dugme' type='submit' name='Opcija_" . $broj .  "_" . $komentar['id'] . "'value='Izmjeni'></td>";
                                echo "</tr>";
                            } else if (!empty($komentar['id'])) {
                                echo "<tr>";
                                echo "<td><input type='text' name='Komentar' value='" . $komentar['comment'] . "'></td>";
                                echo "<td><select name='editSelectedUser'>";
                                foreach($result2 as $user){
                                        echo "<option value=". $user["id"] . ">" . $user["id"]  . "</option>";
                                }
                                echo "</td></select>";
                                echo  "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $komentar['id'] . "' value='Obrisi'>";
                                echo   "<td><input class='dugme' type='submit' name='Opcija_" . $broj . "_" . $komentar['id'] . "' value='Sacuvaj'>";
                                echo "</tr>";
                            }
                            $broj++;
                        }
                    }
                    ?>
                    <?php
                    if($red_izmjena==-1){
                        echo "<tr>";
                        echo "<td><input type='text' name='Komentar' value=''></td>";
                        echo "<td><select name='selectedUser'>";
                                foreach($result2 as $user){
                                        echo "<option value=". $user["id"] . ">" . $user["id"]  . "</option>";
                                }
                                echo "</td></select>";
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