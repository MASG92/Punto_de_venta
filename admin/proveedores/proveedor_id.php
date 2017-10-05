<select class="form-control" id="id_proveedor">
	<?php
	$url = "../server/config.php";
	require_once($url);
	$conn = @mysqli_connect($servername, $username, $password, $bd)
	or die("Connection failed: " . mysqli_connect_error());


	$proveedor_id = "SELECT id, proveedor, contacto FROM tbl_proveedores WHERE estatus = 'active'";
	$resultado = mysqli_query($conn, $proveedor_id);

	if (mysqli_num_rows($resultado) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($resultado)) {
			?>
			<option value="<?php echo $row['id']?>"><?php echo $row['proveedor']?> - <?php echo $row['contacto']?></option>
			<?php
		}
	} else {
		?>
		<option value="0">Proveedor</option>
		<?php  
	}

	mysqli_close($conn);
	?>
</select>