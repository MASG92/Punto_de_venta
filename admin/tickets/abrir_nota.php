


<?php
$url = "../server/config.php";
require_once($url);
require_once('caja/id_caja.php');
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$i = 0;
$sql = "SELECT * FROM tbl_ticket WHERE estatus = 'venta'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
    while($row = mysqli_fetch_assoc($result)) {
    ?>

  <div class="alert alert-info"><h3 class="titt">Nota# <?php echo $row['id'];?> </h3>
    <div class="row">
  <div class="col-sm-4">
    <div class="form-group"> 
      <select class="form-control" id="id_usuario"><option value="<?php echo $id_user;?>"><?php echo $usr;?></option></select>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" id="importe" name="importe" placeholder="Total">
    </div>
    <p>
      <button type="button" id="nota_cobrar" class="btn btn-outline-danger">Cobrar</button>

    </p>
    </div>
    <div class="col-sm-8">
      
      <input type="text" class="form-control"  id="producto_buscar" name="producto_buscar" onblur="" onkeyup="loadXMLDoc()" placeholder="Buscar producto" autofocus>
      <div id="tab">
        
      </div>
    </div>
  </div>
  </div>
  <?php
    
    }
} else {
  ?>

  <div class="alert alert-success"><h3 class="titt">Abrir Nota de Venta </h3>
  <div class="col-sm-4">
    <div class="form-group"> 
      <select class="form-control" id="id_usuario"><option value="<?php echo $id_user;?>"><?php echo $usr;?></option></select>
    </div>
    <div class="form-group"> 
      <select class="form-control" id="id_caja"><option value="<?php echo $id_caja;?>"><?php echo $id_caja;?></option></select>
    </div>
    
    <p>
      <button type="button" id="nota_venta" class="btn btn-outline-danger">Vender</button>
    </p>
    </div>
 </div>   
  <?php
}
mysqli_close($conn);
?>