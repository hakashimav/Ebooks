<?php

$dsn = 'mysql:dbname=ebooks;host=127.0.0.1';
$user = 'root';
$password = '';

try {
	//code...
	$con = new PDO($dsn, $user, $password);

	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOException $e) {
	//throw $th;
	echo 'Connexion échouée : ' .$e->getMessage(); 

}
