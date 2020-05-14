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
                $("#PwActual > input").removeClass('is-invalid');
                $("#Pw1 > input").addClass('is-valid');
                $("#Pw2 > input").addClass('is-valid');
                $("#PwActual > input").addClass('is-valid');
                var json = JSON.parse(data);
                window.location.replace(json.url);
                //console.log(data);
            },
            statusCode: {
                400: function (xhr) {

                    $("#Pw1 > input").removeClass('is-invalid');
                    $("#Pw2 > input").removeClass('is-invalid');
                    $("#PwActual > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.P1.length != 0) {
                        $("#Pw1 > div").html(json.P1);
                        $("#Pw1 > input").addClass('is-invalid');
                    }
                    if (json.P2.length != 0) {
                        $("#Pw2 > div").html(json.P2);
                        $("#Pw2 > input").addClass('is-invalid');
                    }

                    if (json.A.length != 0) {
                        $("#PwActual > div").html(json.A);
                        $("#PwActual > input").addClass('is-invalid');
                    }
                },
                401: function (xhr) {
                    //PwActual
                    $("#Pw1 > input").removeClass('is-invalid');
                    $("#Pw2 > input").removeClass('is-invalid');
                    $("#Pw1 > input").addClass('is-valid');
                    $("#Pw2 > input").addClass('is-valid');
                    $("#PwActual > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.A.length != 0) {
                        $("#PwActual > div").html(json.A);
                        $("#PwActual > input").addClass('is-invalid');
                    }

                }
            }
        });
    });


    $("#submit").click(function (ev) {
        console.log("entraste a craecion de titulo")
        ev.preventDefault();
        var self = this;
        $Nombre = $("#Nombre").val();
        $Curso = $("#Curso").val();
        $Tema = $("#Tema").val();
        $Contenido = $('#summernote').summernote('code')
        if ($("#imagenTema").length) {

            if ($("#pos").val().length > 0) {

                $("#pos").removeClass("is-invalid");
                $("#tipo").removeClass("is-invalid");
                $("#pos").addClass("is-valid");
                $("#tipo").addClass("is-valid");

                $Coordenadas = $("#pos").val();
                $Tipo = $('#tipo').attr('placeholder');
                $datos = {
                    'Nombre': $Nombre,
                    'Contenido': $Contenido,
                    'Coordenadas': $Coordenadas,
                    'tipoEnlace': $Tipo,
                    'Tema': $Tema,
                    'Curso': $Curso
                }
                $.ajax({

                    url: base_url + 'Titulo/CrearTitulo',
                    type: 'POST',
                    data: $datos,
                    success: function (data) {
                        $("#GroupName > input").removeClass('is-invalid');
                        $("#GroupName > input").addClass('is-valid');

                        var json = JSON.parse(data);
                        window.location.replace(json.url);
                        // console.log(json);
                    },
                    statusCode: {
                        400: function (xhr) {

                            $("#GroupName > input").removeClass('is-invalid');
                            var json = JSON.parse(xhr.responseText);
                            if (json.Nombre.length != 0) {
                                $("#GroupName > div").html(json.Nombre);
                                $("#GroupName > input").addClass('is-invalid');
                            } else {
                                $("#GroupName > input").addClass('is-valid');
                            }
                        },
                        401: function (xhr) {
                            var json = JSON.parse(xhr.responseText);

                            if (json.error.length != 0) {
                                $("#notificacion").html('<div class="container-sm">' +
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
                                    '<strong>¡ERROR! OCURRIÓ UN ERROR AL CREAR EL TITULO REVISE EL NOMBRE Y LOS DATOS ENVIADOS</strong>' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>');
                            }

                        }
                    }
                });
            } else {
                $("#pos").removeClass("is-valid");
                $("#tipo").removeClass("is-valid");
                $("#pos").addClass("is-invalid");
                $("#tipo").addClass("is-invalid");
                $datos = {
                    'Nombre': $Nombre,
                    'Contenido': $Contenido,
                    'Coordenadas': '',
                    'tipoEnlace': '',
                    'Tema': $Tema,
                    'Curso': $Curso
                }
            }

        } else {
            $datos = {
                'Nombre': $Nombre,
                'Contenido': $Contenido,
                'Tema': $Tema,//nombre tema
                'Curso': $Curso,//nombre Curso
                'Coordenadas': '',
                'tipoEnlace': '',
            }
            $.ajax({

                url: base_url + 'Titulo/CrearTitulo',
                type: 'POST',
                data: $datos,
                success: function (data) {
                    $("#GroupName > input").removeClass('is-invalid');
                    $("#GroupName > input").addClass('is-valid');

                    var json = JSON.parse(data);
                    window.location.replace(json.url);
                    // console.log(json);
                },
                statusCode: {
                    400: function (xhr) {

                        $("#GroupName > input").removeClass('is-invalid');
                        var json = JSON.parse(xhr.responseText);
                        if (json.Nombre.length != 0) {
                            $("#GroupName > div").html(json.Nombre);
                            $("#GroupName > input").addClass('is-invalid');
                        } else {
                            $("#GroupName > input").addClass('is-valid');
                        }
                    },
                    401: function (xhr) {
                        var json = JSON.parse(xhr.responseText);

                        if (json.error.length != 0) {
                            $("#notificacion").html('<div class="container-sm">' +
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
                                '<strong>¡ERROR! OCURRIÓ UN ERROR AL CREAR EL TITULO REVISE EL NOMBRE Y LOS DATOS ENVIADOS</strong>' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                                '</div>' +
                                '</div>');
                        }

                    }
                }
            });
        }
    });
})(jQuery)

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

const imagenTema = document.getElementById('imagenTema');
const imagenOriginal = new Image();
imagenOriginal.onload = imagenCargada;
imagenOriginal.src = imagenTema.src;
$altoOriginal = 0;
$anchoOriginal = 0;


function imagenCargada() {
    $altoOriginal = imagenOriginal.height
    $anchoOriginal = imagenOriginal.width
}



if (imagenTema) {
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

            //hacer la proporcion
            $cadena1 = x2.value //VALOR DEL CENTRO DEL PUNTO
            $radio = Math.round(($valor * $anchoOriginal) / imagenTema.width)
            $dividida1 = $cadena1.split(',')
            $valorOriginal = "";

            for (var i = 0; i < $dividida1.length; i++) {
                if (i == 0) {// ESTA ES X
                    $xx1 = Math.round(($dividida1[i] * $anchoOriginal) / imagenTema.width)

                } else {// ESTA SERIA Y
                    $y1 = Math.round(($dividida1[i] * $altoOriginal) / imagenTema.height)
                }

            }
            $valorOriginal = $xx1 + ',' + $y1 + ',' + $radio

            $(".anterior").remove();
            $(".definitivo").remove();

            $("#mapeo").append('<area class="title definitivo" id="titulo" title="" class="title" alt="" href="#" shape="circle" coords="' + $("#centrocirc").val() + ',' + $valor + '" onclick="mostrarTitulo(\'' + $title + '\')" data-maphilight=\'{"alwaysOn":true}\'>');
            $(".title").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');

            $("#pos").val($valorOriginal);
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

            //hacer la proporcion
            $cadena1 = $valor
            $cadena2 = $valor2
            $dividida1 = $cadena1.split(',')
            $dividida2 = $cadena2.split(',')
            $valorOriginal = "";

            for (var i = 0; i < $dividida1.length; i++) {
                if (i == 0) {// todas estas las x
                    $xx1 = Math.round(($dividida1[i] * $anchoOriginal) / imagenTema.width)
                    $xx2 = Math.round(($dividida2[i] * $anchoOriginal) / imagenTema.width)

                } else {// todas estas las y
                    $y1 = Math.round(($dividida1[i] * $altoOriginal) / imagenTema.height)
                    $y2 = Math.round(($dividida2[i] * $altoOriginal) / imagenTema.height)
                }

            }
            $valorOriginal = $xx1 + ',' + $y1 + ',' + $xx2 + ',' + $y2


            $val = $valor + ',' + $valor2;

            $(".anterior").remove();
            $(".definitivo").remove();

            $("#mapeo").append('<area class="title definitivo" id="titulo" title="" class="title" alt="" href="#" shape="rect" coords="' + $val + '" onclick="mostrarTitulo(\'' + $title + '\')" data-maphilight=\'{"alwaysOn":true}\'>');
            $(".title").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');

            $("#pos").val($valorOriginal);
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

//------------------
$("#BorrarButton").click(function (ev) {

    $("area").remove(".definitivo");

    $("#mapeo").append('<area class="prueba" id="titulo" title="" alt="" href="" shape="circle" coords="0,0,1"  data-maphilight=\'{"alwaysOn":true}\'>');
    $(".prueba").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');
    $("#pos").val("");
    document.getElementById('tipo').placeholder = 'Tipo enlace';
    document.getElementById('tipo').value = '';
    $cont = 0;

});