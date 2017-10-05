<?php
$url = "../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$i = 0;
$sql = "SELECT * FROM tbl_caja WHERE estatus = 'abierta'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
    while($row = mysqli_fetch_assoc($result)) {
     $id_caja = $row['id'];
    }
} else {
	$id_caja = 0;
  
}
mysqli_close($conn);
?>