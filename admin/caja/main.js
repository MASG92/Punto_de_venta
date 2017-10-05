$( document ).ready(function() {
//registrar
 //$("#caja_activa").load('caja/caja.php');
 $("#abrir_caja").click(function() {
	
		var abrir_caja = 'abrir';
		var id_usuario = $('#id_usuario').val();
		var importe_abierto = $('#importe_abierto').val();
		
		var data = {
			'abrir_caja':abrir_caja,
			'importe_abierto':importe_abierto,
			'id_usuario':id_usuario
		}
		$.ajax({
            type: "POST",
            url: 'caja/core.php',
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