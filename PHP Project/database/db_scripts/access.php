<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tutorijal 8, Uvod</title>
  </head>

  <body>
    <h1>Korisnici</h1>
    <?php
     $veza = new PDO("mysql:dbname=drvenija;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, name, surname, phone_number, location, username, email, password from users");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }


     foreach ($rezultat as $user) {
          print $user['name']." ".$user['surname']." ".$user['phone_number']." ".$user['location']." ".$user['email']." ".$user['password']." "."<br>";
     }

     $veza = null;
    ?>
  </body>

</html>