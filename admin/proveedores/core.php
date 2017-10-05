<?php
$url = "../../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$registro_fecha = DATE('Y-m-d');
$registro_hora = DATE('H:i:s');

if (!isset($_POST['validar_proveedor'])) {
	echo "No valido";
}else{

	$proveedor = $_POST['nvo_proveedor'];
	$contacto = $_POST['nvo_contacto'];
	$direccion = $_POST['nvo_direccion'];
	$telefono = $_POST['nvo_telefono'];

	if ($proveedor == '' AND $contacto == '') {
		echo "<div class='alert alert-danger'>Proveedor y Contacto son obligatorios</div>";
	}else{
		$nuevo_proveedor = "INSERT INTO tbl_proveedores (proveedor, contacto, direccion, telefono, fecha_registro, hora_registro) VALUES ('$proveedor', '$contacto', '$direccion', '$telefono', '$registro_fecha', '$registro_hora')";
		if (mysqli_query($conn, $nuevo_proveedor)) {
			echo "<div class='alert alert-success'>Registrado</div>";
		} else {
			echo "Error: " . $nuevo_proveedor . "<br>" . mysqli_error($conn);
		}

	}
}
mysqli_close($conn);
?>