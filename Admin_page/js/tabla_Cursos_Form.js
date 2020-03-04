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

    //para mantener los temporales.
    document.getElementById('TEMPcurso').placeholder = datoU;
    document.getElementById('TEMPdocente').placeholder = datoD;


    //para eliminar el curso
    $('#CursoEliminar').val(datoU);
    $('#DocentedeEliminar').val(datoD);
});


$(".btn-primary").click(function () {
    $('#collapseExample').collapse('show');
});

//si no desea modificar nada 
$('#cancel').click(function () {
    $('#collapseExample').collapse('hide');
});

function MostrarSeleccion() {
    /* Para obtener el texto de la opcion seleccionada */
    var combo = document.getElementById("selectorProfesor");
    var selected = combo.options[combo.selectedIndex].text;
    $('#docente').val(selected);
}