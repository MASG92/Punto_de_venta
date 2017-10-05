<table class="table"  id="proveedores">
      <thead   style="background-color: #563d7c!important; color: white;">
        <th>
          #
        </th>
        <th>Producto</th>
        <th>Precio Prov.</th>
        <th>Precio Venta</th>
        <th>Proveedor</th>
        <th>Contacto</th>
      </thead>
      <tbody>
<?php
$url = "../../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$i = 0;
$sql = "SELECT tbl_proveedores.id, tbl_proveedores.proveedor, tbl_proveedores.contacto, tbl_producto.producto, tbl_producto.precio_proveedor, tbl_producto.precio_venta FROM tbl_proveedores 
  RIGHT JOIN tbl_producto ON tbl_proveedores.id = tbl_producto.id_proveedor";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
    while($row = mysqli_fetch_assoc($result)) {
   
        ?>
        	<tr style="color: #563d7c;">
            <td><?php echo $i=$i+1;?></td>
            <td><?php echo $row['producto']?></td>
            <td><?php echo $row['precio_proveedor']?></td>
            <td><?php echo $row['precio_venta']?></td>
        		<td><?php echo $row['proveedor']?></td>
            <td><?php echo $row['contacto']?></td>
        	</tr>
        <?php
    }
} else {
}
mysqli_close($conn);
?>
  </tbody>
    </table>
    <script type="text/javascript">
  $(document).ready(function(){


    $('#proveedores').DataTable({
       
    
          "iDisplayLength": 5,
          //"order": [[ 2, "ASC" ]], //el valor numerico es la columna (0 a... n) 
          "language": {

             "lengthMenu": 'Mostrar <select>'+
             '<option value="5">5</option>'+
                  '<option value="10">10</option>'+
                  '<option value="20">20</option>'+
                  '<option value="30">30</option>'+
                  '<option value="40">40</option>'+
                  '<option value="50">50</option>'+
                  '<option value="-1">All</option>'+
                  '</select> Registros',
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrada de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
              "next":       "Siguiente",
              "previous":   "Anterior"
            },

          }

           
        });
});
  </script>