// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
});

//para obtenere el valor de las filas seleccionadas de la tabla
$('#dataTable tr').on('click', function () {
    var datoU = $(this).find('td:first').html();
    //para eliminar el curso
    $('#TemaEliminar').val(datoU);
});

$(".btn-eliminar").click(function (ev) {
    $('#EliminarModal').modal();
    $("#ButtonConfirm").attr("data-id", $(this).attr('data-id'));
    $("#ButtonConfirm").attr("data-curso", $(this).attr('data-curso'));
});




(function ($) {//EDITAR CURSO
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