<?php
require("../server/session.php");
if (!isset($usr)) {
	header('location: ../index.php');
}else{
	if ($rol == 'USER') {
		header('location: ../server/exit.php');
	}
}
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
	<!-- tables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.3/css/select.bootstrap4.min.css">
	<script type="text/javascript" src="https://raw.githubusercontent.com/bpampuch/pdfmake/master/build/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://raw.githubusercontent.com/bpampuch/pdfmake/master/build/vfs_fonts.js"></script>
	<title>SYSMASG</title>
	<style type="text/css">
		/* Botón propio
		-------------------------------------------------- */
		.dis{
			color: gray;
		}
		.titt{
			color: #563d7c;
		}
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
	<nav class="navbar navbar-expand-md navbar-dark fixed-top"  style="background-color: #985099;">
		<a class="navbar-brand" href="#">Inicio</a>
		<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#"><?php echo $usr;?> - <?php echo $rol;?> - <?php echo $id_user;?> <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<div class="form-inline mt-2 mt-md-0">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="../server/exit.php">Salir</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
				<ul class="nav nav-pills flex-column">
					<li class="nav-item">
						<a class="nav-link dis" href="home.php">Inicio <i class="material-icons">home</i></a>
					</li>
					<li class="nav-item">
						<a  class="nav-link dis" href="caja.php">Caja <i class="material-icons">layers</i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link dis" href="proveedor.php">Proveedores <i class="material-icons">supervisor_account</i></a>
					</li>
					<li class="nav-item">
						<a  style="background-color: #D1B1D1!important;"  class="nav-link active" href="#">Productos <i class="material-icons">assistant</i></a>
					</li>
					<li class="nav-item">
						<a  class="nav-link dis" href="../core/home.php">Usuarios <i class="material-icons">person</i></a>
					</li>
				</ul>
			</nav>
			<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
				<h1 class="titt">Productos <div id="resp"></div></h1> 
				<p>
					<button type="button" class="btn btn-reguser" data-toggle="modal" data-target="#nuevo_prod">Registrar</button>
				</p>
				<hr>
				<div id="prod"></div>
			</main>
		</div>
	</div>
	
<!-- Modal --> 
<div class="modal fade" id="nuevo_prod" tabindex="-1" role="dialog" aria-labelledby="nuevo_prod" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title titt" id="nuevo_prod">Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
        		<label>Proveedor</label>
        		<?php require('proveedores/proveedor_id.php');?>
        	</div>
        	<div class="form-group">
        		<input type="text" class="form-control" id="producto" name="producto" placeholder="Producto">
        	</div>
        	<div class="form-group">
        		<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
        	</div>
        	<div class="form-group">
        		<input type="number" step="any" class="form-control" id="precio_prov" name="precio_prov" placeholder="Precio Proveedor">
        	</div>
        	<div class="form-group">
        		<input type="number" step="any" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio Venta">
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="nuevo_producto" class="btn btn-info"  data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>
	
<script type="text/javascript" src="productos/main.js"></script>
</body>
</html>
