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

<title>Formulario Titulo</title>
</head>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Titulo/Dashboard/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="scrollto"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid"></a>
            </div>

            <button type="button " class="btn btn-primary btn-lg bg-secondary" role="button">
                <a href="<?= base_url('Titulo/Dashboard/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" style="color: white;"><i class="fas fa-arrow-left"></i></a>

            </button>
    </nav>
    <!-- <div class="container-fluid bg-primary py-5">-->
    <section class="page-section" id="registrar">
        <div class="container pt-5">


            <!-- Contact Section Heading -->
            <header>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">REGISTRAR NUEVO TITULO</h2>

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
                        <?php if (isset($data)) {
                            var_dump($data);
                        } ?>
                    </div>
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <form name="RegisterTitle" id="RegisterTitle">
                        <div class="form-group" id="GroupCod">
                            <input type="text" class="form-control" name="Curso" id="Curso" placeholder="Codigo del Curso" value="<?= $this->uri->segment(3) ?>" hidden>
                        </div>
                        <div class="form-group" id="GroupName">
                            <label for="Nombre">Nombre Titulo</label>
                            <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre del Titulo">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group" id="GroupImg">
                            <!--iria la imagen para  hacer el mapeo-->
                            <map name="mapeo" id="mapeo">
                                <?php if (isset($data)) : ?>
                                    <?php foreach ($data as $titulo) : $title = $titulo["Nombre"] ?>
                                        <?php
                                        $X = $titulo["Coordenadas"];
                                        $tipo = $titulo['tipoEnlace']
                                        ?>
                                        <?php if ($tipo === '1') : ?>
                                            <!--es figura circular-->
                                            <area id="titulo" title=<?= $title ?> class="title" alt="" href="#" shape="circle" coords="<?= $X ?>" onclick="mostrarTitulo('<?php echo $title; ?>')">
                                        <?php elseif ($tipo === '2') : ?>
                                            <!--es figura rectangular-->
                                            <area id="titulo" title=<?= $title ?> class="title" alt="" href="#" shape="rect" coords="<?= $X ?>" onclick="mostrarTitulo('<?php echo $title; ?>')">
                                        <?php else : ?>
                                            <!--Es poligono-->
                                            <area id="titulo" title=<?= $title ?> class="title" alt="" href="#" shape="poly" coords="<?= $X ?>" onclick="mostrarTitulo('<?php echo $title; ?>')">
                                        <?php endif; ?>
                                        <!--Es poligono-->

                                    <?php endforeach ?>
                                <?php endif; ?>
                            </map>
                            <?php if (isset($img)) : ?>


                                <div class="form-check">
                                    <input type="checkbox" name="circ" id="circ" onclick="Circular()" />
                                    <label class="form-check-label" for="circ">
                                        Enlace Circular
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="Rect" id="Rect" onclick="Rectangular()" />
                                    <label class="form-check-label" for="Rect">
                                        Enlace Rectangular
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="Poly" id="Poly" onclick="Libre()" />
                                    <label class="form-check-label" for="Poly">
                                        Enlace Libre
                                    </label>
                                </div>

                                <div class="collapse" id="FormCircular">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Centro</label>
                                                <input class="form-control" id="centrocirc" name="centrocirc" type="text" readonly>
                                            </div>
                                            <div class="col-2"></div>
                                            <!--para el codigo del curso a editar-->
                                            <div class="col-3">
                                                <label>Radio</label>
                                                <input class="form-control is-invalid" id="radiocirc" name="radiocirc" type="text"> 
                                                <small id="fileHelp" class="form-text text-muted ">Ingresa el tamaño del circulo</small>
                                            </div>
                                            <div class="col-3">
                                            <label>Generar</label>
                                                <button type="button" class="btn btn-success" id="GEnlaceCirc">Generar Enlace</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <img class="map grande" id="imagenTema" src="<?= base_url($img) ?>" crossorigin="anonymous" usemap="#mapeo" width="600">
                            <?php endif; ?>
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
    <script src=<?= base_url('assets/js/JDocente.js') ?>></script>
    <script type='text/javascript' src='<?= base_url('assets/js/jquery.maphilight.min.js') ?>'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.map').maphilight({
                alwaysOn: true
            });
            // uncomment this line for normal hover highlighting
            // $('.map').maphilight();
        });
    </script>

</body>

</html>