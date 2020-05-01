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
    <!-- <div class="container-fluid bg-primary py-5">-->
    <section class="page-section" id="registrar">
        <div class="container pt-5">


            <!-- Contact Section Heading -->
            <header>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">REGISTRAR NUEVO TEMA</h2>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
            </header>

            <!-- Register Section Form -->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div id=notificacion>
                        <!--MENSAJE DE BIENVENIDA TEMPORAL-->
                        <?php if ($dat = $this->session->flashdata('msg')) : ?>
                            <div class="container-sm">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?= $dat ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php elseif ($dat = $this->session->flashdata('msge')) : ?>
                            <div class="container-sm">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?= $dat ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <form  name="RegisterTema" id="RegisterTema">
                        <div class="form-group" id="GroupCod">
                            <input type="text" class="form-control" name="Curso" id="Curso" placeholder="Codigo del Curso" value="<?=$this->uri->segment(3)?>" hidden>
                        </div>
                        <div class="form-group" id="GroupName">
                            <label for="Nombre_T">Nombre Tema</label>
                            <input type="text" class="form-control" name="Nombre_T" id="Nombre_T" placeholder="Nombre del Tema" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group" id="GroupImg">
                            <label for="image">Imagen</label>
                            <input type="file" class="form-control-file" id="image" name='image'>
                            <small id="fileHelp" class="form-text text-muted">&ensp;°&nbsp;El tipo de la imagen debe ser *.jpeg, *.jpg</small>
                            <small id="fileHelp" class="form-text text-muted">&ensp;°&nbsp;La altura de la imagen debe ser 400px o mayor</small>
                            <small id="fileHelp" class="form-text text-muted">&ensp;°&nbsp;La anchura de la imagen debe ser 400px o mayor</small>
                            <small id="fileHelp" class="form-text text-muted">&ensp;°&nbsp;No es obligatorio subir una imagen</small>
                            <div class="text-danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-xl" id="submit" name="submit" value="REGISTRAR" />
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?= base_url('Admin_page/css/js/bootstrap.min.js') ?>"></script>
    <script src=<?= base_url('assets/js/JCrearTema.js') ?>></script>

</body>

</html>