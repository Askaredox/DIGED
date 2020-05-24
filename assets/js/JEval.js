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
                <input type="checkbox">
            </div>
        </div>
        <input type="text" class="form-control" placeholder="Respuesta...">
        <button type="button" class="btn btn-danger" onclick=delR(${key},${cant})>×</button>
    </div>
</div>
`);
    
}
function delR(preg,res){
    $('#R_'+preg+"_"+res).remove();
    alert("eliminado: "+'R_'+preg+"_"+res)
}
function addRes(key){
    let cant=$('#resp'+key).val();
    $('#resp'+key).val(++cant);
    
    $('#resps'+key).append(`
<div id="R_${key}_${cant}">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Respuesta...">
        <button type="button" class="btn btn-danger" onclick=delR(${key},${cant})>×</button>
    </div>
</div>
`);
}
function addP(tipo){
    let nuevo;
    let p=++cant;
    switch(tipo){
        case 0:
            nuevo=`
<input id="preg_T${p}" value=4 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-primary text-white" >
        ${p}) Opcion Multiple
        <button type="button" class="btn btn-outline-danger float-right">×</button>
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
        case 1:
            nuevo=`
<input id="preg_T${p}" value=1 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-secondary text-white" >
        ${p}) Verdadero y Falso
        <button type="button" class="btn btn-outline-danger float-right">×</button>
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
        case 2:
            nuevo=`
<input id="preg_T${p}" value=3 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-success text-white" >
        ${p}) Respuesta Corta
        <button type="button" class="btn btn-outline-danger float-right">×</button>
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
        case 3:
            nuevo=`
<input id="preg_T${p}" value=2 hidden>
<div class="card mb-2">
    <div class="card-header mx-100 bg-info text-white" >
        ${p}) Respuesta Larga
        <button type="button" class="btn btn-outline-danger float-right">×</button>
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
    $('#preg').append(nuevo)
    
}
function sendTest(){
    let test;
    test={
        id: $('#comprobacion').val(),
        titulo: $('#titulo').val(),
        preguntas: []
    }
    for(let i = 1; i <= cant; i++){
        let preg={
            id:i,
            tipo:parseInt($('#preg_T'+i).val()),
            pregunta:$('#PREGUNTA_'+i).html(),
            respuestas: []
        }
        console.log($('#PREGUNTA_'+i));
        for(let j = 1; j <= parseInt($('#resp'+i).val());j++){
            let res={ id:j }
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
                    res.respuesta=$('#OM'+i+"_"+j).val()
                    res.correcta=$('#OMC'+i+"_"+j).is(':checked')?1:0;
                    break;
                case 5: 


                    break;
                case 6: 

                    
                    break;
            }
            preg.respuestas.push(res)
        }
        test.preguntas.push(preg);
    }

    console.log(test);
}