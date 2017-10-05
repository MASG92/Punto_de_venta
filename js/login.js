 $(document).ready(function(){
        //ajax
      //log
      $("#log").click(function() {
        var usuario = $('#luser').val();
        var password = $('#lpwd').val();
        var data = {
          'usr':usuario,
          'pwd':password
      };
      $.ajax({
        type: "POST",
        url: 'core/validate.php',
        data: data,
        processData: true,
        complete: function(xhr) {
          var msg = xhr.responseText;
          $('#msg').html(msg);
          setTimeout(function(){ location.reload(); }, 2000);
      }
  });
  });   
  });