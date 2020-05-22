let cant=
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
<div class="card mb-2">
    <div class="card-header mx-100 bg-primary text-white" >
        ${p}) Opcion Multiple
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pregunta algo">
        </div>
        <input id="resp${p}" value=4 hidden>
        <div id="resps${p}">

            <div id="R_${p}_1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox">
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},1)>×</button>
                </div>
            </div>
            <div id="R_${p}_2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox">
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},2)>×</button>
                </div>
            </div>
            <div id="R_${p}_3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox">
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-danger" onclick=delR(${p},3)>×</button>
                </div>
            </div>
            <div id="R_${p}_4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox">
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Respuesta...">
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
<div class="card mb-2">
    <div class="card-header mx-100 bg-secondary text-white" >
        ${p}) Verdadero y Falso
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pregunta algo">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" name="TF${p}" checked/>
                </div>
            </div>
            <span class="input-group-text" id="basic-addon1">VERDADERO</span>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" name="TF${p}"/>
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
<div class="card mb-2">
    <div class="card-header mx-100 bg-success text-white" >
        ${p}) Respuesta Corta
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pregunta algo">
        </div>
        <input id="resp${p}" value=1 hidden>
        <div id="resps${p}">
        
            <div id="R_${p}_1">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Respuesta...">
                    <button type="button" class="btn btn-outline-danger" onclick=delR(${p},1)>×</button>
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
<div class="card mb-2">
    <div class="card-header mx-100 bg-info text-white" >
        ${p}) Respuesta Larga
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pregunta algo">
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