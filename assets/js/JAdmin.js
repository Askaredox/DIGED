(function ($) {
    $("#UpdatePassword").submit(function (ev) {
        ev.preventDefault();
        var self = this;
        $.ajax({
            url: 'Admin_home/changePassword',
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                $("#Pw1 > input").removeClass('is-invalid');
                $("#Pw2 > input").removeClass('is-invalid');
                $("#Pw1 > input").addClass('is-valid');
                $("#Pw2 > input").addClass('is-valid');
                var json = JSON.parse(data);
                window.location.replace(json.url);
                //console.log(data);
            },
            statusCode: {
                400: function (xhr) {

                    $("#Pw1 > input").removeClass('is-invalid');
                    $("#Pw2 > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.P1.length != 0) {
                        $("#Pw1 > div").html(json.P1);
                        $("#Pw1 > input").addClass('is-invalid');
                    }
                    if (json.P2.length != 0) {
                        $("#Pw2 > div").html(json.P2);
                        $("#Pw2 > input").addClass('is-invalid');
                    }
                }
            }
        });
    });
    $("#CrearCursos").click(function (ev) {// este es para el modal para que abra y cargue los nombres de los profes al inicio
        $("#selectDocente").html('<option value="" disabled selected>Seleccione un profesor</option>');
        $.ajax({
            url: 'Admin_home/MostrarProfesores',
            type: 'GET',
            data: '',
            success: function (data) {

                var json = JSON.parse(data);
                $.each(json, function (i, item) {
                    $("#selectDocente").append('<option value="' + item.Id_Usuario + '">' + item.Nombre + ' ' + item.Apellido + '</option>');
                });
                $('#portfolioModal1').modal();
            },
            statusCode: {
                400: function (xhr) {
                },
                401: function (xhr) {
                }
            }
        });
    });
    $("#registerForm").submit(function (ev) {// validar el formulario para registrar el nuevo cursito
        ev.preventDefault();
        var self = this;
        $.ajax({
            url: 'Admin_home/RegistrarCurso',
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                $("#GroupCurso > input").removeClass('is-invalid');
                $("#GroupDocente > select").removeClass('is-invalid');
                $("#GroupCurso > input").removeClass('is-valid');
                $("#GroupDocente > select").removeClass('is-valid');
                var json = JSON.parse(data);
                window.location.replace(json.url);
                //console.log(data);
            },
            statusCode: {
                400: function (xhr) {

                    $("#GroupCurso > input").removeClass('is-invalid');
                    $("#GroupDocente > select").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.Curso.length != 0) {
                        $("#GroupCurso > div").html(json.Curso);
                        $("#GroupCurso > input").addClass('is-invalid');
                    }
                    if (json.Docente.length != 0) {
                        $("#GroupDocente > div").html(json.Docente);
                        $("#GroupDocente > select").addClass('is-invalid');
                    }
                },
                500: function (xhr) {
                   // 
                   var json = JSON.parse(xhr.responseText);
                    $(self).prepend('<div class="container-sm"><div class="alert alert-danger alert-dismissible fade show" role="alert">'
                    +'<strong>'+json.msge+'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    +'<span aria-hidden="true">&times;</span></button></div></div>');
                   // window.location.replace('Administracion');
                }
            }
        });
    });
})(jQuery)
