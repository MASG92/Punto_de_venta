<?php
$url = "../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$id_usr = $_GET['id'];
$sql = "SELECT * FROM tbl_usuarios WHERE id = '$id_usr' AND estatus = 'active'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
    while($row = mysqli_fetch_assoc($result)) {
         $user = $row['usuario'];
    }
} else {
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Emmanuel Lucio">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/panel.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.js"></script>
	<title>SYSMASG</title>
	<style type="text/css">
		/* Botón propio
		-------------------------------------------------- */
		.btn-reguser,
		.btn-reguser:hover,
		.btn-reguser:active {
			color: #985099;
			background-color: transparent;
			background-image: none;
			border-color: #985099;
		}
		.btn-reguser:hover {
			color: #fff;
			background-color: #985099;
			border-color: #985099;
		}
		.btn-close,
		.btn-close:hover,
		.btn-close:active {
			color: orange;
			background-color: transparent;
			background-image: none;
			border-color: orange;
		}
		.btn-close:hover {
			color: #fff;
			background-color: orange;
			border-color: orange;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<h2><?php echo $user;?></h2>
		<form>
			<input type="hidden" id="id_user" value="<?php echo $_GET['id'];?>">
			<div class="form-group">
				<label>Password anterior</label>
				<input class="form-control" type="password" name="vpwd" id="modpwdv" autofocus>
			</div>
			<div class="form-group">
				<label>Password nuevo</label>
				<input class="form-control" type="password" name="npwd" id="modpwdn">
			</div>
			<div class="form-group">
				<select class="form-control" id="modroln">
				<?php
				$url = "../server/config.php";
				require_once($url);
				$conn = @mysqli_connect($servername, $username, $password, $bd)
				or die("Connection failed: " . mysqli_connect_error());
				$id_usr = $_GET['id'];
				$sql = "SELECT * FROM tbl_usuarios WHERE id = '$id_usr' AND estatus = 'active'";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {

					while($row = mysqli_fetch_assoc($result)) {
						if($row['rol']=='ADMIN'){
							$rol='Administrador';
						}
						if ($row['rol']=='USER') {
							$rol='Usuario';
						}
						?>
							<option value="<?php echo $row['rol']?>"><?php echo $rol;?></option>
							<option value="ADMIN">Administrador</option>
							<option value="USER">Usuario</option>
						<?php
					}
				} else {
				}
				mysqli_close($conn);
				?>
				</select>
			</div>
			<br>
			<button type="button" onclick="window.opener.location.reload();" id="modificar_usuario" class="btn btn-reguser">Guardar</button>
		</form>
		
	</div>
	<script src="../js/usuarios.js"></script>
</body>
</html>
