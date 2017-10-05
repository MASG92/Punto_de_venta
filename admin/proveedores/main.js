$( document ).ready(function() {
//registrar
 $("#prov").load('proveedores/listar.php');
	$("#nuevo_proveedor").click(function() {
	
		var validar_proveedor = 'validado';
		var proveedor = $('#proveedor').val();
		var contacto = $('#contacto').val();
		var direccion = $('#direccion').val();
		var telefono = $('#telefono').val();
		var data = {
			'validar_proveedor':validar_proveedor,
			'nvo_proveedor': proveedor,
			'nvo_contacto':contacto,
			'nvo_direccion':direccion, 
			'nvo_telefono':telefono
		}
		$.ajax({
            type: "POST",
            url: 'proveedores/core.php',
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


