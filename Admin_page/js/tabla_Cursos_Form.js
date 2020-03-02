// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
});

//para obtenere el valor de las filas seleccionadas de la tabla
$('#dataTable tr').on('click', function () {
    var datoU = $(this).find('td:nth-child(1)').html();
    var datoD = $(this).find('td:nth-child(2)').html();
    var datoT = $(this).find('td:nth-child(3)').html();
    // para actualizar o editar 
    document.getElementById('curso').placeholder = datoD;
    document.getElementById('docente').placeholder = datoT;

    //para mantener los temporales.
    document.getElementById('TEMPcodigo').placeholder = datoU;
    document.getElementById('TEMPcurso').placeholder = datoD;
    document.getElementById('TEMPdocente').placeholder = datoT;


    //para eliminar el curso
    $('#CursoEliminar').val(datoD);
    $('#DocentedeEliminar').val(datoT);
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