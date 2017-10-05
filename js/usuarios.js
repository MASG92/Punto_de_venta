$( document ).ready(function() {
//agregar
$("#nlnuevo").click(function() {
      var reg_usuario = "usuario";
      var nuevo_usuario=$('#nluser').val();
      var nuevo_usuario_pwd=$('#nlpwd').val();
      var nuevo_usuario_rol=$('#nlrol').val();
      var data = {
            'registro_usuario':reg_usuario,
            'usuario':nuevo_usuario,
            'password':nuevo_usuario_pwd,
            'rol_usuario':nuevo_usuario_rol
      };
      $.ajax({
            type: "POST",
            url: '../core/usuarios.php',
            data: data,
            processData: true,
            complete: function(xhr) {
                  var msg = xhr.responseText;
                  $('#resp').html(msg);
                  setTimeout(function(){ location.reload(); }, 1000);
            }
      });
});
$("#borrar_usuario").click(function() {
      var borrar_usuario = "borrar_usuario";
      var id_borrar_usuario=$('#id_user').val();
    
      var data = {
            'borrar_usuario':borrar_usuario,
            'id_borrar':id_borrar_usuario
      };
      $.ajax({
            type: "POST",
            url: '../core/usuarios.php',
            data: data,
            processData: true,
            complete: function(xhr) {
                  var msg = xhr.responseText;
                  $('#resp').html(msg);
                  setTimeout(function(){ window.close(); }, 1000);
            }
      });
});

$("#modificar_usuario").click(function() {

      var modificar_usuario = "modificar_user";
      var id_modificar_usuario = $('#id_user').val();
      var password_viejo = $('#modpwdv').val();
      var password_nuevo = $('#modpwdn').val();
      var rol_nuevo = $('#modroln').val();
      var data = {
            'modificar':modificar_usuario,
            'id_modificar':id_modificar_usuario,
            'password_nuevo':password_nuevo,
            'password_viejo':password_viejo,
            'rol':rol_nuevo
      };
      $.ajax({
            type: "POST",
            url: 'usuarios.php',
            data: data,
            processData: true,

            complete: function(xhr) {
                  var msg = xhr.responseText;
                  $('#resp').html(msg);
                  
                  setTimeout(function(){ window.close(); }, 1000);
            }
      });
});


});