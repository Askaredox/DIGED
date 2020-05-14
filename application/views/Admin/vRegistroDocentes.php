<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?= base_url('Admin_page/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('Admin_page/css/freelancer.min.css') ?>" rel="stylesheet">
    <link rel='stylesheet' href="<?= base_url('Admin_page/css/css/bootstrap.min.css') ?>">
    <title>Formulario Docente</title>
</head>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Administracion') ?>" class="scrollto"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid"></a>
            </div>
            <a role="button" class="btn btn-primary  btn-lg bg-secondary" href="<?= base_url('Administracion') ?>" style="color: white;">HOME
                <i class="fas fa-home"></i>
            </a>
    </nav>
    <!-- <div class="container-fluid bg-primary py-5">-->
    <section class="page-section" id="registrar">
        <div class="container pt-5">


            <!-- Contact Section Heading -->
            <header>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">REGISTRAR DOCENTE</h2>

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
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <form class="needs-validation" name="sentMessage" id="registerForm" novalidate>
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
                        <div class="form-group" id="CodGroup">
                            <label for="CodigoDocente">Código</label>
                            <input type="text" class="form-control" name="Codigo" id="Codigo" placeholder="Código del Docente" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group" id="NombreGroup">
                            <label for="Nombre">Nombre</label>
                            <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre Docente" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="control-group" id="ApellidoGroup">
                            <label for="Apellido">Apellido</label>
                            <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Apellido" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <label for="password">Contraseña</label>
                        <div class="input-group mb-3" id="PassGroup">
                            
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required >
                            
                            <div class="input-group-prepend">
                                <a type="button " class="btn btn-outline-primary btn-sm " id="VerContrasenia" onclick="MostrarContrasenia()">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                            <div class="input-group-prepend">
                            <button class="btn btn-primary " type="button" onclick="GenerarCotraseña()">Generar</button>
                            </div>
                            <div class="invalid-feedback" id="invalido">
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-xl" id="sendMessageButton" value="REGISTRAR" />
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
    <script src="<?= base_url('Admin_page/js/FormRegistroDocentes.js') ?>"></script>
    <!--<script src="<//?= base_url('Admin_page/js/Validation.js') ?>"></script>-->

</body>

</html>