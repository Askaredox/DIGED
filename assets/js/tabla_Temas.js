// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
});

//para obtenere el valor de las filas seleccionadas de la tabla
$('#dataTable tr').on('click', function () {
    var datoU = $(this).find('td:nth-child(1)').html();
    var datoD = $(this).find('td:nth-child(2)').html();
    // para actualizar o editar 
    document.getElementById('Nombre_T').placeholder = datoU;
    document.getElementById('Img').placeholder = datoD;

    $('#GroupImg').html("");
    if (datoD.length > 0) {
        $('#GroupImg').append('<img id="imgenn" src="' + base_url + datoD + '"style="width: 400px; height: 400px;" >');
        var boton = document.getElementById('EliminarImg');
        boton.disabled = false
    }
    //para eliminar el curso
    $('#TemaEliminar').val(datoU);
});

$(".btn-eliminar").click(function (ev) {
    $('#EliminarModal').modal();
    $("#ButtonConfirm").attr("data-id", $(this).attr('data-id'));
    $("#ButtonConfirm").attr("data-curso", $(this).attr('data-curso'));
});

$('#cancel').click(function () {
    $('#collapseExample').collapse('hide');
    var myNewURL = base_url + "Temas/Administrar/" + $(this).attr('data-curso');//the new URL
    window.location.replace(myNewURL);
});


$(".btn-primary").click(function (ev) {

    $valor = $(this).attr('data-curso');
    $("#TEMPcurso").val($valor);// codigo del curso al que pertenece el tema a editar
    $valor = $(this).attr('data-id');
    $("#TEMPTema").val($valor);// codigo del tema a editar
    $('#collapseExample').collapse('show');
    $('#cancel').attr("data-curso", $(this).attr('data-curso'));

});

$(".btn-primary").click(function (ev) {

    $valor = $(this).attr('data-curso');
    $("#TEMPcurso").val($valor);// codigo del curso al que pertenece el tema a editar
    $valor = $(this).attr('data-id');
    $("#TEMPTema").val($valor);// codigo del tema a editar
    $('#collapseExample').collapse('show');
    $('#cancel').attr("data-curso", $(this).attr('data-curso'));

});


(function ($) {//EDITAR CURSO
    $('#SubirImg').click(function (ev) {
        ev.preventDefault();
        var self = this;
        $ant = $("#Nombre_T").val();

        $Nombre_T = $("#Nombre_T").attr('placeholder');
        $("#Nombre_T").val($Nombre_T);
        var formData = new FormData($("#UpdateForm")[0]);
        $("#Nombre_T").val($ant);
        $("#GroupNotificacionSubida").html("");
        $.ajax({
            url: base_url + 'Temas/UpdateImage',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#GroupNotificacionSubida").removeClass('text-danger');
                $("#GroupNotificacionSubida").html("");

                var json = JSON.parse(data);

                if (json.msg.length != 0) {
                    $("#GroupNotificacionSubida").addClass('text-success');
                    $("#GroupNotificacionSubida").html(json.msg);

                    if (json.ruta.length != 0) {
                        $placeholder = $("#Img").attr('placeholder');
                        if ($placeholder.length == 0 || /^\s+$/.test($placeholder)) {
                            //crear imagen
                            $('#GroupImg').append('<img id="imgenn" src="' + base_url + json.ruta + '"style="width: 400px; height: 400px;" >');

                        } else {//solo modificar src
                            $("#imgenn").attr("src", base_url + json.ruta);
                        }
                        var boton = document.getElementById('EliminarImg');
                        boton.disabled = false
                        $("#Img").attr("placeholder", json.ruta);
                    }
                }

                if (json.url.length != 0) {
                    window.location.replace(json.url);
                }
            },
            statusCode: {
                400: function (xhr) {

                    $("#GroupNotificacionSubida").removeClass('text-danger');
                    $("#GroupNotificacionSubida").html("");
                    var json = JSON.parse(xhr.responseText);

                    if (json.errorI.length != 0) {
                        $("#GroupNotificacionSubida").addClass('text-danger');
                        $("#GroupNotificacionSubida").html(json.errorI);
                    }

                },
            }
        });
    });

    $('#EliminarImg').click(function (ev) {// eliminar imagen
        ev.preventDefault();
        var self = this;

        $ant = $("#Nombre_T").val();

        $Nombre_T = $("#Nombre_T").attr('placeholder');
        $("#Nombre_T").val($Nombre_T);
        var formData = new FormData($("#UpdateForm")[0]);
        $("#Nombre_T").val($ant);

        $("#GroupNotificacionSubida").html("");
        $.ajax({
            url: base_url + 'Temas/DeleteImage',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#GroupNotificacionSubida").removeClass('text-danger');
                $("#GroupNotificacionSubida").html("");

                var json = JSON.parse(data);

                if (json.msg.length != 0) {
                    $("#GroupNotificacionSubida").addClass('text-success');
                    $("#GroupNotificacionSubida").html(json.msg);
                    $('#GroupImg').html("");
                    $("#Img").attr("placeholder", '');
                    var boton = document.getElementById('EliminarImg');
                    boton.disabled = false
                }

                if (json.url.length != 0) {
                    window.location.replace(json.url);
                }
            },
            statusCode: {
                400: function (xhr) {

                    $("#GroupNotificacionSubida").removeClass('text-danger');
                    $("#GroupNotificacionSubida").html("");
                    var json = JSON.parse(xhr.responseText);

                    if (json.errorI.length != 0) {
                        $("#GroupNotificacionSubida").addClass('text-danger');
                        $("#GroupNotificacionSubida").html(json.errorI);
                    }

                },
            }
        });
    });

    $('#UpdateForm').submit(function (ev) {// actualizar tema
        ev.preventDefault();
        var self = this;
        $Curso = $("#TEMPcurso").val();
        $Cod_Tema = $("#TEMPTema").val();

        //NOMBRE
        var nom = document.getElementById("Nombre_T");
        if (nom.value.length == 0 || /^\s+$/.test(nom.value)) {
            window.location.replace(base_url + 'Temas/Administrar/' + $Curso);
        } else {
            $Nombre_T = $("#Nombre_T").val();
        }

        $datos = {
            'Cod_Tema': $Cod_Tema,
            'Nombre_T': $Nombre_T,//nuevo nombre
            'Curso': $Curso
        }

        $("#GroupNotificacionSubida").html("");
        $.ajax({
            url: base_url + 'Temas/UpdateTema',
            type: 'POST',
            data: $datos,
            success: function (data) {
                $("#GroupNotificacionSubida").removeClass('text-danger');
                $("#GroupNotificacionSubida").html("");

                var json = JSON.parse(data);

                if (json.url.length != 0) {
                    window.location.replace(json.url);
                }
            },
            statusCode: {
                400: function (xhr) {
                },
            }
        });
    });
    $("#ButtonConfirm").click(function (ev) { //eliminar tema
        $Cod_Tema = $(this).attr('data-id');
        $Curso = $(this).attr('data-curso');
        $.ajax({
            url: base_url + 'Temas/DeleteTema',
            type: 'POST',
            data: { 'Cod_Tema': $Cod_Tema, 'Curso': $Curso },
            success: function (data) {
                var json = JSON.parse(data);
                window.location.replace(json.url);
            },
            statusCode: {
                400: function (xhr) {
                },
                401: function (xhr) {
                }
            }
        })
    });
})(jQuery);

//boton para ver los titulos y crearlos