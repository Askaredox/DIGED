<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DEDEV-DOCENTE</title>

    <!-- Custom fonts for this theme -->
    <link href="<?= base_url('Admin_page/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?= base_url('Admin_page/css/freelancer.min.css') ?>" rel="stylesheet">
    <link rel='stylesheet' href="<?= base_url('Admin_page/css/css/bootstrap.min.css') ?>">
    <link rel='stylesheet' href="<?= base_url('assets/css/Eval.css') ?>">
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
</head>
<body id="page-top">
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Temas/' . $this->uri->segment(3)) ?>" class="scrollto"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid"></a>
            </div>
            <a href="<?= base_url('Temas/Administrar/' . $this->uri->segment(3)) ?>" class="btn btn-primary btn-lg bg-secondary" role="button">
                Atrás <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </nav>


    <section class="page-section" id="EDITAR">
        <div class="container pt-5">
            <header>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Evaluaciones</h2>

                <!-- Icon Divider -->
                <div class="save">
                    <button type="button" class="btn btn-success" style="border-radius: 20px !important;" onclick=sendTest()>Guardar<br>y<br>Salir</button>
                </div>                
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <div>
                    <p class="text-center"><?= $preguntas['test']->Descripcion?></p>
                    <input id="comprobacion" value=<?=$preguntas['test']->Id_Comprobacion ?> hidden>
                    <input id="titulo" value=<?=$preguntas['test']->Titulo ?> hidden>
                </div>
            </header>
            
            <div class="container">
                <input id="preguntas" value=<?=count($preguntas[0]) ?> hidden>
                <div id=preg>
                <?php foreach($preguntas[0] as $key=>$pre): ?>
                    <div id="preg<?=($key+1)?>">
                    <?php switch($pre['tipo']) : case 1: ?> <!--------------------- PARTE DE VERDADERO Y FALSO --------------------->
                        <input id="preg_T<?=($key+1)?>" value=<?=$pre['tipo']?> hidden>
                        <div class="card mb-2">
                            <div class="card-header mx-100 bg-secondary text-white" >
                                <?php echo ($key+1).') '; ?>Verdadero y Falso
                                <button type="button" class="btn btn-outline-danger float-right" onclick=delP(<?=($key+1)?>)>×</button>
                            </div>
                            <input id="resp<?=($key+1)?>" value=1 hidden>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <textarea id="PREGUNTA_<?=($key+1)?>" class="form-control" placeholder="Pregunta algo"><?=$pre["Pregunta"]?></textarea>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" id="res<?=($key+1)?>" name="res<?=($key+1)?>" <?= $pre['answer'][0]['answer']=='1'?"checked":""?>/>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon1">VERDADERO</span>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="res<?=($key+1)?>" <?= $pre['answer'][0]['answer']=='0'?"checked":""?>/>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon1">FALSO</span>
                                </div>
                            </div>
                        </div>
                    <?php break; case 2: ?> <!--------------------- PARTE DE RESPUESTA LARGA --------------------->
                        <input id="preg_T<?=($key+1)?>" value=<?=$pre['tipo']?> hidden>
                        <div class="card mb-2">
                            <div class="card-header mx-100 bg-info text-white" >
                                <?php echo ($key+1).') '; ?>Respuesta Larga
                                <button type="button" class="btn btn-outline-danger float-right" onclick=delP(<?=($key+1)?>)>×</button>
                            </div>
                            <input id="resp<?=($key+1)?>" value=1 hidden>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <textarea id="PREGUNTA_<?=($key+1)?>" class="form-control" placeholder="Pregunta algo"><?=$pre["Pregunta"]?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php break; case 3: ?> <!--------------------- PARTE DE RESPUESTA CORTA --------------------->
                        <input id="preg_T<?=($key+1)?>" value=<?=$pre['tipo']?> hidden>
                        <div class="card mb-2">
                            <div class="card-header mx-100 bg-success text-white" >
                                <?php echo ($key+1).') '; ?>Respuesta Corta
                                <button type="button" class="btn btn-outline-danger float-right" onclick=delP(<?=($key+1)?>)>×</button>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <textarea id="PREGUNTA_<?=($key+1)?>" class="form-control" placeholder="Pregunta algo"><?=$pre["Pregunta"]?></textarea>
                                </div>
                                <input id="resp<?=($key+1)?>" value=<?= count($pre["answer"]) ?> hidden>
                                <div id="resps<?=($key+1)?>">
                                <?php foreach($pre["answer"] as $llave=>$val):?>
                                    <div id="R_<?=($key+1)?>_<?=($llave+1)?>">
                                        <div class="input-group">
                                            <input id="RC<?=($key+1)?>_<?=($llave+1)?>" type="text" class="form-control" placeholder="Respuesta..." value='<?=$val["answer"]?>'>
                                            <button type="button" class="btn btn-danger" onclick=delR(<?=($key+1)?>,<?=($llave+1)?>)>×</button>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                </div>
                                <button type="button" class="btn btn-outline-primary w-100" onclick=addRes(<?=($key+1)?>)>
                                    <i class="fas fa-plus"></i> Añadir respuesta
                                </button>
                            </div>
                        </div>
                    <?php break; case 4: ?> <!--------------------- PARTE DE OPCION MULTIPLE --------------------->
                        <input id="preg_T<?=($key+1)?>" value=<?=$pre['tipo']?> hidden>
                        <div class="card mb-2">
                            <div class="card-header mx-100 bg-primary text-white" >
                                <?php echo ($key+1).') '; ?>Opcion Multiple
                                <button type="button" class="btn btn-outline-danger float-right" onclick=delP(<?=($key+1)?>)>×</button>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <textarea id="PREGUNTA_<?=($key+1)?>" class="form-control" placeholder="Pregunta algo"><?=$pre["Pregunta"]?></textarea>
                                </div>
                                <input id="resp<?=($key+1)?>" value=<?= count($pre["answer"]) ?> hidden>
                                <div id="resps<?=($key+1)?>">
                                <?php foreach($pre["answer"] as $llave=>$val):?>
                                    <div id="R_<?=($key+1)?>_<?=($llave+1)?>">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="OMC<?=($key+1)?>_<?=($llave+1)?>" name="OM<?=($key+1)?>" <?=$val["correcta"]=='1'?"checked":""?>>
                                                </div>
                                            </div>
                                            <input type="text" id="OM<?=($key+1)?>_<?=($llave+1)?>" class="form-control" placeholder="Respuesta..." value='<?=$val["answer"]?>'>
                                            <button type="button" class="btn btn-danger" onclick=delR(<?=($key+1)?>,<?=($llave+1)?>)>×</button>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                </div>
                                <button type="button" class="btn btn-outline-primary w-100" onclick=addR(<?=($key+1)?>)>
                                    <i class="fas fa-plus"></i> Añadir respuesta
                                </button>
                            </div>
                        </div>
                    <?php break; case 5: ?> <!--------------------- PARTE DE RESPUESTA SOPA DE LETRAS --------------------->
                        <input id="preg_T<?=($key+1)?>" value=<?=$pre['tipo']?> hidden>
                        <div class="card mb-2">
                            <div class="card-header mx-100 bg-warning" >
                                <?php echo ($key+1).') '; ?>Sopa de letras
                                <button type="button" class="btn btn-outline-danger float-right" onclick=delP(<?=($key+1)?>)>×</button>
                            </div>
                            <input id="resp<?=($key+1)?>" value=0 hidden>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <textarea id="PREGUNTA_<?=($key+1)?>" class="form-control" placeholder="Pregunta algo"><?=$pre["Pregunta"]?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php break; case 6: ?> <!--------------------- PARTE DE RESPUESTA CRUCIGRAMA --------------------->
                        <input id="preg_T<?=($key+1)?>" value=<?=$pre['tipo']?> hidden>
                        <div class="card mb-2">
                            <div class="card-header mx-100 bg-danger text-white" >
                                <?php echo ($key+1).') '; ?>Crucigrama
                                <button type="button" class="btn btn-outline-danger float-right" onclick=delP(<?=($key+1)?>)>×</button>
                            </div>
                            <input id="resp<?=($key+1)?>" value=0 hidden>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <textarea id="PREGUNTA_<?=($key+1)?>" class="form-control" placeholder="Pregunta algo"><?=$pre["Pregunta"]?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php break; endswitch; ?>
                    </div>
                <?php endforeach; ?>
                </div>
                <div class="card mt-5">
                    <div class="card-header mx-100" style="text-align:center;">
                        Añade una pregunta!
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col ">
                                <button type="button" class="btn btn-primary w-100" data-toggle="tooltip" data-placement="bottom" title="Opción Multiple" onclick=addP(0)>
                                    <i class="fas fa-plus"></i></br>
                                    OM
                                </button>
                            </div>
                            <div class="col ">
                                <button type="button" class="btn btn-secondary w-100" data-toggle="tooltip" data-placement="bottom" title="Verdadero o falso" onclick=addP(1)>
                                    <i class="fas fa-plus"></i></br>
                                    V/F
                                </button>
                            </div>
                            <div class="col ">
                                <button type="button" class="btn btn-success w-100" data-toggle="tooltip" data-placement="bottom" title="Respuesta Corta" onclick=addP(2)>
                                    <i class="fas fa-plus"></i></br>
                                    Resp. C
                                </button>
                            </div>
                            <div class="col ">
                                <button type="button" class="btn btn-info w-100" data-toggle="tooltip" data-placement="bottom" title="Respuesta Larga" onclick=addP(3)>
                                    <i class="fas fa-plus"></i></br>
                                    Resp. L
                                </button>
                            </div>
                            <div class="col ">
                                <button type="button" class="btn btn-danger w-100" data-toggle="tooltip" data-placement="bottom" title="Crucigrama" disable>
                                    <i class="fas fa-plus"></i></br>
                                    Crucigrama
                                </button>
                            </div>
                            <div class="col ">
                                <button type="button" class="btn btn-warning w-100" data-toggle="tooltip" data-placement="bottom" title="Sopa de letras" disable>
                                    <i class="fas fa-plus"></i></br>
                                    Sopa
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
<!-- Bootstrap core JavaScript -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?= base_url('Admin_page/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script>document.write("<script type='text/javascript' src='<?= base_url('assets/js/JEval.js') ?>?v=" + Date.now() + "'><\/script>");</script>

</body>
<html>
