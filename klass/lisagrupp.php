<?php

require_once __DIR__.'/../globaal_config.php';
class createNewGroup{
	private $connection;

	function __construct($connection){
        $this->connection = $connection;
	}
    function createGroup($new_grupinimi){
        $stmt = $this->connection->prepare("INSERT INTO grupid (Nimi) VALUES (?)");
    	$stmt->bind_param("s", $new_grupinimi);
        $stmt->execute();
        $stmt->close();

    }
}













?>
