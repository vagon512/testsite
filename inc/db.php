<?php

$dbUser = "vagon";
$dbPassword = "1";
$dbHost = "localhost";
$dbBase = "itTrojan";

$mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $dbBase);
		if($mysqli->connect_error){
			printf("Соединение не удалось: %s\n", $mysqli->connect_error);
  			exit();
		}
?>