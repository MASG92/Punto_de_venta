<?php
$url = "../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());

if (!isset($_POST['registro_usuario'])) { //agregar


}else if ($_POST['usuario'] == '' or $_POST['password'] == ''  ) {
	echo "<div class='alert alert-danger'>Todos los campos son obligatorios</div>";
}
else{

	$usuario = $_POST['usuario'];
	$salt = '$MASG$/';
	$password =sha1(md5( $salt .  $_POST['password']));
	$rol = $_POST['rol_usuario'];
	$fecha  = DATE('Y-m-d');
	$hora = DATE('H:i:s');

//verificamos si existe el usuario
$ver = "SELECT * FROM tbl_usuarios WHERE usuario ='$usuario' AND estatus = 'active'";
$result = mysqli_query($conn, $ver);

if (mysqli_num_rows($result) > 0) {

while($row = mysqli_fetch_assoc($result)) {
 	$existe='si';
}
} else {
	$existe='no';
}
//
if ($existe=='si') {
	echo "<div class='alert alert-danger'>El usuario ya existe</div>";
}elseif($existe=='no'){
	$sql = "INSERT INTO tbl_usuarios (usuario, password, rol, fecha_registro, hora_registro) VALUES('$usuario', '$password', '$rol', '$fecha', '$hora')";
	if (mysqli_query($conn, $sql)) {
		echo "<div class='alert alert-success'>Registrado</div>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


}

if (!isset($_POST['modificar'])) { //Editar
 echo "no";
}else{

	$id = $_POST['id_modificar'];
	
	$verifica = "SELECT password FROM tbl_usuarios WHERE id ='$id' AND estatus = 'active'";

	$result = mysqli_query($conn, $verifica);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$pwd=$row['password'];
		}

	}else{ 
		$pwd='0';
		echo "Error: " . $verifica . " <br> " . mysqli_error($conn);
	}
	$salt = '$MASG$/';
	$nuevo_passw = sha1(md5( $salt .  $_POST['password_nuevo'])) ;
	$viejo_pass = sha1(md5( $salt .  $_POST['password_viejo']));
	$rol_nuevo = $_POST['rol'];

	if ($viejo_pass != $pwd) {
		echo "No conciden las contraseñas ". $nuevo_passw;
	}else{
		
		$sql = "UPDATE tbl_usuarios SET password='$nuevo_passw', rol='$rol_nuevo' WHERE id = '$id' ";


		if (mysqli_query($conn, $sql)) {
			echo "Editado";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	


}




if (!isset($_POST['borrar_usuario'])) { //Eliminar
}else{
	
	$id = $_POST['id_borrar'];

	
	

	$sql = "DELETE FROM tbl_usuarios WHERE id = '$id' ";


	if (mysqli_query($conn, $sql)) {
		echo "Eliminado";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


//eliminar recomendado
/*
if (!isset($_POST['borrar'])) { //Eliminar

}else{
	$id = $_POST['id'];

	
	

	$sql = "UPDATE tbl_nombres SET estatus = 'disabled' WHERE id = '$id' ";


	if (mysqli_query($conn, $sql)) {
		echo "Eliminado";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

*/

mysqli_close($conn);
?>