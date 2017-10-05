<?php
ob_start();
session_start(); 
require_once("../server/config.php");
$salt = '$MASG$/';
$user = $_POST['luser'];
$pwd = sha1(md5( $salt . $_POST["lpwd"]));
//
$user = "SELECT * FROM tbl_usuarios WHERE usuario = '$user'";
//connection string
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
//
$result = mysqli_query($conn, $user);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   $pwd_v = $row['password'];
   $rol = $row['rol'];
       //verify password
   if ($pwd_v == $pwd) {
     $_SESSION['usuario'] = $row['usuario'];
     $_SESSION['rol'] = $row['rol'];
     $_SESSION['id'] = $row['id'];
     if ($rol == 'ADMIN') {
    
      header("Location: ../admin/home.php");
    }elseif ($rol == 'USER') {
   
      header("Location: ../core/home.php");
    }
  } else{
        	//si no es lo redirigimos al index
    header("Location: ../index.php?error=771");
        	//echo "<div class='alert alert-danger'>Contraseña incorrecta</div>";

          //echo "Error: " . mysqli_error($conn);
  }
}
} else {
   // echo "<div class='alert alert-danger'>Usuario Incorrecto</div>";

  header("Location: ../index.php?error=777");
}
mysqli_free_result($result);
mysqli_close($conn);
ob_end_flush();
?>