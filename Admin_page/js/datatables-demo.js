// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});


$('#dataTable tr').on('click', function(){
  var datoU = $(this).find('td:nth-child(1)').html();
  var datoD = $(this).find('td:nth-child(2)').html();
  var datoT = $(this).find('td:nth-child(3)').html();
  document.getElementById('name').placeholder=datoU;
  document.getElementById('lastname').placeholder=datoD;
  document.getElementById('password').placeholder=datoT;

  //para mantener los temporales.
  document.getElementById('TEMPName').placeholder=datoU;
  document.getElementById('TEMPLastname').placeholder=datoD;
  document.getElementById('TEMPPassword').placeholder=datoT;

  $('#NombreEliminar').val(datoU);
  $('#ApellidoEliminar').val(datoD);
});


$(".btn-primary").click(function(){
  $('#collapseExample').collapse('show');
});
//si no desea modificar nada 
$('#cancelar').click(function () {
  $('#collapseExample').collapse('hide');  
});


function MostrarContrasenia() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
$('#pop2').on('shown.bs.popover', function() {
  setTimeout(function() {
      $('#pop2').popover('hide');
  }, 1000)
});
  $('#pop1').on('shown.bs.popover', function() {
    setTimeout(function() {
        $('#pop1').popover('hide');
    }, 1000)
});
$('#verificar').click(function(){
  var x1 = document.getElementById("password");
  var x2 = document.getElementById("password2");
  if (x1.value === x2.value ) {
    $('#pop1').popover('show');
    
  }else{
    $('#pop2').popover('show');
  }
});

function MostrarContrasenia2() {
  var x = document.getElementById("password2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

