<?php

$xml=simplexml_load_file("korisnici.xml") or $postoji=false;

$servername = "localhost";
$dbusername = "admin";
$dbpassword = "admin";
$dbname = "drvenija";

# Fetch all IDs
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SELECT id FROM users");
	$stmt->execute();

	// set the resulting array to associative
	$result = $stmt->fetchAll();
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
$conn = null;

$exist = false;
foreach ($xml as $user) {
	$exist = false;
	foreach ($result as $object) {
		if($object['id']==$user->id){
			$exist = true;
			break;
		}
	}

	if($exist == false){
			try{
				$servername = "localhost";
	              $dbusername = "admin";
	              $dbpassword = "admin";
	              $dbname = "drvenija";

	              $connection = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
	              // set the PDO error mode to exception
	              $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	              // prepare sql and bind parameters
	              $statement = $connection->prepare("INSERT INTO users (id, name, surname, phone_number, location, username, email, password) VALUES (NULL, :name, :surname, :phone_number, :location, :username, :email, :password)");

	              $name = $user->Ime; 
	              $surname = $user->Prezime;
	              $phone_number = $user->Telefon;
	              $location = $user->Lokacija;
	              $username = $user->userName;
	              $email = $user->eMail;
	              $password = $user->password;

	              $statement->bindParam(':name', $name);
	              $statement->bindParam(':surname', $surname);
	              $statement->bindParam(':phone_number', $phone_number);
	              $statement->bindParam(':location', $location);
	              $statement->bindParam(':username', $username);
	              $statement->bindParam(':email', $email);
	              $statement->bindParam(':password', $password);

	              $statement->execute();

	            }
	            catch(PDOException $e){
	              echo "Error: " . $e->getMessage();
	            }

	            $connection=null;
			}
}

$xml->asXML("korisnici.xml");

header('Location: admin_izvjestaji.php');
