<?php

//Create Array
$gejala = array();
$gejalaBool = array();
$gejalaKlinis = array();
$gejalaKlinisMaks = array();
$gejalaKlinisString = array();
$infeksi = array();
$infeksiMaks = array();
$infeksiString = array();
$gejalaString = array();

//Inisialisasi gejala
for ($i = 0; $i <= 18; $i++) {
	$gejala[$i] = 0;
}

//Inisialisasi gejalaString
$gejalaString[0] = "anda sering mengalami buang air besar (lebih dari 2 kali)";
$gejalaString[1] = "anda mengalami berak encer";
$gejalaString[2] = "anda mengalami berak berdarah";
$gejalaString[3] = "anda merasa lesu / tidak bergairah";
$gejalaString[4] = "anda tidak selera makan";
$gejalaString[5] = "anda mual / sering muntah (lebih dari 1 kali)";
$gejalaString[6] = "anda merasa sakit di bagian perut";
$gejalaString[7] = "tekanan darah anda rendah";
$gejalaString[8] = "anda merasa pusing";
$gejalaString[9] = "anda mengalami pingsan";
$gejalaString[10] = "suhu badan anda tinggi";
$gejalaString[11] = "anda mengalami luka di bagian tertentu";
$gejalaString[12] = "anda tidak dapat menggerakkan anggota badan tertentu";
$gejalaString[13] = "anda pernah memakan sesuatu";
$gejalaString[14] = "anda memakan daging";
$gejalaString[15] = "anda memakan jamur";
$gejalaString[16] = "anda memakan makanan kaleng";
$gejalaString[17] = "anda membeli susu";
$gejalaString[18] = "anda meminum susu"; 

//Inisialisasi gejalaKlinis
for ($i = 0; $i <= 22; $i++) {
	$gejalaKlinis[$i] = 0;
}

//Inisialisasi gejalaKlinisMaks
$gejalaKlinisMaks[0] = 4;
$gejalaKlinisMaks[1] = 3;
$gejalaKlinisMaks[2] = 2;
$gejalaKlinisMaks[3] = 3;
$gejalaKlinisMaks[4] = 2;
$gejalaKlinisMaks[5] = 4;
$gejalaKlinisMaks[6] = 4;
$gejalaKlinisMaks[7] = 2;
$gejalaKlinisMaks[8] = 5;
$gejalaKlinisMaks[9] = 2;
$gejalaKlinisMaks[10] = 2;
$gejalaKlinisMaks[11] = 2;
$gejalaKlinisMaks[12] = 2;

//Inisialisasi gejalaKlinisString
$gejalaKlinisString[0] = "Mencret";
$gejalaKlinisString[1] = "Muntah";
$gejalaKlinisString[2] = "Sakit perut";
$gejalaKlinisString[3] = "Darah rendah";
$gejalaKlinisString[4] = "Koma";
$gejalaKlinisString[5] = "Demam";
$gejalaKlinisString[6] = "Septicaemia";
$gejalaKlinisString[7] = "Lumpuh";
$gejalaKlinisString[8] = "Mencret berdarah";
$gejalaKlinisString[9] = "Makan daging";
$gejalaKlinisString[10] = "Makan jamur";
$gejalaKlinisString[11] = "Makan makanan kaleng";
$gejalaKlinisString[12] = "Minum susu";

//Inisialisasi infeksi
for ($i = 0; $i <= 4; $i++) {
	$infeksi[$i] = 0;
}

//Inisialisasi infeksiMaks
$infeksiMaks[0] = 5;
$infeksiMaks[1] = 5;
$infeksiMaks[2] = 6;
$infeksiMaks[3] = 3;
$infeksiMaks[4] = 4;

//Inisialisasi infeksiString
$infeksiString[0] = "Keracunan Staphylococcus aureus"; 
$infeksiString[1] = "Keracunan jamur beracun";
$infeksiString[2] = "Keracunan Salmonellae";
$infeksiString[3] = "Keracunan Clostridium botulinum";
$infeksiString[4] = "Keracunan Campylobacter";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap.min.css">

	<title>SISTEM PAKAR INFEKSI SISTEM GASTRO USUS</title>
</head>

<body>
	<div class="container navi-jarak">
		<div class="row justify-content-center">
			<div class="col-11 col-md-8 mt-3">
				<div class="card">
					<div class="card-header">
						<h1> SISTEM PAKAR INFEKSI SISTEM GASTRO USUS </h1>
					</div>
					<div class="card-body">

						<form action="" method="post">
							<?php foreach ($gejalaString as $key => $value): ?>
								<input type="checkbox" name="gejala[]" value="<?= $key ?>">
								Apakah <?= $value ?> ?
								<br>
							<?php endforeach; ?>
							<br>
							<label for="threshold">Threshold : </label>
							<input type="text" id="threshold" name="threshold"> %
							<br><br>
							<button type="submit" name="submit">Submit</button>
						</form>
						<br>


						<?php if (isset($_POST['submit']) && isset($_POST['gejala']) && isset($_POST['threshold'])) {
							$gejalaChecked = $_POST['gejala'];
							$threshold = $_POST['threshold'];

							if ($gejalaChecked == null):
								echo('Kosong');
							else:
								foreach($gejalaChecked as $value):
									$gejala[$value] = 1;
								endforeach;

								//Hitung
								$gejalaKlinis[0] = ($gejala[0] + $gejala[1] + $gejala[3] + $gejala[4]) / $gejalaKlinisMaks[0];
								$gejalaKlinis[1] = ($gejala[3] + $gejala[4] + $gejala[5]) / $gejalaKlinisMaks[1];
								$gejalaKlinis[2] = ($gejala[3] + $gejala[6]) / $gejalaKlinisMaks[2];
								$gejalaKlinis[3] = ($gejala[3] + $gejala[7] + $gejala[8]) / $gejalaKlinisMaks[3];
								$gejalaKlinis[9] = ($gejala[13] + $gejala[14]) / $gejalaKlinisMaks[9];
								$infeksi[0] = ($gejalaKlinis[0] + $gejalaKlinis[1] + $gejalaKlinis[2] + $gejalaKlinis[3] + $gejalaKlinis[9]) / $infeksiMaks[0] * 100;

								$gejalaKlinis[0] = ($gejala[0] + $gejala[1] + $gejala[3] + $gejala[4]) / $gejalaKlinisMaks[0];
								$gejalaKlinis[1] = ($gejala[3] + $gejala[4] + $gejala[5]) / $gejalaKlinisMaks[1];
								$gejalaKlinis[2] = ($gejala[3] + $gejala[6]) / $gejalaKlinisMaks[2];
								$gejalaKlinis[4] = ($gejala[7] + $gejala[9]) / $gejalaKlinisMaks[4];
								$gejalaKlinis[10] = ($gejala[13] + $gejala[15]) / $gejalaKlinisMaks[10];
								$infeksi[1] = ($gejalaKlinis[0] + $gejalaKlinis[1] + $gejalaKlinis[2] + $gejalaKlinis[4] + $gejalaKlinis[10]) / $infeksiMaks[1] * 100;

								$gejalaKlinis[0] = ($gejala[0] + $gejala[1] + $gejala[3] + $gejala[4]) / $gejalaKlinisMaks[0];
								$gejalaKlinis[1] = ($gejala[3] + $gejala[4] + $gejala[5]) / $gejalaKlinisMaks[1];
								$gejalaKlinis[2] = ($gejala[3] + $gejala[6]) / $gejalaKlinisMaks[2];
								$gejalaKlinis[5] = ($gejala[3] + $gejala[4] + $gejala[8] + $gejala[10]) / $gejalaKlinisMaks[5];
								$gejalaKlinis[6] = ($gejala[3] + $gejala[7] + $gejala[10] + $gejala[11]) / $gejalaKlinisMaks[6];
								$gejalaKlinis[9] = ($gejala[13] + $gejala[14]) / $gejalaKlinisMaks[9];
								$infeksi[2] = ($gejalaKlinis[0] + $gejalaKlinis[1] + $gejalaKlinis[2] + $gejalaKlinis[5] + $gejalaKlinis[6] + $gejalaKlinis[9]) / $infeksiMaks[2] * 100;

								$gejalaKlinis[1] = ($gejala[3] + $gejala[4] + $gejala[5]) / $gejalaKlinisMaks[1];
								$gejalaKlinis[7] = ($gejala[3] + $gejala[12]) / $gejalaKlinisMaks[7];
								$gejalaKlinis[11] = ($gejala[13] + $gejala[16]) / $gejalaKlinisMaks[11];
								$infeksi[3] = ($gejalaKlinis[1] + $gejalaKlinis[7] + $gejalaKlinis[11]) / $infeksiMaks[3] * 100;

								$gejalaKlinis[8] = ($gejala[0] + $gejala[1] + $gejala[2] + $gejala[3] + $gejala[4]) / $gejalaKlinisMaks[8];
								$gejalaKlinis[2] = ($gejala[3] + $gejala[6]) / $gejalaKlinisMaks[2];
								$gejalaKlinis[5] = ($gejala[3] + $gejala[4] + $gejala[8] + $gejala[10]) / $gejalaKlinisMaks[5];
								$gejalaKlinis[12] = ($gejala[17] + $gejala[18]) / $gejalaKlinisMaks[12];
								$infeksi[4] = ($gejalaKlinis[8] + $gejalaKlinis[2] + $gejalaKlinis[5] + $gejalaKlinis[12]) / $infeksiMaks[4] * 100;

								for($i=0; $i<=4; $i++){
									
									echo($infeksiString[$i]);
									echo(": ");
									echo("$infeksi[$i] % <br>");
								}
								echo("<br> Anda terkena: <br>");
								for($i=0; $i<=4; $i++){
									if($infeksi[$i]>=$threshold){
										echo("$infeksiString[$i]; <br>");
									}
								}
							endif;
						} ?>

					</div>
				</div>
			</div>
		</div>
	</body>
	</html>

	