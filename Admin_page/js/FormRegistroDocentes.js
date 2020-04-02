function MostrarContrasenia() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function GenerarCotraseña() {
  $fuente = "ABCDEFG#HIJKLMNOPQ#RSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#";
  $clave = "";
  for ($i = 0; $i < 10; $i++) {
    $num = Math.random() * (66 - 0) + 0;
    $clave += $fuente.substring($num, $num + 1);
  }
  $('#password').val($clave);
}

(function ($) {//EDITAR CURSO

  // ACTUALIZAR EL CURSO 
  $("#registerForm").submit(function (ev) {// validar el formulario  para editar el cursito
    ev.preventDefault();
    var self = this;
    $.ajax({
      url: '/DIGED/cRegistroDocentes/RegistrarDocente',
      type: 'POST',
      data: $(this).serialize(),
      success: function (data) {
        var json = JSON.parse(data);
        window.location.replace(json.url);
        //console.log(data);
      },
      statusCode: {
        500: function (xhr) {
          $(self).prepend('<div class="container-sm"><div class="alert alert-danger alert-dismissible fade show" role="alert">'
            + '<strong>¡ERROR! El Docente ya existe  o código de Docente inválido</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">'
            + '<span aria-hidden="true">&times;</span></button></div></div>');
        },
      }
    });
  });

})(jQuery);