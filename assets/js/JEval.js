let cant;
$(document).ready(function (ev) {
    cant=$('#preguntas').val();
})

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
function addR(key){
    let cant=$('#resp'+key).val();
    $('#resp'+key).val(++cant);
    
    $('#resps'+key).append(`
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
function delR(preg,res){
    $('#R_'+preg+"_"+res).remove();
}
/**
 * Para añadir una nueva respuesta corta a la pregunta de respuesta corta
 * @param {number} key clave de la pregunta
 */
function addRes(key){
    let cant=$('#resp'+key).val();
    $('#resp'+key).val(++cant);
    
    $('#resps'+key).append(`
<div id="R_${key}_${cant}">
    <div class="input-group">
        <input id="RC${key}_${cant}" type="text" class="form-control" placeholder="Respuesta...">
        <button type="button" class="btn btn-danger" onclick=delR(${key},${cant})>×</button>
    </div>
</div>
`);
}
/**
 * Añadir una nueva pregunta
 * @param {*} tipo Tipo de pregunta que se va a añadir
 */
function addP(tipo){
    let nuevo;
    let p=++cant;
    switch(tipo){
        case 0: //OPCION MULTIPLE
            nuevo=`
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
            nuevo=`
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
            nuevo=`
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
        <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(${p})>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
    </div>
</div>
`
            break;
        case 3: //RESPUESTA LARGA
            nuevo=`
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
        case 4:

            break;
        case 5:
    
            break;
    }
    $('#preg').append(nuevo);
    
}
function delP(preg){
    let test = getTest(preg);
    $('#preg').empty();
    
    for(let preg of test.preguntas){
        let nuevo="";
        switch(preg.tipo){
        case 1: //VERDADERO Y FALSO
            nuevo+=`
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
                    <input type="radio" id="res${preg.id}" name="res${preg.id}" ${ preg.respuestas[0].correcta==1?"checked":""}/>
                </div>
            </div>
            <span class="input-group-text" id="basic-addon1">VERDADERO</span>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" name="res${preg.id}" ${ preg.respuestas[0].correcta==0?"checked":""}/>
                </div>
            </div>
            <span class="input-group-text" id="basic-addon1">FALSO</span>
        </div>
    </div>
</div>            
`
            break;
        case 2: //RESPUESTA LARGA
            nuevo+=`
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
            nuevo+=`
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
        <input id="resp${preg.id}" value=${ preg.respuestas.lenght } hidden>
        <div id="resps${preg.id}">`;
            for(let resp of preg.respuestas){
            nuevo+=`
            <div id="R_${preg.id}_${resp.id}">
                <div class="input-group">
                    <input id="RC${preg.id}_${resp.id}" type="text" class="form-control" placeholder="Respuesta..." value='${resp.respuesta}'>
                    <button type="button" class="btn btn-danger" onclick=delR(${preg.id},${resp.id})>×</button>
                </div>
            </div>
            `;
            }
            nuevo+=`
        </div>
        <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(${preg.id})>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
    </div>
</div>            
`;
            break;
        case 4: //OPCION MULTIPLE 
            nuevo+=`
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
        <input id="resp${preg.id}" value=${ preg.respuestas.lenght } hidden>
        <div id="resps${preg.id}">`;
            for(let resp of preg.respuestas){
            nuevo +=`<div id="R_${preg.id}_${resp.id}">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" id="OMC${preg.id}_${resp.id}" name="OM${preg.id}" ${ resp.correcta==1?"checked":""}>
                        </div>
                    </div>
                    <input type="text" id="OM${preg.id}_${resp.id}" class="form-control" placeholder="Respuesta..." value='${resp.respuesta}'>
                    <button type="button" class="btn btn-danger" onclick=delR(${preg.id},${resp.id})>×</button>
                </div>
            </div>`
            }
            nuevo+=`
        </div>
        <button type="button" class="btn btn-outline-primary w-100" onclick=addR(${preg.id})>
            <i class="fas fa-plus"></i> Añadir respuesta
        </button>
    </div>
</div>            
`;
            break;
        case 5: //SOPA DE LETRAS
            nuevo+=`
<input id="preg_T${preg.id}" value=${preg.tipo} hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-warning" >
        ${preg.id}) Sopa de letras
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${preg.id})>×</button>
    </div>
    <input id="resp${preg.id}" value=0 hidden>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${preg.id}" class="form-control" placeholder="Pregunta algo">${preg.pregunta}</textarea>
        </div>
    </div>
</div>
`
            break;
        case 6: //CRUCIGRAMA
            nuevo+=`
<input id="preg_T${preg.id}" value=${preg.tipo} hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-danger text-white" >
        ${preg.id}) Crucigrama
        <button type="button" class="btn btn-outline-danger float-right" onclick=delP(${preg.id})>×</button>
    </div>
    <input id="resp${preg.id}" value=0 hidden>
    <div class="card-body">
        <div class="input-group mb-3">
            <textarea id="PREGUNTA_${preg.id}" class="form-control" placeholder="Pregunta algo">${preg.pregunta}</textarea>
        </div>
    </div>
</div>
`
            break;
        }
        $('#preg').append(nuevo)
    }
    cant--;
}
/**
 * Mandar datos a la base de datos
 */
function getTest(pregu){
    let test;
    test={
        id: $('#comprobacion').val(),
        titulo: $('#titulo').val(),
        descripcion: $('#descr').val(),
        preguntas: []
    }
    for(let i = 1,id = 1; i <= cant; i++){
        if(pregu && pregu == i)
            continue;
        let preg={
            id:id++,
            tipo:parseInt($('#preg_T'+i).val()),
            pregunta:$('#PREGUNTA_'+i).val(),
            respuestas: []
        }
        for(let j = 1,rid=1; j <= parseInt($('#resp'+i).val());j++){
            let res={}
            switch(preg.tipo){
                case 1: 
                    res.correcta=$('#res'+i).is(':checked')?1:0;
                    break;
                case 2: 
                    break;
                case 3: 
                    res.respuesta=$('#RC'+i+"_"+j).val()
                    break;
                case 4: 
                    if($('#OM'+i+"_"+j).val()==undefined)
                        continue
                    res.respuesta=$('#OM'+i+"_"+j).val()
                    res.correcta=$('#OMC'+i+"_"+j).is(':checked')?1:0;
                    break;
                case 5: 
                    break;
                case 6: 
                    break;
            }
            if(res.respuesta==undefined && res.correcta==undefined)
                continue;
            res.id=rid++;
            preg.respuestas.push(res)
        }
        test.preguntas.push(preg);
    }
    return test;
}
function sendTest(){
    let test=getTest();
    console.log(JSON.stringify(test));

    let $datos={test:test}
    $.ajax({
        url: base_url + 'cEval/saveEval',
        type: 'POST',
        data: $datos,
        success: function (data) {
            var json = JSON.parse(data);
             console.log(json);
        },
        statusCode: {
            400: function (xhr) {
                var json = JSON.parse(xhr.responseText);
                console.log(json)
            }
        }
    })
}