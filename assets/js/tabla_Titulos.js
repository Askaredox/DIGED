// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
    
});

//para obtenere el valor de las filas seleccionadas de la tabla
$('#dataTable tr').on('click', function () {
    var datoU = $(this).find('td:nth-child(1)').html();
    // para actualizar o editar 
   // document.getElementById('Nombre').placeholder = datoU;
    //para eliminar el titulo
    $('#TituloEliminar').val(datoU);
});

$(".btn-eliminar").click(function (ev) {
    $('#EliminarModal').modal();
    $("#ButtonConfirm").attr("data-id", $(this).attr('data-id'));
    $("#ButtonConfirm").attr("data-tema", $(this).attr('data-tema'));
    $("#ButtonConfirm").attr("data-curso", $(this).attr('data-curso'));
});

$('#cancel').click(function () {
    var myNewURL = base_url + "Titulo/Administrar/" + $(this).attr('data-curso') + '/' + $(this).attr('data-tema');//the new URL
    window.location.replace(myNewURL);
});

/*$(".btn-edit").click(function (ev) {

    $valor = $(this).attr('data-curso');
    $("#Curso").val($valor);// codigo del tema al que pertenece el titulo a editar
    $valor = $(this).attr('data-tema');
    $("#Tema").val($valor);// codigo del tema al que pertenece el titulo a editar
    $valor = $(this).attr('data-id');
    $("#Titulo").val($valor);// codigo del titulo a editar
    $valor = $(this).attr('data-pos');
    $("#pos").attr('placeholder', $valor);// posicion X del titulo a editar

    $valor = $(this).attr('data-tipo');
    $("#tipo").attr('placeholder', $valor);// posicion X del titulo a editar
    //$valor = $(this).attr('data-conte')
    $('#summernote').summernote('editor.pasteHTML', $datos);


    $('#cancel').attr("data-curso", $(this).attr('data-curso'));
    $('#cancel').attr("data-tema", $(this).attr('data-tema'));
});*/

//--------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------PARTE DE LA IMAGEN----------------------------------------------------------------------------------------------
function mostrarTitulo($titulo) {
    alert($titulo);
};

$("#cerrar").click(function (ev) {

    document.getElementById('circ').checked = 0;
    document.getElementById('Rect').checked = 0;
    document.getElementById('Poly').checked = 0;

    document.getElementById('circ').disabled = false;
    document.getElementById('Rect').disabled = false;
    document.getElementById('Poly').disabled = false;
    $('#FormCircular').collapse('hide');
});

$cont = 0;

if ($("#imagenTema").length) {
const imagenTema = document.getElementById('imagenTema');

imagenTema.addEventListener('click', function (e) {
    let ctx;
    $cont = $cont + 1;
    console.log($cont);
    if (!this.canvas) {
        this.canvas = document.createElement('canvas');
        this.canvas.width = this.width;
        this.canvas.height = this.height;
        ctx = this.canvas.getContext('2d');
        ctx.drawImage(this, 0, 0, this.width, this.height);
    } else {
        ctx = this.canvas.getContext('2d');
    }
    const pixel = ctx.getImageData(e.offsetX, e.offsetY, 1, 1).data;


    $x = e.offsetX;
    $y = e.offsetY;
    $title = $('#Nombre').val()
    // $(".anterior").remove();
    $(".prueba").remove();

    if (($('#circ').prop('checked') && $cont < 2) || ($('#Rect').prop('checked') && $cont < 3) || ($('#Poly').prop('checked') && $("#GEnlaceLibre").attr('data-estado') === "true")) {
        $("#mapeo").append('<area class="title anterior" id="titulo" title="' + $title + '" class="title" alt="" href="#" shape="circle" coords="' + $x + ',' + $y + ',10" onclick="mostrarTitulo(\'' + $title + '\')" data-maphilight=\'{"alwaysOn":true}\'>');
        $(".title").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');
    }


    if ($cont === 1 && $('#Rect').prop('checked')) {
        $("#EsqSuper").val($x + ',' + $y);
    } else if ($cont === 2 && $('#Rect').prop('checked')) {
        $("#EsqInf").val($x + ',' + $y);
    }

    if ($cont === 1 && $('#circ').prop('checked')) {
        $("#centrocirc").val($x + ',' + $y);
    }

    if ($("#GEnlaceLibre").attr('data-estado') === "true" && $('#Poly').prop('checked')) {
        if ($cont === 1) {
            $("#Esquinas").val($x + ',' + $y);
        } else {
            $val = $("#Esquinas").val();
            $("#Esquinas").val($val + ',' + $x + ',' + $y);
        }
    }
    console.log(e.offsetX);
    console.log(e.offsetY);

});
}
function Circular(checkbox) {

    $cont = 0;
    const chk2 = document.getElementById('Rect');
    const chk3 = document.getElementById('Poly');

    if (checkbox.checked) {
        chk2.disabled = true;
        chk3.disabled = true;

        $("#form2").html('<div class="row"><div class="col-4">' +
            '<label>Centro</label>' +
            ' <input class="form-control" id="centrocirc" name="centrocirc" type="text" readonly>' +
            '<div class="invalid-feedback"> <small id="fileHelp" class="text-danger ">Debe seleccionar un punto en la imagen</small>' +
            '</div>' +
            '</div>' +
            '<div class="col-3">' +
            '<label>Radio</label>' +
            '<input class="form-control is-invalid" id="radiocirc" name="radiocirc" type="text">' +
            ' <div class="invalid-feedback"> <small id="fileHelp" class="text-danger ">Debe ingresar el tamaño del circulo</small>' +
            '</div>' +
            '</div>' +
            '<div class="col-3">' +
            '<label>Generar</label>' +
            ' <button type="button" class="btn btn-success" id="GEnlaceCirc" onclick="GenerarCircleMap()">Generar Enlace</button>' +
            '</div></div>')
        $('#FormCircular').collapse('show');
    } else {
        $(".anterior").remove();
        $(".definitivo").remove();
        $("#form2").html("");
        $('#FormCircular').collapse('hide');
        chk2.disabled = false;
        chk3.disabled = false;
    }
};

function GenerarCircleMap() {
    const chk2 = document.getElementById('Rect');
    const chk3 = document.getElementById('Poly');

    var x1 = document.getElementById("radiocirc");
    var x2 = document.getElementById("centrocirc");

    if (x2.value.length == 0 || /^\s+$/.test(x2.value)) {

        $("#centrocirc").removeClass("is-valid");
        $("#centrocirc").addClass("is-invalid");
    } else {
        $("#centrocirc").removeClass("is-invalid");
        $("#centrocirc").addClass("is-valid");

        if (x1.value.length == 0 || /^\s+$/.test(x1.value)) {

            $("#radiocirc").removeClass("is-valid");
            $("#radiocirc").addClass("is-invalid");
        } else {
            $("#radiocirc").removeClass("is-invalid");
            $("#radiocirc").addClass("is-valid");

            $valor = x1.value;

            $(".anterior").remove();
            $(".definitivo").remove();

            $("#mapeo").append('<area class="title definitivo" id="titulo" title="" class="title" alt="" href="#" shape="circle" coords="' + $("#centrocirc").val() + ',' + $valor + '" onclick="mostrarTitulo(\'' + $title + '\')" data-maphilight=\'{"alwaysOn":true}\'>');
            $(".title").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');

            $("#pos").val($("#centrocirc").val() + ',' + $valor);
            document.getElementById('tipo').placeholder = '1';
            document.getElementById('tipo').value = 'circular';
            $cont = 0;
            document.getElementById('circ').checked = 0;
            $('#FormCircular').collapse('hide');
            chk2.disabled = false;
            chk3.disabled = false;
        }
    }




};
//generar enlace rectangular

function Rectangular(checkbox) {
    const chk2 = document.getElementById('circ');
    const chk3 = document.getElementById('Poly');
    $cont = 0;

    if (checkbox.checked) {
        chk2.disabled = true;
        chk3.disabled = true;

        $("#form2").html('<div class="row"><div class="col-4">' +
            '<label>Esquina Superior</label>' +
            ' <input class="form-control is-invalid" id="EsqSuper" name="EsqSuper" type="text" readonly>' +
            '<div class="invalid-feedback"> <small id="fileHelp" class="text-danger ">Debe seleccionar  en la Imagen la esquina superior del Rectangulo</small>' +
            '</div>' +
            '</div>' +
            '<div class="col-3">' +
            '<label>Esquina Inferior</label>' +
            '<input class="form-control is-invalid" id="EsqInf" name="EsqInf" type="text">' +
            ' <div class="invalid-feedback"> <small id="fileHelp" class="text-danger ">Debe seleccionar  en la Imagen la esquina inferior del Rectangulo</small>' +
            '</div>' +
            '</div>' +
            '<div class="col-3">' +
            '<label>Generar</label>' +
            ' <button type="button" class="btn btn-success" id="GEnlaceRect" onclick="GenerarRectMap()">Generar Enlace</button>' +
            '</div></div>')
        $('#FormCircular').collapse('show');

    } else {
        $("#form2").html("");
        $('#FormCircular').collapse('hide');
        chk2.disabled = false;
        chk3.disabled = false;

    }
};

function GenerarRectMap() {
    const chk2 = document.getElementById('circ');
    const chk3 = document.getElementById('Poly');

    var x1 = document.getElementById("EsqSuper");
    var x2 = document.getElementById("EsqInf");

    if (x2.value.length == 0 || /^\s+$/.test(x2.value)) {

        $("#EsqInf").removeClass("is-valid");
        $("#EsqInf").addClass("is-invalid");

        if (!(x1.value.length == 0 || /^\s+$/.test(x1.value))) {
            $("#EsqSuper").removeClass("is-invalid");
            $("#EsqSuper").addClass("is-valid");
        }
    } else {
        $("#EsqInf").removeClass("is-invalid");
        $("#EsqInf").addClass("is-valid");

        if (x1.value.length == 0 || /^\s+$/.test(x1.value)) {

            $("#EsqSuper").removeClass("is-valid");
            $("#EsqSuper").addClass("is-invalid");
        } else {
            $("#EsqSuper").removeClass("is-invalid");
            $("#EsqSuper").addClass("is-valid");

            $valor = x1.value;
            $valor2 = x2.value;
            $val = $valor + ',' + $valor2;

            $(".anterior").remove();
            $(".definitivo").remove();

            $("#mapeo").append('<area class="title definitivo" id="titulo" title="" class="title" alt="" href="#" shape="rect" coords="' + $val + '" onclick="mostrarTitulo(\'' + $title + '\')" data-maphilight=\'{"alwaysOn":true}\'>');
            $(".title").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');

            $("#pos").val($val);
            document.getElementById('tipo').placeholder = '2';
            document.getElementById('tipo').value = 'rectangular';
            $cont = 0;
            document.getElementById('Rect').checked = 0;
            $('#FormCircular').collapse('hide');
            chk2.disabled = false;
            chk3.disabled = false;
        }
    }
};

// hacer enlace de polígono
function Libre(checkbox) {
    const chk2 = document.getElementById('circ');
    const chk3 = document.getElementById('Rect');
    $cont = 0;

    if (checkbox.checked) {
        chk2.disabled = true;
        chk3.disabled = true;

        $("#form2").html('<div class="row"><div class="col-8">' +
            '<label>Esquinas de la figura</label>' +
            ' <input class="form-control is-invalid" id="Esquinas" name="Esquinas" type="text" readonly>' +
            '<div class="invalid-feedback"> <small id="fileHelp" class="text-danger ">Debe seleccionar al menos tres puntos para generar la figura</small>' +
            '</div>' +
            '</div>' +
            '<div class="col-3">' +
            '<label>Generar</label>' +
            ' <button type="button" class="btn btn-success" id="GEnlaceLibre" data-estado=true onclick="GenerarLibreMap()">Generar Enlace</button>' +
            '</div></div>')
        $('#FormCircular').collapse('show');

    } else {
        $("#form2").html("");
        $('#FormCircular').collapse('hide');
        chk2.disabled = false;
        chk3.disabled = false;

    }
};

function GenerarLibreMap() {
    $("#GEnlaceLibre").attr('data-estado', false);
    const chk2 = document.getElementById('circ');
    const chk3 = document.getElementById('Rect');

    var x1 = document.getElementById("Esquinas");
    if (x1.value.length == 0 || /^\s+$/.test(x1.value)) {
        $("#Esquinas").removeClass("is-valid");
        $("#Esquinas").addClass("is-invalid");
        $("#GEnlaceLibre").attr('data-estado', true);
    } else {
        $cadena = x1.value;
        $dividida = $cadena.split(',')
        if ($dividida.length < 5) {
            $("#Esquinas").removeClass("is-valid");
            $("#Esquinas").addClass("is-invalid");
            $("#GEnlaceLibre").attr('data-estado', true);
        } else {
            $("#Esquinas").removeClass("is-invalid");
            $("#Esquinas").addClass("is-valid");
            $(".anterior").remove();
            $(".definitivo").remove();

            $("#mapeo").append('<area class="title definitivo" id="titulo" title="" class="title" alt="" href="#" shape="poly" coords="' + $cadena + '" onclick="mostrarTitulo(\'' + $title + '\')" data-maphilight=\'{"alwaysOn":true}\'>');
            $(".title").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');

            $("#pos").val($cadena);
            document.getElementById('tipo').placeholder = '3';
            document.getElementById('tipo').value = 'Figura libre';
            $cont = 0;
            document.getElementById('Poly').checked = 0;
            $('#FormCircular').collapse('hide');
            chk2.disabled = false;
            chk3.disabled = false;
        }
    }

}

//------------------deshacer el enlace creado antes de enviar el formulari
$("#BorrarButtonButton").click(function (ev) {

    $("area").remove(".definitivo");

    $("#mapeo").append('<area class="prueba" id="titulo" title="" alt="" href="" shape="circle" coords="0,0,1"  data-maphilight=\'{"alwaysOn":true}\'>');
    $(".prueba").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');
    $("#pos").val("");
    document.getElementById('tipo').placeholder = 'Tipo enlace';
    document.getElementById('tipo').value = '';
    $cont = 0;

});

//---------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------
(function ($) {
    $("#sendUpdate").click(function (ev) {

        ev.preventDefault();
        var self = this;

        $Curso = $("#Curso").val();
        $Tema = $("#Tema").val();
        $Titulo = $("#Titulo").val();
        $Contenido= $('#summernote').summernote('code')

        $datos = {
            'Id_Titulo': $Titulo,
            'Contenido': $Contenido,
            'Tema': $Tema,
            'Curso': $Curso
        }


        if ($("#imagenTema").length) {

            if ($("#pos").val().length > 0) {

                $Coordenadas = $("#pos").val();
                $Tipo = $('#tipo').attr('placeholder');
                $datos.Coordenadas = $Coordenadas;
                $datos.tipoEnlace = $Tipo;
            } else {
                $datos.Coordenadas = '';
                $datos.tipoEnlace = '';
            }

        } else {
            $datos.Coordenadas = '';
            $datos.tipoEnlace = '';
        }

        var x1 = document.getElementById("Nombre");

        if ((x1.value.length == 0) || /^\s+$/.test(x1.value)) {
            $datos.Nombre = '';

        } else {
            $datos.Nombre = $("#Nombre").val();
        }


        $.ajax({

            url: base_url + 'Titulo/EditarTitulo',
            type: 'POST',
            data: $datos,
            success: function (data) {
                var json = JSON.parse(data);
                window.location.replace(json.url);
            },
            statusCode: {
                400: function (xhr) {
                    var json = JSON.parse(xhr.responseText);

                    if (json.error.length != 0) {
                        $("#notificacion2").html('<div class="container-sm">' +
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            '<strong>' + json.error + '</strong>' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                            '</div>' +
                            '</div>');
                    }
                },
                500: function (xhr) {
                    var json = JSON.parse(xhr.responseText);

                    if (json.error.length != 0) {
                        $("#notificacion").html('<div class="container-sm">' +
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            '<strong>¡ERROR! OCURRIÓ UN ERROR AL EDITAR EL TITULO REVISE EL NOMBRE Y LOS DATOS ENVIADOS</strong>' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                            '</div>' +
                            '</div>');
                    }

                }
            }
        });
    });
    $("#ButtonConfirm").click(function (ev) {
        ev.preventDefault();
        var self = this;
        $Id_Titulo = $(this).attr('data-id');
        $Tema = $(this).attr('data-tema');
        $Curso = $(this).attr('data-curso');
        $Nombre = $("#TituloEliminar").val();

        $datos = {
            'Id_Titulo': $Id_Titulo,
            'Tema': $Tema,
            'Curso': $Curso,
            'Nombre': $Nombre
        };

        $.ajax({
            url: base_url + 'Titulo/BorrarTitulo',
            type: 'POST',
            data: $datos,
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
})(jQuery)

