// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
});

//PARA OBTENER LOS VALORES DE LA FILA SELECCIONADA
$('#dataTable tr').on('click', function () {
    var datoU = $(this).find('td:nth-child(1)').html();
    var datoD = $(this).find('td:nth-child(2)').html();
    var datoT = $(this).find('td:nth-child(3)').html();
    document.getElementById('name').placeholder = datoU;
    document.getElementById('lastname').placeholder = datoD;
    document.getElementById('password').placeholder = datoT;

    //para mantener los temporales.
    document.getElementById('TEMPName').placeholder = datoU;
    document.getElementById('TEMPLastname').placeholder = datoD;
    document.getElementById('TEMPPassword').placeholder = datoT;

    $('#NombreEliminar').val(datoU);
    $('#ApellidoEliminar').val(datoD);
});

// CERRAR EL ÁREA DE EDICION
$('#cancelar').click(function () {
    $('#collapseExample').collapse('hide');
});

// BTN-PRIMARY SON TODOS LOS BOTONES DE "EDITAR" en la tabla
$(".btn-primary").click(function () {
    $('#collapseExample').collapse('show');
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
    x1.type="text";
    if ( x1.value.length==0 || /^\s+$/.test(x1.value) ) {
        x1.type="password";
        $('#pop3').popover('show');
    } else {
        x1.type="password";
        var boton = document.getElementById('sendUpdate');
        boton.disabled = true
        $('#ConfirmarContraseña').collapse('show');
    }
});

//confirmar password  SEGUNDO DOUBLE CHECK PARA VERIFICAR QUE ESTÉN IGUALES LAS CONTRASEÑAS INGRESADAS
$('#verificar').click(function () {
    var x1 = document.getElementById("password");
    var x2 = document.getElementById("password2");

    x1.type="text";
    x2.type="text";

    if ((x1.value.length==0 && x2.value.length==0) ||/^\s+$/.test(x1.value) ||  /^\s+$/.test(x2.value)) {
        x1.type="password";
        x2.type="password";
        $('#pop4').popover('show');
    } else {
        x1.type="password";
        x2.type="password";
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