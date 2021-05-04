<?php 

$host = "localhost";   //server name
$user = "root";		// database username
$pass = "";			// databae password
$dbname = "class12"; //database name 

try {

	$con =  new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
	//PDO is class where $con is object of the class PDO 
	
} 
catch (Exception $e) {

	echo $e->getMessage();
	
}





 ?>