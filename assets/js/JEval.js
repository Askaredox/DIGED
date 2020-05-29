let cant;
$(document).ready(function (ev) {
    cant = $('#preguntas').val();
})

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
function addR(key) {
    let cant = $('#resp' + key).val();
    $('#resp' + key).val(++cant);

    $('#resps' + key).append(`
<div id="R_${key}_${cant}">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox" id="OMC${key}_${cant}" name="OM${key}">
            </div>
        </div>
        <input type="text" id="OM${key}_${cant}" class="form-control" placeholder="Respuesta...">
        <button type="button" class="btn btn-danger" onclick=delR(${key},${cant})>×</button>
    </div>
</div>
`);

}
/**
 * eliminacion de la respuesta
 * @param {number} preg clave de la pregunta
 * @param {number} res clave de la respuesta
 */
function delR(preg, res) {
    $('#R_' + preg + "_" + res).remove();
}
/**
 * Para añadir una nueva respuesta corta a la pregunta de respuesta corta
 * @param {number} key clave de la pregunta
 * @param {number} tipo tipo de la pregunta
 */
function addRes(key, tipo) {
    let cant = $('#resp' + key).val();
    $codigo = "";

    $('#resp' + key).val(++cant);



    $codigo = `<div id="R_${key}_${cant}">
    <div class="input-group">`;
    if (tipo == 3) {
        $codigo = $codigo + `<input id="RC${key}_${cant}" type="text" class="form-control" placeholder="Respuesta...">`;
    } else if (tipo == 5) {
        $codigo = $codigo + `<input id="RS${key}_${cant}" type="text" class="form-control" placeholder="Respuesta...">`;
    } else {
        $codigo = $codigo + `<input id="RCR${key}_${cant}" type="text" class="form-control" placeholder="Respuesta...">
        <textarea id="RCRD${key}_${cant}" class="form-control" placeholder="Pregunta algo"></textarea>`;
    }

    $codigo = $codigo + `<button type="button" class="btn btn-danger" onclick=delR(${key},${cant})>×</button>
    </div>
</div>`
    $('#resps' + key).append($codigo);
}
/**
 * Añadir una nueva pregunta
 * @param {*} tipo Tipo de pregunta que se va a añadir
 */
function addP(tipo) {
    let nuevo;
    let p = ++cant;
    switch (tipo) {
        case 0: //OPCION MULTIPLE
            nuevo = `
<input id="preg_T${p}" value=4 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-primary text-white" >
        ${p}) Opcion Multiple
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${p})>×</button>
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${p}" class="form-control" placeholder="Pregunta algo"></textarea>
        </div>
        <input id="resp${p}" value=4 hidden>
        <div id="resps${p}">
        
            <div id="R_${p}_1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" id="OMC${p}_1" name="OM${p}">
                        </div>
                    </div>
                    <input type="text" id="OM${p}_1" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},1)>×</button>
                </div>
            </div>
            <div id="R_${p}_2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" id="OMC${p}_2" name="OM${p}">
                        </div>
                    </div>
                    <input type="text" id="OM${p}_2" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},2)>×</button>
                </div>
            </div>
            <div id="R_${p}_3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" id="OMC${p}_3" name="OM${p}">
                        </div>
                    </div>
                    <input type="text" id="OM${p}_3" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},3)>×</button>
                </div>
            </div>
            <div id="R_${p}_4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" id="OMC${p}_4" name="OM${p}">
                        </div>
                    </div>
                    <input type="text" id="OM${p}_4" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},4)>×</button>
                </div>
            </div>
            
        </div>
        <button type="button" class="btn btn-outline-primary w-100" onclick=addR(${p})>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
    </div>
</div>
`
            break;
        case 1: //VERDADERO Y FALSO
            nuevo = `
<input id="preg_T${p}" value=1 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-secondary text-white" >
        ${p}) Verdadero y Falso
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${p})>×</button>
    </div>
    <input id="resp${p}" value=1 hidden>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${p}" class="form-control" placeholder="Pregunta algo"></textarea>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" id="res${p}" name="res${p}" checked/>
                </div>
            </div>
            <span class="input-group-text" id="basic-addon1">VERDADERO</span>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" name="res${p}"/>
                </div>
            </div>
            <span class="input-group-text" id="basic-addon1">FALSO</span>
        </div>
    </div>
</div>
`
            break;
        case 2: //RESPUESTA CORTA
            nuevo = `
<input id="preg_T${p}" value=3 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-success text-white" >
        ${p}) Respuesta Corta
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${p})>×</button>
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${p}" class="form-control" placeholder="Pregunta algo"></textarea>
        </div>
        <input id="resp${p}" value=1 hidden>
        <div id="resps${p}">
        
            <div id="R_${p}_1">
                <div class="input-group">
                    <input id="RC${p}_1" type="text" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},1)>×</button>
                </div>
            </div>
            
        </div>
        <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(${p},3)>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
    </div>
</div>
`
            break;
        case 3: //RESPUESTA LARGA
            nuevo = `
<input id="preg_T${p}" value=2 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-info text-white" >
        ${p}) Respuesta Larga
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${p})>×</button>
    </div>
    <input id="resp${p}" value=1 hidden>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${p}" class="form-control" placeholder="Pregunta algo"></textarea>
        </div>
    </div>
</div>
`
            break;
        case 4:// respuesta cruci
            nuevo = `
            <input id="preg_T${p}" value=6 hidden>
            <div class="card mb-2">
                <div class="card-header mx-100 bg-dark text-white" >
                    ${p}) Respuesta Crucigrama
                    <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${p})>×</button>
                    <button type="button" class="btn btn-success float-right" onclick=VPC(${p})>Vista Previa</button>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <textarea id="PREGUNTA_${p}" class="form-control" placeholder="Pregunta algo"></textarea>
                    </div>
                    <input id="resp${p}" value=1 hidden>
                    <div id="resps${p}">
                    
                        <div id="R_${p}_1">
                            <div class="input-group">
                                <input id="RCR${p}_1" type="text" class="form-control" placeholder="Respuesta...">
                                <textarea id="RCRD${p}_1" class="form-control" placeholder="Pregunta algo"></textarea>
                                <button type="button" class="btn btn-danger" onclick=delR(${p},1)>×</button>
                            </div>
                        </div>
                        
                    </div>
                    <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(${p},6)>
                        <i class="fas fa-plus"></i> Añadir respuesta
                    </button>
                    <div>
                        <table id='VPC${p}' class="sopa"></table>
                    </div>
                </div>
            </div>
            `
            break;
        case 5:// respuesta sopita
            nuevo = `
<input id="preg_T${p}" value=5 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-warning text-white" >
        ${p}) Respuesta Sopa
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${p})>×</button>
        <button type="button" class="btn btn-success float-right" onclick=VPS(${p})>Vista Previa</button>
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${p}" class="form-control" placeholder="Pregunta algo"></textarea>
        </div>
        <input id="resp${p}" value=1 hidden>
        <div id="resps${p}">
        
            <div id="R_${p}_1">
                <div class="input-group">
                    <input id="RS${p}_1" type="text" maxlength = "14" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},1)>×</button>
                </div>
            </div>
            
        </div>
        <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(${p},5)>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
        <div>
            <table id='VPS${p}' class="sopa"></table>
        </div>
    </div>
</div>
`
            break;
    }
    $('#preg').append(nuevo);

}
function delP(preg) {
    let test = getTest(preg);
    $('#preg').empty();

    for (let preg of test.preguntas) {
        let nuevo = "";
        switch (preg.tipo) {
            case 1: //VERDADERO Y FALSO
                nuevo += `
<input id="preg_T${preg.id}" value=${preg.tipo} hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-secondary text-white" >
        ${preg.id}) Verdadero y Falso
        <button type="button" class="btn btn-outline-danger float-right" onclick="delP(${preg.id})">×</button>
    </div>
    <input id="resp${preg.id}" value=1 hidden>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${preg.id}" class="form-control" placeholder="Pregunta algo">${preg.pregunta}</textarea>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" id="res${preg.id}" name="res${preg.id}" ${preg.respuestas[0].correcta == 1 ? "checked" : ""}/>
                </div>
            </div>
            <span class="input-group-text" id="basic-addon1">VERDADERO</span>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" name="res${preg.id}" ${preg.respuestas[0].correcta == 0 ? "checked" : ""}/>
                </div>
            </div>
            <span class="input-group-text" id="basic-addon1">FALSO</span>
        </div>
    </div>
</div>            
`
                break;
            case 2: //RESPUESTA LARGA
                nuevo += `
<input id="preg_T${preg.id}" value=${preg.tipo} hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-info text-white" >
        ${preg.id}) Respuesta Larga
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${preg.id})>×</button>
    </div>
    <input id="resp${preg.id}" value=1 hidden>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${preg.id}" class="form-control" placeholder="Pregunta algo">${preg.pregunta}</textarea>
        </div>
    </div>
</div>
`
                break;
            case 3: //RESPUESTA CORTA
                nuevo += `
<input id="preg_T${preg.id}" value=${preg.tipo} hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-success text-white" >
        ${preg.id}) Respuesta Corta
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${preg.id})>×</button>
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${preg.id}" class="form-control" placeholder="Pregunta algo">${preg.pregunta}</textarea>
        </div>
        <input id="resp${preg.id}" value=${preg.respuestas.length} hidden>
        <div id="resps${preg.id}">`;
                for (let resp of preg.respuestas) {
                    nuevo += `
            <div id="R_${preg.id}_${resp.id}">
                <div class="input-group">
                    <input id="RC${preg.id}_${resp.id}" type="text" class="form-control" placeholder="Respuesta..." value='${resp.respuesta}'>
                    <button type="button" class="btn btn-danger" onclick=delR(${preg.id},${resp.id})>×</button>
                </div>
            </div>
            `;
                }
                nuevo += `
        </div>
        <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(${preg.id})>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
    </div>
</div>            
`;
                break;
            case 4: //OPCION MULTIPLE 
                nuevo += `
<input id="preg_T${preg.id}" value=${preg.tipo} hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-primary text-white" >
        ${preg.id})Opcion Multiple
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${preg.id})>×</button>
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${preg.id}" class="form-control" placeholder="Pregunta algo">${preg.pregunta}</textarea>
        </div>
        <input id="resp${preg.id}" value=${preg.respuestas.length} hidden>
        <div id="resps${preg.id}">`;
                for (let resp of preg.respuestas) {
                    nuevo += `
                <div id="R_${preg.id}_${resp.id}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" id="OMC${preg.id}_${resp.id}" name="OM${preg.id}" ${resp.correcta == 1 ? "checked" : ""}>
                            </div>
                        </div>
                        <input type="text" id="OM${preg.id}_${resp.id}" class="form-control" placeholder="Respuesta..." value='${resp.respuesta}'>
                        <button type="button" class="btn btn-danger" onclick=delR(${preg.id},${resp.id})>×</button>
                    </div>
                </div>`;
                }
                nuevo += `
        </div>
        <button type="button" class="btn btn-outline-primary w-100" onclick=addR(${preg.id})>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
    </div>
</div>            
`;
                break;
            case 5: //SOPA DE LETRAS
                nuevo += `
<input id="preg_T${preg.id}" value=${preg.tipo} hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-warning text-white" >
        ${preg.id}) Respuesta Sopa
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${preg.id})>×</button>
        <button type="button" class="btn btn-success float-right" onclick=VPS(${preg.id})>Vista Previa</button>
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${preg.id}" class="form-control" placeholder="Pregunta algo">${preg.pregunta}</textarea>
        </div>
        <input id="resp${preg.id}" value=${preg.respuestas.length} hidden>
        <div id="resps${preg.id}">`;
                for (let resp of preg.respuestas) {
                    nuevo += `
                <div id="R_${preg.id}_${resp.id}">
                    <div class="input-group">
                        <input type="text" id="RS${preg.id}_${resp.id}" maxlength = "14" class="form-control" placeholder="Respuesta..." value='${resp.palabra}'>
                        <button type="button" class="btn btn-danger" onclick=delR(${preg.id},${resp.id})>×</button>
                    </div>
                </div>`;
                }
                nuevo += `
        </div>
        <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(${preg.id})>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
        <div>
            <table id='VPS${preg.id}' class="sopa"></table>
        </div>
    </div>
</div>            
`;
                break;
            case 6: //CRUCIGRAMA
                nuevo += `
            <input id="preg_T${preg.id}" value=${preg.tipo} hidden>
            <div class="card mb-2">
                <div class="card-header mx-100 bg-dark text-white" >
                    ${preg.id}) Crucigrama
                    <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${preg.id})>×</button>
                    <button type="button" class="btn btn-success float-right" onclick=VPC(${preg.id})>Vista Previa</button>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <textarea id="PREGUNTA_${preg.id}" class="form-control" placeholder="Pregunta algo">${preg.pregunta}</textarea>
                    </div>
                    <input id="resp${preg.id}" value=${preg.respuestas.length} hidden>
                    <div id="resps${preg.id}">`;
                for (let resp of preg.respuestas) {
                    nuevo += `
                <div id="R_${preg.id}_${resp.id}">
                    <div class="input-group">
                        <input type="text" id="RCR${preg.id}_${resp.id}" class="form-control" placeholder="Respuesta..." value='${resp.palabra}'>
                        <textarea id="RCRD${preg.id}_${resp.id}" class="form-control" placeholder="Pregunta algo">${resp.descripcion}</textarea>
                        <button type="button" class="btn btn-danger" onclick=delR(${preg.id},${resp.id})>×</button>
                    </div>
                </div>`;
                }
                nuevo += `
                    </div>
                    <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(${preg.id})>
                        <i class="fas fa-plus"></i> Añadir respuesta
                    </button>
                    <div>
                        <table id='VPC${preg.id}' class="sopa"></table>
                    </div>
                </div>
            </div>            
            `;
                break;
        }
        $('#preg').append(nuevo)
    }
    cant--;
}
/**
 * Mandar datos a la base de datos
 */
function getTest(pregu) {
    let test;
    test = {
        titulo: $('#titulo').val(),
        descripcion: $('#descr').val(),
        preguntas: []
    }
    for (let i = 1, id = 1; i <= cant; i++) {
        if (pregu && pregu == i)
            continue;
        let preg = {
            id: id++,
            tipo: parseInt($('#preg_T' + i).val()),
            pregunta: $('#PREGUNTA_' + i).val(),
            respuestas: []
        }
        let matriz=[];
        let matrizD=[];
        for (let j = 1, rid = 1; j <= parseInt($('#resp' + i).val()); j++) {
            let res = {}
            switch (preg.tipo) {
                case 1:
                    res.correcta = $('#res' + i).is(':checked') ? 1 : 0;
                    break;
                case 2:
                    break;
                case 3:
                    res.respuesta = $('#RC' + i + "_" + j).val();
                    break;
                case 4:
                    if ($('#OM' + i + "_" + j).val() == undefined) continue;
                    res.respuesta = $('#OM' + i + "_" + j).val()
                    res.correcta = $('#OMC' + i + "_" + j).is(':checked') ? 1 : 0;
                    break;
                case 5:
                    if($('#RS' + i + "_" + j).val() == undefined)continue;
                    res.respuesta = $('#RS' + i + "_" + j).val().toUpperCase();
                    matriz.push(res.respuesta);
                    break;
                case 6:
                    if($('#RCR' + i + "_" + j).val() == undefined)continue;
                    res.respuesta = $('#RCR' + i + "_" + j).val().toUpperCase();
                    res.descripcion = $('#RCRD' + i + "_" + j).val();
                    matrizD.push({answer:res.respuesta,descr:res.descripcion});
                    break;
            }
            if (res.respuesta == undefined && res.correcta == undefined)
                continue;
            res.id = rid++;
            preg.respuestas.push(res)
        }
        if(preg.tipo==5){
            preg.matriz=getSoup(matriz);
            matriz.length=0;
            preg=normalize(preg,true);
        }
        else if(preg.tipo==6){
            preg.matriz=getCrusi(matrizD);
            matrizD.length=0;
            preg=normalize(preg,false);
        }
        test.preguntas.push(preg);
    }
    return test;
}
function sendTest($Curso, $Tema) {
    let test = getTest();

    let $datos = { test: test }
    //console.log($datos);
    $.ajax({
        url: base_url + 'cEval/saveEval/'+$Curso+'/'+$Tema,
        type: 'POST',
        data: $datos,
        success: function (data) {
            var json = JSON.parse(data);
            console.log(json.url);
            window.location.replace(json.url);
        },
        statusCode: {
            400: function (xhr) {
                var json = JSON.parse(xhr.responseText);
                console.log(json)
            },
            500:function (xhr){
                var json = JSON.parse(xhr.responseText);
                console.log(json)
            }
        }
    })
}
function VPS(preg){
    let lista=[];
    for (let j = 1; j <= parseInt($('#resp' + preg).val()); j++) {
        if($('#RS' + preg + "_" + j).val()!=undefined)
            lista.push($('#RS' + preg + "_" + j).val().toUpperCase());
    }
    //console.log(lista)
    let board=poner(lista).board;
    //console.table(board);
    $('#VPS'+preg).empty();
    //console.log($("#VPS"+preg))
    for(let row of board){
        $('#VPS'+preg).append('<tr>');
        for(let col of row){
            if(col!="")
                $('#VPS'+preg).append('<td class="cellB">'+col+'</td>');
            else{
                let letra=String.fromCharCode(Math.floor(Math.random()*(26))+65)
                $('#VPS'+preg).append('<td class="cell">'+letra+'</td>');
            }
        }
        $('#VPS'+preg).append('</tr>');
    }
}
function VPC(preg){
    let lista=[];
    for (let j = 1; j <= parseInt($('#resp' + preg).val()); j++) {
        if($('#RCR' + preg + "_" + j).val()!=undefined)
            lista.push($('#RCR' + preg + "_" + j).val().toUpperCase());
    }
    //console.log(lista)
    let board=poner(lista).board;
    //console.table(board);
    $('#VPC'+preg).empty();
    //console.log($("#VPS"+preg))
    for(let row of board){
        $('#VPC'+preg).append('<tr>');
        for(let col of row){
            if(col!="")
                $('#VPC'+preg).append('<td class="cellCB">'+col+'</td>');
            else{
                $('#VPC'+preg).append('<td class="cellC"> </td>');
            }
        }
        $('#VPC'+preg).append('</tr>');
    }
}
function getSoup(words){
    let pals=poner(words)
    let board=pals.board;
    for(let row=0;row<board.length;row++)
        for(let col=0;col<board[row].length;col++)
            if(board[row][col]=="")
                board[row][col]=String.fromCharCode(Math.floor(Math.random()*(26))+65); 
    return {board,descrs:pals.descripciones};
}
function getCrusi(mat){
    let words=mat.map((val)=>val.answer)
    let board=poner(words);
    for(let desc of board.descripciones){
        desc.descripcion=mat.find(value=>value.answer==desc.palabra).descr;
    }
    return board;
}
function normalize(preg,t){
    let pregunta={}
    if(t){
        pregunta.id=preg.id;
        pregunta.tipo=5;
        pregunta.pregunta=preg.pregunta;
        pregunta.respuestas=[];
        pregunta.matriz=preg.matriz.board;
        for(let descr of preg.matriz.descrs){
            pregunta.respuestas.push({
                palabra:descr.palabra,
                X0:descr.X0,
                Y0:descr.Y0,
                X1:descr.X1,
                Y1:descr.Y1,
                id:preg.respuestas.find(val=>val.respuesta==descr.palabra).id,
            });
        }
    }
    else{
        pregunta.id=preg.id;
        pregunta.tipo=6;
        pregunta.pregunta=preg.pregunta;
        pregunta.respuestas=[];
        pregunta.matriz=preg.matriz.board;
        for(let descr of preg.matriz.descripciones){
            pregunta.respuestas.push({
                palabra:descr.palabra,
                X0:descr.X0,
                Y0:descr.Y0,
                X1:descr.X1,
                Y1:descr.Y1,
                id:preg.respuestas.find(val=>val.respuesta==descr.palabra).id,
                descripcion:preg.respuestas.find(val=>val.respuesta==descr.palabra).descripcion,
            });
        }
        //console.log(pregunta);
    }
    return pregunta;
}

function poner(words) {
    let descripciones=[]
    let board;    //tablero para colocar las palabras
    let cant;     //cantidad de espacios por lado 
    words = words.sort((a, b) => b.length - a.length);    //las ordeno de mayor a menor las palabras
    cant = words[0].length<=13?15:words[0].length+2;    //el tamaño del board sera 15x15
    board = [];
    board.length = cant;
    for (let i = 0; i < cant; i++) {    //llenado de espacios vacios el board
        board[i] = [];
        for (let j = 0; j < cant; j++) {
            board[i][j] = "";
        }
    }
    let donde = Math.floor(Math.random() * cant);    //para colocar la primera palabra se coloca en un borde 
    let vh = Math.floor(Math.random() * 2);            //con un random de donde colocarlo y en qué dirección
    for (let i = 0; i < words[0].length; i++) {        //colocar la palabra
        let letra = words[0].charAt(i);
        if (vh == 0) {
            board[i][donde] = letra;
        }
        else {
            board[donde][i] = letra;
        }
    }
    if (vh == 0) 
        descripciones.push({palabra:words[0],X0:0,Y0:donde,X1:words[0].length-1,Y1:donde})
    else 
        descripciones.push({palabra:words[0],X0:donde,Y0:0,X1:donde,Y1:words[0].length-1})

    
    pal: for (let i = 1; i < words.length; i++) {    //iterador de cada palabra
        let palabra = words[i];                        //la palabra
        let intentos=0;
        next: do {
            let x = Math.floor(Math.random() * cant);    //colocar en una posicion random
            let y = Math.floor(Math.random() * cant);
            let dir = Math.floor(Math.random() * 4);     //colocar en una dirección random horizontal o vertical
            let putX = 0, putY = 0, putDir = 0;        //variables de donde se va a colocar
            let puesto = false;                //si fue puesta la palabra para que no busque más donde ponerla
            if (dir == 0) {                //verifica en que posicion salio
                for (let j = 0; j < palabra.length; j++) {
                    if (y + j < cant) {    //si la palabra se salta a afuera del tablero saltar a siguiente espacio
                        if (board[x][y + j] != "" && board[x][y + j] != palabra.charAt(j))//verifica si es un espacio vacio y si no verifica si es la misma letra
                            break;    //de no cumplir salta al siguiente espacio
                    }
                    else
                        break;
                    if (j == palabra.length - 1) {//si el lugar es adecuado se toma su posicion y su dirección
                        puesto = true;
                        putX = x;
                        putY = y;
                        putDir = 0;
                    }
                }
            }
            else if(dir==1){
                for (let j = 0; j < palabra.length; j++) {     //lo mismo que el paso anterior pero prueba con las direcciones inversas si primero probo vertical y luego horizontal
                    if (x + j < cant) {                        //ahora va a probar horizontal y luego vertical
                        if (board[x + j][y] != "" && board[x + j][y] != palabra.charAt(j))
                            break;
                    }
                    else
                        break;
                    if (j == palabra.length - 1) {
                        puesto = true;
                        putX = x;
                        putY = y;
                        putDir = 1;
                    }
                }
            }
            else if(dir==2){
                for (let j = 0; j < palabra.length; j++) {//lo mismo que el anterior pero si no logro hacerlo en una dirección se toma la otra
                    if (x + j < cant && y + j < cant) {
                        if (board[x + j][y+j] != "" && board[x + j][y+j] != palabra.charAt(j))
                            continue next;
                    }
                    else
                        continue next;
                        
                    if (j == palabra.length - 1) {
                        puesto = true;
                        putX = x;
                        putY = y;
                        putDir = 2;
                    }
                    
                }
            }
            else if(dir==3){
                for (let j = 0; j < palabra.length; j++) {//lo mismo que el anterior pero si no logro hacerlo en una dirección se toma la otra
                    if (x - j > 0 && y + j < cant) {
                        if (board[x - j][y+j] != "" && board[x - j][y+j] != palabra.charAt(j))
                            continue next;
                    }
                    else
                        continue next;
                        
                    if (j == palabra.length - 1) {
                        puesto = true;
                        putX = x;
                        putY = y;
                        putDir = 3;
                    }
                    
                }
            }
            
            if(puesto){
                for (let j = 0; j < palabra.length; j++) {        //si la palabra es candidata a colocarse entonces se toma la dirección
                    if (putDir == 0) {    //horizontal
                        board[putX][putY + j] = palabra.charAt(j); //colocar letra por letra horizontalmente
                    }
                    else if(putDir==1){                //vertical
                        board[putX + j][putY] = palabra.charAt(j); //colocar verticalmente
                    }
                    else if(putDir==2){                //diagonal abajo
                        board[putX + j][putY+j] = palabra.charAt(j); //colocar diagonalmente
                    }
                    else if(putDir==3){                //diagonal arriba
                        board[putX - j][putY+j] = palabra.charAt(j); //colocar diagonalmente
                    }
                }
                if(descr){
                    let xFin,yFin;
                    if (putDir == 0) {    //horizontal
                        xFin=putX;
                        yFin=putY+palabra.length-1;
                    }
                    else if(putDir==1){                //vertical
                        xFin=putX+palabra.length-1;
                        yFin=putY;
                    }
                    else if(putDir==2){                //diagonal abajo
                        xFin=putX+palabra.length-1;
                        yFin=putY+palabra.length-1;
                    }
                    else if(putDir==3){                //diagonal arriba
                        xFin=putX-palabra.length+1;
                        yFin=putY+palabra.length-1;
                    }
                    descripciones.push({palabra,X0:putY,Y0:putX,X1:yFin,Y1:xFin})
                }
                continue pal;//continuar con la siguiente palabra
            }
            intentos++;
        } while (intentos < cant * cant);//para que el ciclo no se vuelva infinito se probara con la misma cantidad que el area del tablero
    }
    return {board,descripciones}
}