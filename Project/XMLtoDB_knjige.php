<?php

$xml=simplexml_load_file("knjige.xml") or $postoji=false;

$servername = "localhost";
$dbusername = "admin";
$dbpassword = "admin";
$dbname = "drvenija";

# Fetch all IDs
try {
	/*title=:title, school=:school, subject=:subject, year_published=:year_published, state=:state, price=:price, exchange_option=:exchange_option*/
	# , title, school, subject, year_published, state, price, exchange_option
	$conn = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=drvenija', 'admin', 'admin');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SELECT id FROM books");
	$stmt->execute();

	// set the resulting array to associative
	$result = $stmt->fetchAll();
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
$conn = null;

$exist = false;
foreach ($xml as $book) {
	$exist = false;
	foreach ($result as $object) {
		if($object['id']==$book->id){
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

	              $connection = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=drvenija', 'admin', 'admin');
	              // set the PDO error mode to exception
	              $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	              // prepare sql and bind parameters
	              $statement = $connection->prepare("INSERT INTO books (id, title, school, subject, year_published, state, price, exchange_option, user) VALUES (NULL, :title, :school, :subject, :year_published, :state, :price, :exchange_option, :user)");

	              $title = $book->naziv; 
	              $school = $book->skola;
	              $subject = $book->predmet;
	              $year_published = $book->GodinaIzdavanja;
	              $state = $book->stanje;
	              $price = $book->cijena;
	              $exchange_option = $book->MogucnostRazmjene;
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

	            }
	            catch(PDOException $e){
	              echo "Error: " . $e->getMessage();
	            }

	            $connection=null;
			}
}

$xml->asXML("knjige.xml");

header('Location: admin_izvjestaji.php');
