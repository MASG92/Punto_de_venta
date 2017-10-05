<?php
$url = "../../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$registro_fecha = DATE('Y-m-d');
$registro_hora = DATE('H:i:s');

if (!isset($_POST['validar_producto'])) {
	echo "No valido";
}else{
	$id_prov = $_POST['id_proveedor'];
	$producto = $_POST['producto'];
	$descripcion = $_POST['descripcion'];
	$precio_p = $_POST['precio_prov'];
	$precio_v = $_POST['precio_ven'];
	

	if ($producto == '' AND $descripcion == '') {
		echo "<div class='alert alert-danger'>Producto y Descripción son obligatorios</div>";
	}else{
		$nuevo_producto = "INSERT INTO tbl_producto (producto, descripcion, precio_proveedor, precio_venta, fecha_registro, hora_registro, id_proveedor) 
			VALUES ('$producto', '$descripcion', '$precio_p', '$precio_v', '$registro_fecha', '$registro_hora', '$id_prov')";
		if (mysqli_query($conn, $nuevo_producto)) {
			echo "<div class='alert alert-success'>Registrado</div>";
		} else {
			echo "Error: " . $nuevo_producto . "<br>" . mysqli_error($conn);
		}

	}
}
mysqli_close($conn);
?>