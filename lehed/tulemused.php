<?php
    require_once __DIR__.'/../funktsioonid.php';
    $page_title = "Tulemused";
    $page_file_name = "tulemused.php";

    $getAllResults = new getAllResults($connection);
    $deleteResults = new deleteResults($connection);
    $updateResults = new updateResults($connection);

    $results_array = $getAllResults->getAllResults();
    if(isset($_GET["delete"])) {
        $response = $deleteResults->deleteResults($_GET["delete"]);
    }

    if(isset($_GET["update"])){
        $response = $updateResults->updateResults($_GET['first_name'], $_GET['last_name'], $_GET['idnr'], $_GET['phone'], $_GET['user_id']);
    }

    $keyword = "";
    if(isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $results_array = $getAllResults->getAllResults($keyword);
    }else{
        $results_array = $getAllResults->getAllResults();
    }


    require_once(__DIR__."/../alus/pais.php");
    require_once(__DIR__."/../alus/menyy.php");


 ?>
 <div class="container-fluid">
 	<div class="row">
 		<div class="col-sm-9">
 			<table class="table table-hover">
 				<tr>
 					<th>Nimi</th>
 					<th>Jooks3000</th>
                    <th>Jooks1500</th>
 					<th>Kätekõverdused</th>
 					<th>Kõhulihased</th>
 					<th>Koordinatsioon</th>

                    <th>Muuda</th>
                    <th>Kustuta</th>

 				</tr>
 				<?php
 				for($i = 0; $i < count($users_array); $i++){
 					if(isset($_GET["edit"]) && $_GET["edit"] == $users_array[$i]->id) {
 						echo "<tr>";
 						echo '<form action="/ska/lehed/vaadekasutaja.php" method="get">';
 						echo "<input type='hidden' name='user_id' value='".$users_array[$i]->id."'>";
 						echo "<td>".$users_array[$i]->id."</td> ";
 						echo "<td><input class='form-control' name='first_name' value='".$results_array[$i]->first_name."'></td>";
 						echo "<td><input class='form-control' name='last_name' value='".$results_array[$i]->last_name."'></td>";
 						echo "<td><input class='form-control' name='idnr' value='".$results_array[$i]->idnr."'></td>";
 						echo "<td><input class='form-control' name='phone' value='".$results_array[$i]->phone."'></td>";
                         echo "<td><input class='form-control' name='langtest' value='".$results_array[$i]->langtest."'></td>";
                         echo "<td><input class='form-control' name='langgroup' value='".$results_array[$i]->langgroup."'></td>";
                         echo "<td><input class='form-control' name='phystest' value='".$results_array[$i]->phystest."'></td>";
                         echo "<td><input class='form-control' name='health' value='".$results_array[$i]->health."'></td>";
                         echo "<td><input class='form-control' name='running' value='".$results_array[$i]->running."'></td>";
                         echo "<td><input class='form-control' name='infolist' value='".$results_array[$i]->infolist."'></td>";
 						echo "<td><input class='btn btn-default btn-block' name='update' type='submit' value='Uuenda'></td>";
 						echo "<td><a class='btn btn-default btn-block' href='/ska/lehed/vaadekasutaja.php'>Katkesta</a></td>";
 						echo "</tr>";
 						echo "</form>";
 					} else {
 						echo "<tr> <td>".$results_array[$i]->id."</td> ";
 						echo "<td>".$results_array[$i]->first_name."</td>";
 						echo "<td>".$results_array[$i]->last_name."</td>";
 						echo "<td>".$results_array[$i]->idnr."</td> ";
 						echo "<td>".$results_array[$i]->phone."</td>";
                         echo "<td>".$results_array[$i]->langtest."</td>";
                         echo "<td>".$results_array[$i]->langgroup."</td>";

 						echo '<td><a class="btn btn-info btn-block" href="/ska/lehed/vaadekasutaja.php?edit='.$results_array[$i]->id.'">Muuda</a></td>';
 						echo '<td><a class="btn btn-info btn-block" href="/ska/lehed/vaadekasutaja.php?delete='.$results_array[$i]->id.'">Kustuta</a></td></tr>';

 					}
 				}
 				?>
 			</table>
 		</div>
 		<div class="col-sm-2">
 			<label class="text"> Otsi kasutajat </label>
 				<form action="/ska/lehed/tulemused.php" method="get">
 				<input class="form-control" name="keyword" type="search" value="<?=$keyword?>" ><br>
 				<input type="submit" value="otsi" class="btn btn-info btn-block">
 			</form>
 		</div>
 	</div>
 </div>

 <?php require_once(__DIR__."/../alus/jalus.php"); ?>
