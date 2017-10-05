
<?php/*
require("../server/session.php");
if (!isset($usr)) {
  header('location: ../index.php');
}else{
  if ($rol == 'USER') {
    header('location: ../server/exit.php');
  }
}*/
?>
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
    ?>

  <div class="alert alert-info"><h3 class="titt">Caja activa id <?php echo $row['id'];?> </h3>
  <div class="col-sm-4">
    <div class="form-group"> 
      <select class="form-control" id="id_usuario"><option value="<?php echo $id_user;?>"><?php echo $usr;?></option></select>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" id="importe_cerrar" name="importe_c" placeholder="Importe Final">
    </div>
    <p>
      <button type="button" id="cerrar_caja" class="btn btn-outline-danger">Cerrar caja</button></div>
    </p>
    </div>
  <?php
    
    }
} else {
  ?>

  <div class="alert alert-success"><h3 class="titt">No hay cajas activas </h3>
  <div class="col-sm-4">
    <div class="form-group"> 
      <select class="form-control" id="id_usuario"><option value="<?php echo $id_user;?>"><?php echo $usr;?></option></select>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" id="importe_abierto" name="importe_a" placeholder="Importe inicial">
    </div>
    <p>
      <button type="button" id="abrir_caja" class="btn btn-outline-danger">Abrir caja</button></div>
    </p>
    </div>
  <?php
}
mysqli_close($conn);
?>
