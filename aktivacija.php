<?php
include 'template/konekcija.php';
$id = $_GET["id"];

$pro = $_GET["provera"];

if(md5('Au!k_'.$id.'_58T')==$pro ){

	$sql = "UPDATE korisnici set aktivan = 1 WHERE korisnici_id = ".$id."";
	mysqli_query($conn, $sql);
	header('Location:uspesna_aktivacija.php');
	
}else{
	header('Location:404.php');
}







//header('Location:uspesna_aktivacija.php');

?>
