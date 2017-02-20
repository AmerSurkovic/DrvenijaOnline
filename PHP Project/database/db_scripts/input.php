<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tutorijal 8, Uvod</title>
  </head>

  <body>
    <h1>Database input</h1>
    <?php
     $name = 'test'; 
     $surname = 'test';
     $phone = '061-112-112';
     $location = 'New York';
     $username = 'testUsername';
     $email = 'test@test.com';
     $password = 'testtest';


     try {
      $conn = new PDO("mysql:dbname=drvenija;host=localhost;charset=utf8", "admin", "admin");
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO `users` (`id`, `name`, `surname`, `phone_number`, `location`, `username`, `email`, `password`) VALUES (NULL, '".$name."', '".$surname."', '".$phone."', '".$location."', '".$username."', '".$email.".', '".$password."');";
      // use exec() because no results are returned
      $conn->exec($sql);
      $conn = null;
      echo "New record created successfully";
      }
      catch(PDOException $e)
      {
        echo $sql . "<br>" . $e->getMessage();
      }
    ?>
  </body>

</html>

<!-- INSERT INTO `users` (`id`, `name`, `surname`, `phone_number`, `location`, `username`, `email`, `password`) VALUES (NULL, 'Meho', 'Mehic', '062-222-222', 'Kladanj', 'MehoWT', 'meho@yahoo.com', 'mehowt');-->