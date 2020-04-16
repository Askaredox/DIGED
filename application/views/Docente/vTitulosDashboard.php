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
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg text-uppercase  bg-primary fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Temas/Administrar/' . $this->uri->segment(3)) ?>" class="scrollto"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid">
                </a>
            </div>
            <button type="button " class="btn btn-primary btn-lg bg-secondary" role="button">
                <a href="<?= base_url('Temas/Administrar/' . $this->uri->segment(3)) ?>" style="color: white;"><i class="fas fa-arrow-left"></i></a>
            </button>
    </nav>

    <!---->
    <section class="page-section portfolio" id="TITULOS">
        <div class="container-sm">


            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary">TITULOS</h2>

            <!-- Icon Divider -->
            <div class="divider-custom text-white">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon ">
                    <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div>

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
            <!-- CURSOS Grid Items -->
            <div class="row">

                <!-- Portfolio Item 1 crear Tema -->
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <a href="<?= base_url('Titulo/Crear/' . $this->uri->segment(3).'/'. $this->uri->segment(4)) ?>">
                        <div class="portfolio-item mx-auto bg-secondary text-center" id="CrearTema">
                            <h5 class="display-8 text-white">CREAR TITULO</h5>
                            <div class="portfolio-item-caption d-flex bg-primary  align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <h4 class="display-7">CREAR TITULO</h4>
                                    <i class="fas fa-hand-pointer fa-3x"></i>
                                </div>
                            </div>
                            <div class="container align-self-center mx-0">
                                <img class="img-fluid" src="<?= base_url('Admin_page/img/portfolio/crear2.png') ?>" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Portfolio Item 2  administrar Temas-->
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <a href="<?= base_url('Titulo/Administrar/' . $this->uri->segment(3).'/'. $this->uri->segment(4)) ?>">
                        <div class="portfolio-item mx-auto bg-secondary  text-center">
                            <h5 class="display-8 text-white ">ADMINISTRAR TITULOS</h5>
                            <div class="portfolio-item-caption d-flex  bg-primary  align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <h4 class="display-7">ADMINISTRAR TITULOS</h4>
                                    <i class="fas fa-hand-pointer fa-3x"></i>
                                </div>
                            </div>
                            <div class="container align-self-center mx-0">
                                <img class="img-fluid" src="<?= base_url('Admin_page/img/portfolio/modificarCurso2.png') ?>" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- /.row -->

        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center" id="contacto">
        <div class="container">
            <div class="row">

                <!-- Footer Social Icons -->
                <div class="col">
                    <h4 class="text-uppercase mb-4">DIVISION DE EDUCACIÓN A DISTANCIA EN ENTORNOS VIRTUALES </h4>
                    <a class="btn btn-outline-light btn-social mx-0" href="#">
                        <h2><i class="fab fa-fw fa-facebook-f"></i></h2>
                    </a>
                    <a class="btn btn-outline-light btn-social mx-0" href="#">
                        <h2> <i class="fas fa-globe"></i></h2>
                    </a>
                    <a class="btn btn-outline-light btn-social text-center ml-1" href="#">
                        <h2> <i class="fas fa-phone"></i></h2>
                    </a>

                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright Section -->
    <section class="copyright py-4 text-center text-white bg-primary">
        <div class="container">
            <small>Copyright &copy; Your Website 2019</small>
        </div>
    </section>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#intro">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?= base_url('Admin_page/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('Admin_page/js/freelancer.min.js') ?>"></script>
</body>

</html>