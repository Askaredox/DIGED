(function ($) {
    $("#UpdatePassword").submit(function (ev) {
        ev.preventDefault();
        var self = this;
        $.ajax({
            url: 'Docente/Docente_home/changePassword',
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
    $("#RegisterTema").submit(function (ev) {
        ev.preventDefault();
        var self = this;
        var formData = new FormData($("#RegisterTema")[0]);
        $("#GroupImg > div").html("");
        $.ajax({
            // var data = 

            url: base_url + 'Docente/Docente_home/SubirImagen',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#GroupName > input").removeClass('is-invalid');
                $("#GroupImg > input").removeClass('is-invalid');
                $("#GroupName > input").addClass('is-valid');
                $("#GroupImg > input").addClass('is-valid');
                var json = JSON.parse(data);
                window.location.replace(json.url);
                // console.log(json);
            },
            statusCode: {
                400: function (xhr) {

                    $("#GroupName > input").removeClass('is-invalid');
                    $("#GroupImg > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.Nombre_T.length != 0) {
                        $("#GroupName > div").html(json.Nombre_T);
                        $("#GroupName > input").addClass('is-invalid');
                    } else {
                        $("#GroupName > input").addClass('is-valid');
                    }

                    if (json.errorI.length != 0) {
                        $("#GroupImg > div").html(json.errorI);
                        $("#GroupImg > input").addClass('is-invalid');
                    } else {
                        $("#GroupImg > div").html("");
                    }

                },
                500: function (xhr) {
                    $("#notificacion").html('<div class="container-sm">' +
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '<strong>¡ERROR! HUBO UN ERROR AL CREAR EL TEMA</strong>' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>' +
                        '</div>');
                }
            }
        });
    });
})(jQuery)
