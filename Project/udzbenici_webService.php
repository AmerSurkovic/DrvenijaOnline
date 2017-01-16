<?php

function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
}

function rest_get($request, $data) {
	$bookID = $_GET['school'];

	$connection = new PDO('mysql:host=localhost;dbname=drvenija;charset=utf8', 'admin', 'admin');
	$connection->exec("set names utf8");

	$query = $connection->prepare("SELECT * FROM books WHERE school=:school");
	$query->bindValue(':school', $bookID);
	$query->execute();


	#foreach ($query->fetchAll() as $book)
	#    print $book["title"] . "," . $book["school"] . "," . $book["id"] ."\n";

	$data = array();
	foreach ($query as $v) {
		$data[] = array("Naslov"=>$v['title'], "Skola"=>$v['school'], "Predmet"=>$v['subject'], "Godina_izdavanja"=>$v['year_published'], "Stanje"=>$v['state'], "Cijena"=>$v['price'], "Mogucnost_zamjene"=>$v['exchange_option']);
	}

	echo "{ \"knjige\": " . json_encode($data) . "}";
}

function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}