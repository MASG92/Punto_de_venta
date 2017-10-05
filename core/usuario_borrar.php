<?php
require("../server/session.php");
if (!isset($usr)) {
    header('location: ../index.php');
}else{
    if ($rol == 'USER') {
        header('location: ../core/server.php');
    }
}
?>
<?php
$id = $_GET['id'];
$url = "../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$sql = "SELECT * FROM tbl_usuarios WHERE id ='$id' AND estatus = 'active'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
      $usuario = $row['usuario'];
    }
    
} else {
    
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SYSMASG</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class = "row">
          <div class="col-12">
            <input type="hidden" id="id_user" value="<?php echo $id?>">
              <br>
              <div class="alert alert-danger"><h2>Desea borrar (<?php echo $usuario;?>)?</h2></div>


              <button type="button" onclick="window.opener.location.reload();" id="borrar_usuario" class="btn btn-outline-warning btn-lg btn-block"> Si</button >
              <button type="button" onclick="window.opener.location.reload(); window.close()" id="no" class="btn btn-outline-info btn-lg btn-block"> No</button >
              <br>
              <div id = "msg"></div>
          </div>
          <div class="col-12">
            <div id="tabla"></div>
        </div>
    </div>

</div>
<script src="../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/usuarios.js"></script>
</body>
</html>