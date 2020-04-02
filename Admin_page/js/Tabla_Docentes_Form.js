// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
});

//PARA OBTENER LOS VALORES DE LA FILA SELECCIONADA
$('#dataTable tr').on('click', function () {
    var datoU = $(this).find('th').html();
    var datoD = $(this).find('td:nth-child(2)').html();
    var datoT = $(this).find('td:nth-child(3)').html();
    var datoC = $(this).find('td:nth-child(4)').html();

    $("#cod").val(datoU);
    document.getElementById('name').placeholder = datoD;
    document.getElementById('lastname').placeholder = datoT;
    document.getElementById('password').placeholder = datoC;

    $('#NombreEliminar').val(datoD);
    $('#ApellidoEliminar').val(datoT);
    $('#CodUser').val(datoU);
});

// CERRAR EL ÁREA DE EDICION
$('#cancelar').click(function () {
    $('#collapseExample').collapse('hide');
    var myNewURL = "/DIGED/Administrar/Docentes";//the new URL
    window.location.replace(myNewURL);
});

// EL MODAL DE ELIMINAR 
$(".btn-eliminar").click(function () {
    $('#ELIMINAR').modal();
    $("#ConfirmDelete").attr("data-id", $(this).attr('data-id'));
});


// BTN-PRIMARY SON TODOS LOS BOTONES DE "EDITAR" en la tabla
$(".btn-primary").click(function () {
    $('#collapseExample').collapse('show');
    $("#password").val("");
    $("#password2").val("");
    $("#lastname").val("");
    $("#name").val("");
});

//MOSTRAR CONTRASEÑA DEL CAMPO CUANDO SE QUIERA MODIFICAR
function MostrarContrasenia() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// ADVERTENCIA DE CONTRASEÑAS DIFERENTES
$('#pop2').on('shown.bs.popover', function () {
    setTimeout(function () {
        $('#pop2').popover('hide');
    }, 1000)
});

//ADVERTENCIA DE CONTRASEÑAS IGUALES
$('#pop1').on('shown.bs.popover', function () {
    setTimeout(function () {
        $('#pop1').popover('hide');
    }, 1000)
});

//ADVERTENCIA DE CAMPO PASSWORD VACÍO
$('#pop3').on('shown.bs.popover', function () {
    setTimeout(function () {
        $('#pop3').popover('hide');
    }, 1000)
});

//ADVERTENCIA DE CAMPO PASSWORD2 O DE CONFIRMACIÓN VACÍO
$('#pop4').on('shown.bs.popover', function () {
    setTimeout(function () {
        $('#pop4').popover('hide');
    }, 1000)
});

// PRIMER DOBLE CHECK PARA  INGRESAR NUEVA CONTRASEÑA 
$('#confirm').click(function () {

    var x1 = document.getElementById("password");
    x1.type = "text";
    if (x1.value.length == 0 || /^\s+$/.test(x1.value)) {
        x1.type = "password";
        $('#pop3').popover('show');
    } else {
        x1.type = "password";
        var boton = document.getElementById('sendUpdate');
        boton.disabled = true
        $('#ConfirmarContraseña').collapse('show');
    }
});

//confirmar password  SEGUNDO DOUBLE CHECK PARA VERIFICAR QUE ESTÉN IGUALES LAS CONTRASEÑAS INGRESADAS
$('#verificar').click(function () {
    var x1 = document.getElementById("password");
    var x2 = document.getElementById("password2");

    x1.type = "text";
    x2.type = "text";

    if ((x1.value.length == 0 && x2.value.length == 0) || /^\s+$/.test(x1.value) || /^\s+$/.test(x2.value)) {
        x1.type = "password";
        x2.type = "password";
        $('#pop4').popover('show');
    } else {
        x1.type = "password";
        x2.type = "password";
        if (x1.value === x2.value) {
            $('#pop1').popover('show');
            var boton = document.getElementById('sendUpdate');
            boton.disabled = false

        } else {
            $('#pop2').popover('show');
        }
    }
});

// MOSTRAR CONTRASEÑA DE CAMPO PASSWORD2 O DE CONFIRMACIÓN
function MostrarContrasenia2() {
    var x = document.getElementById("password2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

(function ($) {
    $("#UpdateDocenteForm").submit(function (ev) {
        ev.preventDefault();
        var self = this;

        $cod = $("#cod").val();

        //NOMBRE
        var nom = document.getElementById("name");
        if (nom.value.length == 0 || /^\s+$/.test(nom.value)) {
            $Nombre = $("#name").attr('placeholder');
        } else {
            $Nombre = $("#name").val();
        }
        //APELLIDO
        var ap = document.getElementById("lastname");
        if (ap.value.length == 0 || /^\s+$/.test(ap.value)) {
            $Apellido = $("#lastname").attr('placeholder');
        } else {
            $Apellido = $("#lastname").val();
        }
        //CONTRASEÑA
        var cont = document.getElementById("password");
        if (cont.value.length == 0 || /^\s+$/.test(cont.value)) {
            $Contraseña = $("#password").attr('placeholder');
        } else {
            var cont2 = document.getElementById("password2");
            if (cont2.value.length == 0 || /^\s+$/.test(cont2.value)) {
                $('#ConfirmarContraseña').collapse('show');
                $('#pop4').popover('show');
                var boton = document.getElementById('sendUpdate');
                boton.disabled = true
            } else {
                $Contraseña = $("#password").val();
            }
        }
        $datos = {
            'Id_Usuario': $cod,
            'Nombre': $Nombre,
            'Apellido': $Apellido,
            'Contraseña': $Contraseña
        }
        $.ajax({
            url: '/DIGED/cTablaDocentes/EditD',
            type: 'POST',
            data: $datos,
            success: function (data) {
                var json = JSON.parse(data);
                window.location.replace(json.url);
            },
            statusCode: {
                400: function (xhr) {
                    var json = JSON.parse(xhr.responseText);
                    console.log('aqui'.json);
                    $(self).prepend('<div class="container-sm"><div class="alert alert-danger alert-dismissible fade show" role="alert">'
                        + '<strong>' + json.msge + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        + '<span aria-hidden="true">&times;</span></button></div></div>');
                }
            }
        });
    });
    $("#ConfirmDelete").click(function (ev) {
        ev.preventDefault();
        var self = this;
        $Id_Usuario = $(this).attr('data-id');
        $.ajax({
            url: '/DIGED/cTablaDocentes/DeleteD',
            type: 'POST',
            data: { 'Id_Usuario': $Id_Usuario },
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