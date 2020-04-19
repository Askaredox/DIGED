$(document).ready(function (ev) {
    var tema=$("#TTema").val();
    var curso=$("#TCurso").val();
    var self = this;
    $.ajax({
        type: "POST",
        url: base_url + 'Docente/Docente_home/getTema',
        data: {idTema: tema, idCurso: curso},
        success: function(response) {
            
            var jsonData = JSON.parse(response);
            $("#Nombre_T").val(jsonData.Nombre_T);
            if(jsonData.Imagen){
                $("#Img_V").attr("src", base_url + jsonData.Imagen);
                console.log($("#Img_V").width);
            }
            else{}
            console.log(jsonData);
        },
        error: function(e){
            console.log(e);
        }
    });
});