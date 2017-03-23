<?php
//define('__ROOT__', dirname(dirname(__FILE__)));

function test_input($data) {

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

};

session_start();

require_once(__DIR__.'/globaal_config.php');

$connection = new mysqli($servername, $server_username, $server_password, $dbname);

$smth = "miski";

?>
