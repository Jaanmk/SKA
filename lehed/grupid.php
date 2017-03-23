<?php
    require_once __DIR__.'/../funktsioonid.php';
    $page_title = "Grupid";
    $page_file_name = "grupid.php";

require_once __DIR__.'/../klass/lisagrupp.php';
 $createNewGroup = new createNewGroup($connection);


$new_grupinimi ="";

 require_once(__DIR__."/../alus/pais.php");
 require_once(__DIR__."/../alus/menyy.php");
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["new_grupinimi"])) {

        $response = $createNewGroup->createGroup($_POST["new_grupinimi"]);

    }
}

 ?>



 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
     	<div class="form-group">
            <label for="Grupinimi">Grupinimi</label>
    		<input class="form-control" name="new_grupinimi" type= "text" value="<?php echo $new_grupinimi; ?>" >
        </div

 <?php require_once(__DIR__."/../alus/jalus.php"); ?>
