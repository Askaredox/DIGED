$(document).ready(function (ev) {
    var tema = $("#TTema").val();
    var curso = $("#TCurso").val();
    var self = this;
    $.ajax({
        type: "POST",
        url: base_url + 'Docente/Docente_home/getTema',
        data: { idTema: tema, idCurso: curso },
        success: function (response) {

            var jsonData = JSON.parse(response);

            if (jsonData.Nombre_T.length != 0) {
                document.getElementById('Nombre_T').placeholder = jsonData.Nombre_T;
                // $("#Nombre_T").val(jsonData.Nombre_T);
                if (jsonData.Imagen) {
                    $("#Img_V").attr("src", base_url + jsonData.Imagen);
                    //console.log($("#Img_V").width);
                }
                else {
                    $("#Img_V").attr("title", "NO IMAGE");
                    $("#Img_V").attr("alt", "NO IMAGE");
                }
            } else {
                $("#notificacion").html('<div class="container-sm">' +
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>¡ERROR! EL TEMA NO EXISTE</strong>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            }
        },
        statusCode: {
            400: function (xhr) {
                var json = JSON.parse(xhr.responseText);
                $("#notificacion").html('<div class="container-sm">' +
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>¡ERROR! EL TEMA NO EXISTE</strong>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            }
        }
    });
});
$("#UpdateForm").submit(function (ev) {
    console.log("entraste a EDICION de tema")
    ev.preventDefault();
    var self = this;
    var form_data = new FormData();

    var nom = document.getElementById("Nombre_T");
    if (nom.value.length == 0 || /^\s+$/.test(nom.value)) {
        $Nombre = $("#Nombre_T").attr('placeholder');
    } else {
        $Nombre = $("#Nombre_T").val();
    }
    form_data.append("Nombre_T", $Nombre)
    var img = $("#image")[0].files[0]
    form_data.append("image", img)
    form_data.append("Curso", $("#Curso")[0].value)
    form_data.append("Tema", $("#Tema")[0].value)
    var urll = img ? 'Temas/UpdateImage' : 'Temas/UpdateTema'
    console.log(urll)
    $.ajax({
        // var data = 

        url: base_url + urll,
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function (data) {
            // alert(data)
            $(".req").removeClass('text-muted');
            $(".req").removeClass('text-danger');
            $(".req").addClass('text-success');
            $("#GroupImg > input").addClass('is-valid');

            var json = JSON.parse(data);
            window.location.replace(json.url);


        },
        statusCode: {
            400: function (xhr) {
                var json = JSON.parse(xhr.responseText);
                //alert(json.errorI);

                if (json.errorI.length != 0) {
                    $("#notificacion").html('<div class="container-sm">' +
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '<strong>¡ERROR! VERIFIQUE LOS REQUISITOS DE LA IMAGEN A SUBIR</strong>' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>' +
                        '</div>');
                    $(".req").removeClass('text-muted');
                    $(".req").addClass('text-danger');
                    $("#GroupImg > input").addClass('is-invalid');


                }
            },
            500: function (xhr) {
                $("#notificacion").html('<div class="container-sm">' +
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>¡ERROR! HUBO UN ERROR AL EDITAR EL TEMA</strong>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            }
        }
    });

});