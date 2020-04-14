// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
});
//para obtenere el valor de las filas seleccionadas de la tabla
$('#dataTable tr').on('click', function () {
    var datoU = $(this).find('td:nth-child(1)').html();
    // para actualizar o editar 
    document.getElementById('Nombre').placeholder = datoU;
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
    $('#collapseExample').collapse('hide');
    var myNewURL = base_url + "Titulo/Administrar/" + $(this).attr('data-curso')+'/'+ $(this).attr('data-tema');//the new URL
    window.location.replace(myNewURL);
});

$(".btn-edit").click(function (ev) {

    $valor = $(this).attr('data-tema');
    $("#TEMPtema").val($valor);// codigo del tema al que pertenece el titulo a editar
    $valor = $(this).attr('data-id');
    $("#TEMPTitulo").val($valor);// codigo del titulo a editar
    $valor = $(this).attr('data-posx');
    $("#X").val($valor);// posicion X del titulo a editar
    $valor = $(this).attr('data-posy');
    $("#Y").val($valor);// posicion Y del titulo a editar

    $('#collapseExample').collapse('show');
    $('#cancel').attr("data-curso", $(this).attr('data-curso'));
    $('#cancel').attr("data-tema", $(this).attr('data-tema'));
});