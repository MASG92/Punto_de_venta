$(document).ready(function(){
  $("#tabla").load('scripts/listar_nombres.php');
      //agregar
      $("#agregar").click(function() {
        var agregar = "nombre";
        var nombre = $('#nom').val();
        var dir = $('#dir').val();
        var tel = $('#tel').val();
        var email = $('#email').val();
        var data = {
          'agregar':agregar,
          'nombre':nombre,
          'direccion':dir,
          'telefono':tel,
          'email':email};
          $.ajax({
            type: "POST",
            url: 'scripts/nombres.php',
            data: data,
            processData: true,
            complete: function(xhr) {
              var msg = xhr.responseText;
              $('#resp').html(msg);
              setTimeout(function(){ location.reload(); }, 2000);
            }
          });
        });
      
      
    });