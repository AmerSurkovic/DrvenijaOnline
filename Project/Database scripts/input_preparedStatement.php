<?php

$servername = "localhost";
$dbusername = "admin";
$dbpassword = "admin";
$dbname = "drvenija";

$name = 'test'; 
$surname = 'test';
$phone = '061-112-112';
$location = 'New York';
$username = 'testUsername';
$email = 'test@test.com';
$password = 'testtest';

try{
  $connection = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $statement = $connection->prepare("INSERT INTO `users` (`id`, `name`, `surname`, `phone_number`, `location`, `username`, `email`, `password`) VALUES (NULL, :name, :surname, :phone_number, :location, :username, :email, :password)");
  $statement->bindParam(':name', $name);
  $statement->bindParam(':surname', $surname);
  $statement->bindParam(':phone_number', $phone_number);
  $statement->bindParam(':location', $location);
  $statement->bindParam(':username', $username);
  $statement->bindParam(':email', $email);
  $statement->bindParam(':password', $password);

  $name = 'test1'; 
  $surname = 'test1';
  $phone_number = '061-112-112';
  $location = 'New York';
  $username = 'testUsername';
  $email = 'test@test.com';
  $password = 'testtest';
  $statement->execute();

  echo "New records created successfully";
}
catch(PDOException $e){
  echo "Error: " . $e->getMessage();
}

$connection=null;