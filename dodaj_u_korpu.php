<?php

session_start();
include 'template/konekcija.php';

$id = $_GET["id"];

$sql = "SELECT * FROM proizvodi JOIN slike ON proizvodi.proizvodi_id = slike.slike_id_proizvoda WHERE proizvodi.proizvodi_id = '".$id."'";
$tiket = mysqli_query($conn, $sql);
$proizvod = mysqli_fetch_assoc($tiket);


if(isset($_SESSION["korpa"])){
	$korpa = $_SESSION["korpa"];// korpa ima vrednost trenutno sesije

}else{
	$korpa = array();// definisem korpu koja je prazna ako ne postoji do sad sesija
}



$promenjiva = false;

for($i=0;$i<sizeof($korpa);$i++){
	if($korpa[$i]['id']==$id){
		$korpa[$i]["kolicina"] += 1; //$korpa[$i]["kolicina"] = $korpa[$i]["kolicina"]+1; ili $korpa[$i]["kolicina"]++
		$korpa[$i]["ukupna_cena"] += $proizvod["proizvodi_cena"];

		$promenjiva = true;

		break;// prekid izvrsenja for petlje
	}
}

if($promenjiva==false){
	$korpa[] = array('id'=>$id,'naziv'=>$proizvod["proizvodi_naziv"],'barcode'=>$proizvod["proizvodi_barkod"],'slika'=>$proizvod["slike_slika"],'cena'=>$proizvod["proizvodi_cena"],'kolicina'=>1,'ukupna_cena'=>$proizvod["proizvodi_cena"]);
}
$_SESSION["korpa"] = $korpa;
header('Location: index.php');


?>
