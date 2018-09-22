<?php

session_start();
include 'template/konekcija.php';

$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$email = $_POST["email"];
$adresa = $_POST["adresa"];
$telefon = $_POST["telefon"];


if(isset($_SESSION["korpa"])){
	$korpa_prikaz = $_SESSION["korpa"];
}else{
	$korpa_prikaz = array();
}


if(isset($_SESSION["log"])){
	$id = $_SESSION["log"]["id"];

}else{
	$id = 0;
}

$ukupna_cena_korpe = 0;
for($i=0;$i<sizeof($korpa_prikaz);$i++){
   $ukupna_cena_korpe+=$korpa_prikaz[$i]["ukupna_cena"];
}

if($ime!=''){
	if($prezime!=''){

			$sql = "INSERT INTO porudzbine VALUES (NULL,'".$id."','".$ime."','".$prezime."','".$email."','".$adresa."','".$telefon."','".$ukupna_cena_korpe."')";
			mysqli_query($conn, $sql);

			$id_porudzbine = mysqli_insert_id();

			for($i=0;$i<sizeof($korpa_prikaz);$i++){

				$sql = "INSERT INTO stavke_produdzbine VALUES (NULL,'".$id_porudzbine."','".$korpa_prikaz[$i]["id"]."','".$korpa_prikaz[$i]["cena"]."','".$korpa_prikaz[$i]["kolicina"]."','".$korpa_prikaz[$i]["ukupna_cena"]."')";

				mysqli_query($sql);	
			}
			unset($_SESSION["korpa"]);
			header('Location: index.php');

	}else{
		echo 'Popunite prezime';
	}
}else{
	echo 'Popunite ime';
}





 ?>
