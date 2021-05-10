<?php 
	require_once "config.php";
	$query = 
	"CREATE TABLE users ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(255) NOT NULL,
		email VARCHAR(255) UNIQUE NOT NULL,
		score INT(10) NOT NULL)
	";

	$conn->query($query);
?>