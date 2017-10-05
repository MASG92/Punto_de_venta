<?php
$url = "../../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$registro_fecha = DATE('Y-m-d');
$registro_hora = DATE('H:i:s');

if (!isset($_POST['nota_venta'])) {
	echo "No valido";
}else{
	$id_usuario = $_POST['id_usuario'];
	$id_caja = $_POST['id_caja'];
	


	$generar_nota = "INSERT INTO tbl_ticket (id_usuario, id_caja, fecha_registro, hora_registro, estatus) 
	VALUES ('$id_usuario', '$id_caja', '$registro_fecha', '$registro_hora', 'venta')";
	if (mysqli_query($conn, $generar_nota)) {
		echo "<div class='alert alert-success'>Generando Nota...</div>";
	} else {
		echo "Error: " . $generar_nota . "<br>" . mysqli_error($conn);
	}

	
}
mysqli_close($conn);
?>