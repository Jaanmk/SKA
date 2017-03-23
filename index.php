<?php

require_once __DIR__.'/funktsioonid.php';
require_once __DIR__.'/klass/lisaeraldi.php';
$createUser = new createUser($connection);


$new_eesnimi_error = "";
$new_perenimi_error ="";
$new_email_error = "";
$new_isikukood_error = "";


$new_eesnimi = "";
$new_perenimi = "";
$new_email = "";
$new_telefon = "";
$new_isikukood = "";
$new_eestikeeletest = "";
$new_eestikeelegrupp = "";
$new_keh_katsed ="";
$new_terv_seisund ="";
$new_jooks = "";
$new_infolist ="";
$new_sugu ="";



	if($_SERVER["REQUEST_METHOD"] == "POST") {

		if(isset($_POST["uus_tudeng"])) {

			if(empty($_POST["new_eesnimi"])) {
				$new_eesnimi_error = "ei saa olla tühi";
			} else {
				$new_eesnimi = test_input($_POST["new_eesnimi"]);
			}

			if(empty($_POST["new_perenimi"])) {
				$new_perenimi_error = "ei saa olla tühi";
			} else {
				$new_perenimi = test_input($_POST["new_perenimi"]);
			}


			if(empty($_POST["new_email"])) {
				$new_email_error = "ei saa olla tühi";
			} else {
				$new_email = test_input($_POST["new_email"]);
			}


			if(empty($_POST["new_isikukood"]) ){

					$new_isikukood_error = "Isikukood on 11 kohaline";
				}


			if(	$new_eesnimi_error == "" && $new_perenimi_error == "" && $new_email_error == ""){

				if (empty($_POST["new_eesnimi"])) {
					$new_eesnimi_error = "Sisesta eesnimi";
					} else {
				$new_eesnimi = test_input($_POST["new_eesnimi"]);
				}

				if (empty($_POST["new_perenimi"])) {
					$new_perenimi_error = "Sisesta perenimi";
					} else {
				$new_perenimi = test_input($_POST["new_perenimi"]);
				}

				if (empty($_POST["new_sugu"])) {
					$new_sugu="";
					} else {
				$new_sugu = test_input($_POST["new_sugu"]);
				}

				if (empty($_POST["new_email"])) {
					$new_email_error = "Sisesta email";
					} else {
				$new_email = test_input($_POST["new_email"]);
				}

				if (empty($_POST["new_telefon"])) {
					$new_telefon= "";
					} else {
				$new_telefon = test_input($_POST["new_telefon"]);
				}

				if (empty($_POST["new_isikukood"])) {
					$new_isikukood= "";
					} else {
				$new_isikukood = test_input($_POST["new_isikukood"]);
				}

				if (empty($_POST["new_eestikeeletest"])) {
					$new_eestikeeletest= "";
					} else {
				$new_eestikeeletest = test_input($_POST["new_eestikeeletest"]);
				}

				if (empty($_POST["new_eestikeelegrupp"])) {
					$new_eestikeelegrupp= "";
					} else {
				$new_eestikeelegrupp = test_input($_POST["new_eestikeelegrupp"]);
				}

				if (empty($_POST["new_keh_katsed"])) {
					$new_keh_katsed= "";
					} else {
				$new_keh_katsed = test_input($_POST["new_keh_katsed"]);
				}

				if (empty($_POST["new_terv_seisund"])) {
					$new_terv_seisund= "";
					} else {
				$new_terv_seisund = test_input($_POST["new_terv_seisund"]);
				}

				if (empty($_POST["new_jooks"])) {
					$new_jooks= "";
					} else {
				$new_jooks = test_input($_POST["new_jooks"]);
				}

				if (empty($_POST["new_infolist"])) {
					$new_infolist= "";
					} else {
				$new_infolist = test_input($_POST["new_infolist"]);
				}


				$response = $createUser->createUser($new_eesnimi, $new_perenimi, $new_sugu, $new_email, $new_telefon, $new_isikukood, $new_eestikeeletest, $new_eestikeelegrupp, $new_keh_katsed, $new_terv_seisund, $new_jooks, $new_infolist);


			}
		}
	}







$page_title = "Avaleht";
$page_file_name = "index.php";



require_once __DIR__.'/alus/pais.php';
require_once __DIR__.'/alus/menyy.php';

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

	<div class="form-group">
		<label for="new-eesnimi">Eesnimi</label>
		<input class="form-control" name="new_eesnimi" type= "text" value="<?php echo $new_eesnimi; ?>" > <?php echo $new_eesnimi_error; ?>
	</div>
	<div class="form-group">
		<label for="new-perenimi">Perekonnanimi</label>
		<input class="form-control" name="new_perenimi" type= "text" value="<?php echo $new_perenimi; ?>" > <?php echo $new_perenimi_error; ?>
	</div>
	<div class="form-group">
			<label for="new_sugu"> Sugu </label>
			<select class="form-control" name="new_sugu">
				<option value="">Select...</option>
				<option value="1">Mees</option>
				<option value="2">Naine</option>
			</select>

	</div>

	<div class="form-group">
		<label for="new-email">E-mail</label>
		<input class="form-control" name="new_email" type= "email" value="<?php echo $new_email; ?>" > <?php echo $new_email_error; ?>
	</div>

	<div class="form-group">
		<label for="new-telefon">Telefon</label>
		<input class="form-control" name="new_telefon" type= "text" value="<?php echo $new_telefon; ?>" >
	</div>

	<div class="form-group">
		<label for="new-isikukood">Isikukood</label>
		<input class="form-control" name="new_isikukood" type= "number" value="<?php echo $new_isikukood; ?>" > <?php echo $new_isikukood_error; ?>
	</div>

	<div class="form-group">
		<label for="new_eestikeeletest"> Eesti keele test? </label>
		<select class="form-control" name="new_eestikeeletest">
			<option value="">Select...</option>
			<option value="1">Osaleb</option>
			<option value="2">Ei osale</option>
		</select>
	</div>

	<div class="form-group">
		<label for="new_eestikeelegrupp"> Eesti keele grupp? </label>

		<select class="form-control" name="new_eestikeelegrupp">
			<option value="">Select...</option>
			<option value="1">Eesti emakeelega</option>
			<option value="2">Eesti keelest erineva emakeelega</option>
		</select>
	</select>
</div>
<div class="form-group">
	<label for="new_keh_katsed"> Kehalised katsed? </label>
		<select class="form-control" name="new_keh_katsed">
			<option value="">Select...</option>
			<option value="1">Osaleb</option>
			<option value="2">Ei osale</option>
		</select>
	</select>
</div>

<div class="checkbox">
	<label>
		<input type="checkbox" name="new_terv_seisund" value="1" /> Vastutab tervisliku seisundi eest
	</label>
</div>

<div class="form-group">

		<label for="new_jooks"> Jooksu aeg? </label>
		<select class="form-control" name="new_jooks">
			<option value="">Select...</option>
			<option value="1">Kiiremini kui 6 min</option>
			<option value="2">6-7 min</option>
			<option value="3">Aeglasem kui 7 min</option>
		</select>

	</select>
</div>
	<div class="form-group">
<div class="checkbox">
	<label>
		<input type="checkbox" name="new_infolist" value="1" />Infolistiga liitumine
	</label>
</div>
</div>

<p>
	<button type="submit" class="btn btn-primary btn-lg" name="uus_tudeng">Sisesta</button>
</p>

</form>

<?php require_once __DIR__.'/alus/jalus.php'; ?>
