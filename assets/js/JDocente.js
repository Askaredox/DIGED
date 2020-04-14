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
    $("#RegisterTitle").submit(function (ev) {

        ev.preventDefault();
        var self = this;
        $("#GroupImg > div").html("");
        $.ajax({
            // var data = 

            url: base_url + 'Titulo/CrearTitulo',
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                /* $("#GroupName > input").removeClass('is-invalid');
                 $("#GroupImg > input").removeClass('is-invalid');
                 $("#GroupName > input").addClass('is-valid');
                 $("#GroupImg > input").addClass('is-valid');
                 var json = JSON.parse(data);
                 window.location.replace(json.url);*/
                // console.log(json);
            },
            statusCode: {
                400: function (xhr) {

                    /* $("#GroupName > input").removeClass('is-invalid');
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
                     }*/

                },
                500: function (xhr) {
                    /* $("#notificacion").html('<div class="container-sm">' +
                         '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                         '<strong>¡ERROR! HUBO UN ERROR AL CREAR EL TEMA</strong>' +
                         '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                         '<span aria-hidden="true">&times;</span>' +
                         '</button>' +
                         '</div>' +
                         '</div>');*/
                }
            }
        });
    });
})(jQuery)

function mostrarTitulo($titulo) {
    alert($titulo);
};

function Circular() {
    const chk2 = document.getElementById('Rect');
    const chk3 = document.getElementById('Poly');
    chk2.disabled = true;
    chk3.disabled = true;

    $('#FormCircular').collapse('show');

    const imagenTema = document.getElementById('imagenTema');

    imagenTema.addEventListener('click', function (e) {
        let ctx;
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
        $title = $('#Nombre').val();


        $(".anterior").remove();

        $("#mapeo").append('<area  class="title anterior" id="titulo" title="' + $title + '" class="title" alt="" href="#" shape="circle" coords="' + $x + ',' + $y + ',18" onclick="mostrarTitulo(\'' + $title + '\')" data-maphilight=\'{"alwaysOn":true}\'>');
        $(".title").data('maphilight', { 'alwaysOn': true }).trigger('alwaysOn.maphilight');

        //$valor= $("#centrocirc").val();
        $("#centrocirc").val($x+','+$y);
        

        console.log(e.offsetX);
        console.log(e.offsetY);

    });
};

function Rectangular() {
    const chk2 = document.getElementById('circ');
    const chk3 = document.getElementById('Poly');
    chk2.disabled = true;
    chk3.disabled = true;
};
function Libre() {
    const chk2 = document.getElementById('circ');
    const chk3 = document.getElementById('Rect');
    chk2.disabled = true;
    chk3.disabled = true;
};

//
//

//

//<area id="titulo" title=<?= $title ?> class="title" alt="" href="#" shape="circle" coords="<?= $X . ',' . $Y . ',18' ?>" onclick="mostrarTitulo('<?php echo $title; ?>')">
//<area id="titulo" title=<?= $title ?> class="title" alt="" href="#" shape="rect" coords="<?= ($X+50).','.($Y+10).','.($X-10).','.($Y-10)?>" onclick="mostrarTitulo('<?php echo $title; ?>')">