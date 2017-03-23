<?php
require_once __DIR__.'/../globaal_config.php';

class getAllResults{
	private $connection;

	function __construct($connection){
        $this->connection = $connection;
	}
	function getAllResults($keyword=""){
        if($keyword == ""){
			//ei otsi
			$search = "%%";
		}else{
			//otsime
			$search = "%".$keyword."%";
		}

		$stmt = $this->connection->prepare("");
		echo "string";
		$stmt->bind_param("s", $search);
        $stmt->bind_result();
		$stmt->execute();
		$array = array();
		while($stmt->fetch()){

			$results = new StdClass();
			$results->name = $name_from_db;



			array_push($array, $results);

			}

		return $array;
	}
}
class updateResults{
	private $connection;

	function __construct($connection){
        $this->connection = $connection;
		}
	function updateResults($first_name_to_db, $last_name_to_db, $idnr_to_db, $phone_to_db, $id_to_db){



		$stmt = $this->connection->prepare("UPDATE kasutaja SET Eesnimi=?, Perekonnanimi=?, Isikukood=?, Telefon=? WHERE KasutajaID=?");
		$stmt->bind_param("ssssi",$first_name_to_db, $last_name_to_db, $idnr_to_db, $phone_to_db, $id_to_db);
		$stmt->execute();

		// tühjendame aadressirea
		header("Location:/../ska/lehed/vaadekasutaja.php");

		$stmt->close();

	}
}
class deleteResults{
	private $connection;

	function __construct($connection){
        $this->connection = $connection;
		}
	function deleteUsers($user_id){

		$stmt = $this->connection->prepare("UPDATE kasutaja SET Kusutatud=NOW() WHERE KasutajaID=?");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();

		header("Location:/../ska/lehed/vaadekasutaja.php");

		$stmt->close();
	}
}

?>
