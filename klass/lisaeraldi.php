<?php
require_once __DIR__.'/../globaal_config.php';
class createUser{
	private $connection;

	function __construct($connection){
        $this->connection = $connection;
	}

    function createUser($new_eesnimi, $new_perenimi, $new_sugu, $new_email, $new_telefon, $new_isikukood, $new_eestikeeletest, $new_eestikeelegrupp, $new_keh_katsed, $new_terv_seisund, $new_jooks, $new_infolist){

    //$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);

    $stmt = $this->connection->prepare("INSERT INTO kasutaja (Eesnimi, Perekonnanimi, Sugu, Email, Telefon, Isikukood, EestiKeeleTest, EestiValiGrupp, KehalineOsaleb, TervisklikSeis, Jooks, Infolist) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("ssssssiiiiii", $new_eesnimi, $new_perenimi, $new_sugu, $new_email, $new_telefon, $new_isikukood, $new_eestikeeletest, $new_eestikeelegrupp, $new_keh_katsed, $new_terv_seisund, $new_jooks, $new_infolist);
	$stmt->execute();
    $stmt->close();

    header("Location:/../ska/lehed/vaadekasutaja.php");







    }
}
?>
