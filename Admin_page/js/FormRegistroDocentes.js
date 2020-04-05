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
      url: '/DEDEV/Admin/cRegistroDocentes/RegistrarDocente',
      type: 'POST',
      data: $(this).serialize(),
      success: function (data) {
        $("#CodGroup > input").removeClass('is-invalid');
        $("#NombreGroup > input").removeClass('is-invalid');
        $("#ApellidoGroup > input").removeClass('is-invalid');
        $("#PassGroup > input").removeClass('is-invalid');

        $("#CodGroup > input").addClass('is-valid');
        $("#NombreGroup > input").addClass('is-valid');
        $("#ApellidoGroup > input").addClass('is-valid');
        $("#PassGroup > input").addClass('is-valid');
        var json = JSON.parse(data);
        window.location.replace(json.url);
        //console.log(data);
      },
      statusCode: {
        500: function (xhr) {
          $("#Codigo").removeClass('is-invalid');
          $("#Nombre").removeClass('is-invalid');
          $("#Apellido").removeClass('is-invalid');
          $("#password").removeClass('is-invalid');
          $(self).prepend('<div class="container-sm"><div class="alert alert-danger alert-dismissible fade show" role="alert">'
            + '<strong>¡ERROR! El Docente ya existe  o código de Docente inválido</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">'
            + '<span aria-hidden="true">&times;</span></button></div></div>');
        },
        400: function (xhr) {
          $("#Codigo").removeClass('is-invalid');
          $("#Nombre").removeClass('is-invalid');
          $("#Apellido").removeClass('is-invalid');
          $("#password").removeClass('is-invalid');

          var json = JSON.parse(xhr.responseText);
          if (json.Codigo.length != 0) {
            $("#CodGroup > div").html(json.Codigo);
            $("#CodGroup > input").addClass('is-invalid');
          } else {
            $("#CodGroup > input").addClass('is-valid');
          }

          if (json.Nombre.length != 0) {
            $("#NombreGroup > div").html(json.Nombre);
            $("#NombreGroup > input").addClass('is-invalid');
          } else {
            $("#NombreGroup > input").addClass('is-valid');
          }

          if (json.Apellido.length != 0) {
            $("#ApellidoGroup > div").html(json.Apellido);
            $("#ApellidoGroup > input").addClass('is-invalid');
          } else {
            $("#ApellidoGroup > input").addClass('is-valid');
          }

          if (json.password.length != 0) {
            $("#invalido").html(json.password);
            $("#PassGroup > input").addClass('is-invalid');
          } else {
            $("#PassGroup > input").addClass('is-valid');
          }

        }
      }
    });
  });

})(jQuery);