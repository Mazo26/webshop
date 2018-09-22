<?php 

session_start();
include 'template/konekcija.php';

$id = $_GET["id"];



if(isset($_SESSION["korpa"])){
	$korpa = $_SESSION["korpa"];// korpa ima vrednost trenutno sesije	
	
}else{
	$korpa = array();// definisem korpu koja je prazna ako ne postoji do sad sesija
}





for($i=0;$i<sizeof($korpa);$i++){
	if($korpa[$i]['id']==$id){
		$korpa[$i]["kolicina"] += 1; //$korpa[$i]["kolicina"] = $korpa[$i]["kolicina"]+1; ili $korpa[$i]["kolicina"]++
		$korpa[$i]["ukupna_cena"] += $korpa[$i]["cena"];
		
		
		
		break;// prekid izvrsenja for petlje
	}
}

$_SESSION["korpa"] = $korpa;
header('Location: korpa.php');


?>