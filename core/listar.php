<table class="table"  id="nombres">
      <thead   style="background-color: #563d7c!important; color: white;">
        <th>
          #
        </th>
        <th>
          Nombre
        </th>
        <th>
          Rol
        </th>
        <th>
          Fecha de registro
        </th>
        <th>
          Hora de registro
        </th>
        <th> 
          
        </th>
        <th>
          
        </th>
      
      </thead>
      <tbody>
<?php
$url = "../server/config.php";
require_once($url);
$conn = @mysqli_connect($servername, $username, $password, $bd)
or die("Connection failed: " . mysqli_connect_error());
$i = 0;
$sql = "SELECT * FROM tbl_usuarios WHERE estatus = 'active'";
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
        	<tr style="color: #563d7c;">
            <td><?php echo $i=$i+1;?></td>
        		<td><?php echo $row['usuario'];?></td>
        		<td><?php echo $rol;?></td>
            <td><?php echo $row['fecha_registro'];?></td>
            <td><?php echo $row['hora_registro'];?></td>
            <td><a style="color: orange;" href="mod_user.php?id=<?php echo $row['id'];?>" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=400,resizable=no,left=400,top=200,screenX=400,screenY=200'); return false;window.focus();""><i class="material-icons">border_color</i> Modificar</a></td>
            <td><a  style="color: red;" href="usuario_borrar.php?id=<?php echo $row['id'];?>" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=400,resizable=no,left=400,top=200,screenX=400,screenY=200'); return false;window.focus();"><i class="material-icons">delete_forever</i> Eliminar</a></td>
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


    $('#nombres').DataTable({
       
    
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