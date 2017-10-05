$( document ).ready(function() {
//registrar
 $("#prod").load('productos/listar.php');
	$("#nuevo_producto").click(function() {
	
		var validar_producto = 'validado';
		var producto = $('#producto').val();
		var descripcion = $('#descripcion').val();
		var precio_p = $('#precio_prov').val();
		var precio_v = $('#precio_venta').val();
		var id_proveedor = $('#id_proveedor').val();
		
		var data = {
			'validar_producto':validar_producto,
			'id_proveedor':id_proveedor,
			'producto':producto,
			'descripcion':descripcion,
			'precio_prov':precio_p,
			'precio_ven':precio_v
		}
		$.ajax({
            type: "POST",
            url: 'productos/core.php',
            data: data,
            processData: true,
            complete: function(xhr) {
                  var msg = xhr.responseText;
                  $('#resp').html(msg);
                  setTimeout(function(){ location.reload(); }, 1000);
            }
      });
	});
});
