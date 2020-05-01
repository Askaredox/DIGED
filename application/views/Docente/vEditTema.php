<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="<?= base_url('Admin_page/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<!-- Bootstrap CSS -->
<link href="<?= base_url('Admin_page/css/freelancer.min.css') ?>" rel="stylesheet">
<link rel='stylesheet' href="<?= base_url('Admin_page/css/css/bootstrap.min.css') ?>">
<script>
  var base_url = '<?php echo base_url(); ?>';  
</script>
<title>Formulario Tema</title>
</head>

<body id="page-top">
    <input class="form-control" id="TCurso" name="TCurso" type="hidden" value=<?= $this->uri->segment(3)?> readonly>
    <input class="form-control" id="TTema" name="TTema" type="hidden" value=<?= $this->uri->segment(4)?> readonly>
 <!-- para el codigo del docete nuevo-->


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Temas/' . $this->uri->segment(3)) ?>" class="scrollto"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid"></a>
            </div>
            <a href="<?= base_url('Temas/Administrar/' . $this->uri->segment(3)) ?>" class="btn btn-primary btn-lg bg-secondary" role="button">
                Atrás <i class="fas fa-arrow-left"></i>
            </a>
            
    </nav>
            <!-- SECCIÓN EDITAR COMPLETA-->
    <section class="page-section" id="EDITAR">
        <div class="container pt-5">
            <header>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Actualizar Tema</h2>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mx-auto">

                        <form id="UpdateForm" novalidate="novalidate">
                            <div class="form-group" id="GroupCod">
                                <input type="text" class="form-control" name="Curso" id="Curso" placeholder="Codigo del Curso" value="<?=$this->uri->segment(3)?>" hidden>
                                <input type="text" class="form-control" name="Tema" id="Tema" placeholder="Codigo del Tema" value="<?=$this->uri->segment(4)?>" hidden>
                            </div>
                            <div class="form-group" id="GroupNombre">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <div class="row align-items-end">
                                        <div class="col-sm-2" >
                                            <img  id="Img_V" style="border-style: outset;" height="auto" width="100">
                                        </div>
                                        <div class="col-sm-10">
                                            <input class="form-control-plaintext border border-primary rounded" style="margin-left:30px" id="Nombre_T" name="Nombre_T" type="text" placeholder="Nombre Tema" value="<?= set_value('Nombre_T') ?>">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="image" name='image'>
                                <small id="fileHelp" class="form-text text-muted">Cambia o Sube una nueva Imagen</small>
                                <div class="text-danger"> </div>
                                
                            </div>
                            <div id="GroupNotificacionSubida"> </div>
                            <br>
                            <div id="success"></div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success rounded-pill btn-xl" id="sendUpdate" value="Actualizar" />
                                <button type="button" class="btn btn-danger rounded-pill btn-xl" id="cancel">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
            <!-- Register Section Form -->
            

        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?= base_url('Admin_page/css/js/bootstrap.min.js') ?>"></script>
    <script>document.write("<script type='text/javascript' src='<?= base_url('assets/js/JEditTema.js') ?>?v=" + Date.now() + "'><\/script>");</script>

</body>

</html>