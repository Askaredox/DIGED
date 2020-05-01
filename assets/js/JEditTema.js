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
                //console.log($("#Img_V").width);
            }
            else{
                $("#Img_V").attr("title", "NO IMAGE");
                $("#Img_V").attr("alt", "NO IMAGE");
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});
$("#UpdateForm").submit(function (ev) {
    console.log("entraste a EDICION de tema")
    ev.preventDefault();
    var self = this;
    var form_data = new FormData();     
    form_data.append("Nombre_T",$("#Nombre_T")[0].value)
    var img=$("#image")[0].files[0]
    form_data.append("image",img)
    form_data.append("Curso",$("#Curso")[0].value)
    form_data.append("Tema",$("#Tema")[0].value)
    var url=img?'Temas/UpdateImage':'Temas/UpdateTema'
    console.log(url)
    $.ajax({
        // var data = 

        url: base_url + url,
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function (data) {
            console.log(data)
        },
        statusCode: {
            400: function (xhr) {
                var json = JSON.parse(xhr.responseText);
                console.log(json);
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