<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tutorijal 8, Uvod</title>
  </head>

  <body>
    <h1>Database input</h1>
    <?php
     $veza = new PDO("mysql:dbname=drvenija;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select title from books as b where b.user = 3");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }


     foreach ($rezultat as $book) {
          print $book['title']." "."<br>";
     }
    ?>
  </body>

</html>
