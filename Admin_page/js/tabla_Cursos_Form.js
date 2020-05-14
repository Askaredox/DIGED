// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
});

//para obtenere el valor de las filas seleccionadas de la tabla
$('#dataTable tr').on('click', function () {
    var datoU = $(this).find('td:nth-child(1)').html();
    var datoD = $(this).find('td:nth-child(2)').html();
    // para actualizar o editar 
    document.getElementById('curso').placeholder = datoU;
    document.getElementById('docente').placeholder = datoD;
    //para eliminar el curso
    $('#CursoEliminar').val(datoU);
    $('#DocentedeEliminar').val(datoD);
});




//si no desea modificar nada 

(function ($) {//EDITAR CURSO
    $(".btn-primary").click(function (ev) {
        $("#selectorProfesor").html('<option value="" disabled selected>Seleccione un profesor</option>');
        $valor = $(this).attr('data-id');
        $("#TEMPcurso").val($valor);// codigo del curso a editar
        $valor = $(this).attr('data-docente');
        $("#TEMPdocenteNuevo").val($valor);// codigo del docente nuevo o no
        $.ajax({
            url: '/DEDEV/Admin/Admin_home/MostrarProfesores',
            type: 'GET',
            data: '',
            success: function (data) {
                var json = JSON.parse(data);
                $.each(json, function (i, item) {
                    $("#selectorProfesor").append('<option value="' + item.Id_Usuario + '">' + item.Nombre + ' ' + item.Apellido + '</option>');
                });
                //$('#collapseExample').collapse('show');
                $('#EditarModal').modal();
            },
            statusCode: {
                400: function (xhr) {
                },
                401: function (xhr) {
                }
            }
        });
    });
    // ACTUALIZAR EL CURSO 
    $("#UpdateForm").submit(function (ev) {// validar el formulario  para editar el cursito
        ev.preventDefault();
        var self = this;


        $codigo = $("#TEMPcurso").val();
        $docente = $("#TEMPdocenteNuevo").val();

        var x1 = document.getElementById("curso");
        if (x1.value.length == 0 || /^\s+$/.test(x1.value)) {
            $nombreCurso = $("#curso").attr('placeholder');
        } else {
            $nombreCurso = $("#curso").val();
        }
        $datos = {
            'Cod_Curso': $codigo,
            'Docente': $docente,
            'Nombre': $nombreCurso
        }
        $.ajax({
            url: '/DEDEV/Admin/cTablaCursos/Editar',
            type: 'POST',
            data: $datos,
            success: function (data) {
                var json = JSON.parse(data);
                window.location.replace(json.url);
                //console.log(data);
            },
            statusCode: {
                400: function (xhr) {
                    var json = JSON.parse(xhr.responseText);
                    console.log('aqui'.json);
                    $(self).prepend('<div class="container-sm"><div class="alert alert-danger alert-dismissible fade show" role="alert">'
                        + '<strong>' + json.msge + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        + '<span aria-hidden="true">&times;</span></button></div></div>');
                },
            }
        });
    });

    $("#ButtonConfirm").click(function (ev) {
        $Id_Curso = $(this).attr('data-id');
        $.ajax({
            url: '/DEDEV/Admin/cTablaCursos/Eliminar',
            type: 'POST',
            data: { 'Id_Curso': $Id_Curso },
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


$(".btn-eliminar").click(function (ev) {
    $('#EliminarModal').modal();
    $("#ButtonConfirm").attr("data-id", $(this).attr('data-id'));
});

$('#cancel').click(function () {
    $('#collapseExample').collapse('hide');
    var myNewURL = "/DEDEV/Administrar/Cursos";//the new URL
    window.location.replace(myNewURL);
    $("#TEMPcurso").val("");
    $("#TEMPdocenteNuevo").val("");

});

function MostrarSeleccion() {
    /* Para obtener el texto de la opcion seleccionada */
    var combo = document.getElementById("selectorProfesor");
    var selected = combo.options[combo.selectedIndex].text;
    $('#docente').val(selected);
    var selected = combo.value;
    $("#TEMPdocenteNuevo").val(selected);
}