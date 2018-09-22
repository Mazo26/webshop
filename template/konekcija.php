<?php

/*   **PRIMER STARE KONEKCIJE**
$server   = "localhost"; // u 90% slucajeva ostaje localhost znaci za sad uvek pisete localhost
$database = "php_shop"; // naziv baze (jedino promenjivo)
$username = "root"; // naziv usera (za sad je uvek root)
$password = ""; // password (za sad je uvek prazan)

//===============DEO KODA KOJI JE UVEK ISTI===============================
$mysqliConnection = mysqli_connect($server, $username, $password);
if (!$mysqliConnection)
{
  echo "Please try later.";
}
else
{
mysqli_select_db($database, $mysqliConnection);
mysqli_query("SET NAMES  UTF8", $mysqliConnection);
}

//===========KRAJ DELA KODA KOJI JE UVEK ISTI==================

*/

$conn=mysqli_connect("localhost", "root", "", "php_shop");

if(mysqli_connect_errno()){
echo "error connecting TO DB!";
}
?>
