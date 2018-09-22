<?php include 'template/header.php';


$istaknuti_proizvodi = array();
$sql = "SELECT * FROM kategorije";
$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$istaknuti_proizvodi[] = $row;
}


for($i=0;$i<sizeof($istaknuti_proizvodi);$i++){



}


?>
