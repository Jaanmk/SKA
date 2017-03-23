<?php
require_once __DIR__.'/../globaal_config.php';

class getAllUsers{
	private $connection;

	function __construct($connection){
        $this->connection = $connection;
	}
	function getAllUsers($keyword=""){
        if($keyword == ""){
			//ei otsi
			$search = "%%";
		}else{
			//otsime
			$search = "%".$keyword."%";
		}

		$stmt = $this->connection->prepare("SELECT KasutajaID, Eesnimi, Perekonnanimi, Isikukood, Telefon, EestiKeeleTest, EestiValiGrupp, KehalineOsaleb,TervisklikSeis, Jooks, Infolist FROM kasutaja WHERE Kusutatud IS NULL AND (Perekonnanimi LIKE ?)");
		echo "string";
		$stmt->bind_param("s", $search);
        $stmt->bind_result($id_from_db, $first_name_from_db, $last_name_from_db, $idnr_from_db, $phone_from_db, $langtest_from_db, $langgroup_from_db, $phystest_from_db, $health_from_db, $running_from_db, $infolist_from_db);
		$stmt->execute();
		$array = array();
		while($stmt->fetch()){

			$users = new StdClass();
			$users->id = $id_from_db;
			$users->first_name = $first_name_from_db;
            $users->last_name = $last_name_from_db;
            $users->idnr = $idnr_from_db;
            $users->phone = $phone_from_db;
            $users->langtest = $langtest_from_db;
            $users->langgroup = $langgroup_from_db;
            $users->phystest = $phystest_from_db;
            $users->health = $health_from_db;
            $users->running = $running_from_db;
            $users->infolist = $infolist_from_db;


			array_push($array, $users);

			}

		return $array;
	}
}
class updateUsers{
	private $connection;

	function __construct($connection){
        $this->connection = $connection;
		}
	function updateUsers($first_name_to_db, $last_name_to_db, $idnr_to_db, $phone_to_db, $id_to_db){



		$stmt = $this->connection->prepare("UPDATE kasutaja SET Eesnimi=?, Perekonnanimi=?, Isikukood=?, Telefon=? WHERE KasutajaID=?");
		$stmt->bind_param("ssssi",$first_name_to_db, $last_name_to_db, $idnr_to_db, $phone_to_db, $id_to_db);
		$stmt->execute();

		// tühjendame aadressirea
		header("Location:/../ska/lehed/vaadekasutaja.php");

		$stmt->close();

	}
}
class deleteUsers{
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
