<?php
$url = "../../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$registro_fecha = DATE('Y-m-d');
$registro_hora = DATE('H:i:s');

if (!isset($_POST['abrir_caja'])) {
	echo "No valido";
}else{
	$id_usuario = $_POST['id_usuario'];
	$importe_abierto = $_POST['importe_abierto'];
	


	$abrir_ca = "INSERT INTO tbl_caja (id_usuario, cantidad_abierta, fecha_abierta, hora_abierta, estatus) 
	VALUES ('$id_usuario', '$importe_abierto', '$registro_fecha', '$registro_hora', 'abierta')";
	if (mysqli_query($conn, $abrir_ca)) {
		echo "<div class='alert alert-success'>Caja abierta</div>";
	} else {
		echo "Error: " . $abrir_ca . "<br>" . mysqli_error($conn);
	}

	
}
mysqli_close($conn);
?>