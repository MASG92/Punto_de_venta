<table class="table"  id="proveedores">
      <thead   style="background-color: #563d7c!important; color: white;">
        <th>Producto</th>
        <th>Precio Venta</th>
        <th>Cantidad</th>
        <th></th>
      </thead>
      <tbody>
<?php
$url = "../../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$producto = $_POST['q'];
$sql = "SELECT * FROM tbl_producto WHERE producto LIKE '%$producto%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        	<tr style="color: #563d7c;">
            <td><?php echo $row['producto']?></td>
            <td><?php echo $row['precio_venta']?></td>
        		<td><input type="number" id="cantidad_venta" value="1"></td>
           <td><button type="button" class="btn btn-success" id='producto_agregar'>Agregar</button></td>
        	</tr>
        <?php
    }
} else {
}
mysqli_close($conn);
?>
  </tbody>
    </table>