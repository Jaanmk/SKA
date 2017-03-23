<?php
    require_once __DIR__.'/../funktsioonid.php';
    require_once __DIR__.'/../klass/kliendid.php';


    $page_title = "Inimesed";
    $page_file_name = "vaadekasutaja.php";

    $getAllUsers = new getAllUsers($connection);
    $deleteUsers = new deleteUsers($connection);
    $updateUsers = new updateUsers($connection);

    $users_array = $getAllUsers->getAllUsers();
    if(isset($_GET["delete"])) {
        $response = $deleteUsers->deleteUsers($_GET["delete"]);
    }

    if(isset($_GET["update"])){
        $response = $updateUsers->updateUsers($_GET['first_name'], $_GET['last_name'], $_GET['idnr'], $_GET['phone'], $_GET['user_id']);
    }

    $keyword = "";
    if(isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $users_array = $getAllUsers->getAllUsers($keyword);
    }else{
        $users_array = $getAllUsers->getAllUsers();
    }

    require_once(__DIR__."/../alus/pais.php");
    require_once(__DIR__."/../alus/menyy.php");
?>



<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9">
			<table class="table table-hover">
				<tr>
					<th>Kasutaja ID</th>
					<th>Eesnimi</th>
					<th>Perekonnanimi</th>
					<th>Isikukood</th>
					<th>Telefon</th>
                    <th>Keeletest</th>
                    <th>Keelegrupp</th>
                    <th>Kehaline</th>
                    <th>Tervis</th>
                    <th>Jooks</th>
                    <th>Infolist</th>

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
						echo "<td><input class='form-control' name='first_name' value='".$users_array[$i]->first_name."'></td>";
						echo "<td><input class='form-control' name='last_name' value='".$users_array[$i]->last_name."'></td>";
						echo "<td><input class='form-control' name='idnr' value='".$users_array[$i]->idnr."'></td>";
						echo "<td><input class='form-control' name='phone' value='".$users_array[$i]->phone."'></td>";
                        echo "<td><input class='form-control' name='langtest' value='".$users_array[$i]->langtest."'></td>";
                        echo "<td><input class='form-control' name='langgroup' value='".$users_array[$i]->langgroup."'></td>";
                        echo "<td><input class='form-control' name='phystest' value='".$users_array[$i]->phystest."'></td>";
                        echo "<td><input class='form-control' name='health' value='".$users_array[$i]->health."'></td>";
                        echo "<td><input class='form-control' name='running' value='".$users_array[$i]->running."'></td>";
                        echo "<td><input class='form-control' name='infolist' value='".$users_array[$i]->infolist."'></td>";
						echo "<td><input class='btn btn-default btn-block' name='update' type='submit' value='Uuenda'></td>";
						echo "<td><a class='btn btn-default btn-block' href='/ska/lehed/vaadekasutaja.php'>Katkesta</a></td>";
						echo "</tr>";
						echo "</form>";
					} else {
						echo "<tr> <td>".$users_array[$i]->id."</td> ";
						echo "<td>".$users_array[$i]->first_name."</td>";
						echo "<td>".$users_array[$i]->last_name."</td>";
						echo "<td>".$users_array[$i]->idnr."</td> ";
						echo "<td>".$users_array[$i]->phone."</td>";
                        echo "<td>".$users_array[$i]->langtest."</td>";
                        echo "<td>".$users_array[$i]->langgroup."</td>";
                        echo "<td>".$users_array[$i]->phystest."</td>";
                        echo "<td>".$users_array[$i]->health."</td>";
                        echo "<td>".$users_array[$i]->running."</td>";
                        echo "<td>".$users_array[$i]->infolist."</td>";
						echo '<td><a class="btn btn-info btn-block" href="/ska/lehed/vaadekasutaja.php?edit='.$users_array[$i]->id.'">Muuda</a></td>';
						echo '<td><a class="btn btn-info btn-block" href="/ska/lehed/vaadekasutaja.php?delete='.$users_array[$i]->id.'">Kustuta</a></td></tr>';

					}
				}
				?>
			</table>
		</div>
		<div class="col-sm-2">
			<label class="text"> Otsi kasutajat </label>
				<form action="/ska/lehed/vaadekasutaja.php" method="get">
				<input class="form-control" name="keyword" type="search" value="<?=$keyword?>" ><br>
				<input type="submit" value="otsi" class="btn btn-info btn-block">
			</form>
		</div>
	</div>
</div>

<?php require_once(__DIR__."/../alus/jalus.php"); ?>
