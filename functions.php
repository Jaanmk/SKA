<?php

	//db
	require_once("config_global.php");


	$database = "ska";

	session_start();



	function createUser($new_eesnimi, $new_perenimi, $new_email, $new_telefon, $new_isikukood){

		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);

		$stmt = $mysqli->prepare("INSERT INTO kasutaja (Eesnimi, Perekonnanimi, Email, Telefon, Isikukood) VALUES (?,?,?,?,?)");
		$stmt->bind_param("sssss", $new_eesnimi, $new_perenimi, $new_email, $new_telefon, $new_isikukood);
		$stmt->execute();
		$stmt->close();

        $mysqli->close();


	}

	



?>
