$( document ).ready(function() {
//registrar
 //$("#caja_activa").load('caja/caja.php');
 $("#nota_venta").click(function() {
	
		var nota_venta = 'vender';
		var id_usuario = $('#id_usuario').val();
		var id_caja = $('#id_caja').val();
		
		var data = {
			'nota_venta':nota_venta,
			'id_caja':id_caja,
			'id_usuario':id_usuario
		}
		$.ajax({
            type: "POST",
            url: 'tickets/core.php',
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