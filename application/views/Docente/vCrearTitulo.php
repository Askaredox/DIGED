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
<!-- include libraries(jQuery, bootstrap) -->


</head>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Titulo/Administrar/' . $this->uri->segment(3) . '/' . $this->uri->segment(4))  ?>" class="scrollto"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid"></a>
            </div>

            <button type="button " class="btn btn-primary btn-lg bg-secondary" role="button">
                <a href="<?= base_url('Titulo/Administrar/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" style="color: white;"><i class="fas fa-arrow-left"></i></a>

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

                <div class="col-lg-8 col-sm-12 mx-auto">
                    <div id=notificacion>
                        <!--MENSAJE DE BIENVENIDA TEMPORAL-->
                        <?php if ($dat = $this->session->flashdata('msg')) : ?>
                            <div class="container-sm">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?= $dat ?></strong>

                                    


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
                    <div class="container-fluid">
                        <form class=" col-md-12 col-sm-12" name="RegisterTitle" id="RegisterTitle">
                            <div class="form-group" id="GroupCod">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="Curso" id="Curso" placeholder="Codigo del Curso" value="<?= $this->uri->segment(3) ?>" hidden>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="Tema" id="Tema" placeholder="Codigo del Tema" value="<?= $this->uri->segment(4) ?>" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  col-md-12 col-sm-8" id="GroupName">
                                <label for="Nombre">Nombre Titulo</label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre del Titulo">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group" id="GroupImg">
                                <!--iria la imagen para  hacer el mapeo-->

                                <?php if (isset($img)) : ?>
                                    <div class="form-group  col-md-12 col-sm-8" id="GroupPos">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" name="pos" id="pos" placeholder="Posicion del Titulo" readonly>
                                                <div class="invalid-feedback">
                                                    Debe crear el area para redirigir al contenido del título
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo enlace" readonly>
                                                <div class="invalid-feedback">
                                                    Debe crear el area para redirigir al contenido del título
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-check">
                                            <input type="checkbox" name="circ" id="circ" onclick="Circular(this)" />
                                            <label class="form-check-label" for="circ">
                                                Enlace Circular
                                            </label>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-sm rounded-pill" id="BorrarButton">Deshacer</button>'
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-check">
                                            <input type="checkbox" name="Rect" id="Rect" onclick="Rectangular(this)" />
                                            <label class="form-check-label" for="Rect">
                                                Enlace Rectangular
                                            </label>
                                        </div>
                                    </div>
                                    <div class="collapse form-group" id="FormCircular">
                                        <div class="card card-body">
                                            <button type="button" class="close" id="cerrar">
                                                <span>&times;</span>
                                            </button>
                                            <form>
                                                <div id="form2"></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <img src="<?= base_url($img) ?>" class="img-fluid map  grande" alt="" id="imagenTema" crossorigin="anonymous" usemap="#mapeo" width="600">
                                            </div>
                                        </div>
                                    </div>
                                    <map name="mapeo" id="mapeo">
                                    </map>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="container">
                                        <h2 style="text-align:center;">CONTENIDO</h2>
                                        <textarea id="summernote" name="editordata" style="z-index:0; position:relative"></textarea>
                                        <input type="submit" class="btn btn-primary btn-xl" id="submit" name="submit" value="REGISTRAR" />
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <?php if (isset($data)) : ?>
        <?php foreach ($data as $titulo) : $title = $titulo["Nombre"] ?>
            <?php
            $X = $titulo["Coordenadas"];
            $tipo = $titulo['tipoEnlace'];

            ?>
            <script type="text/javascript">
                $alturaOrigin = "<?php echo $alto ?>"; //estos sacarlos de la base
                $anchoOrigin = "<?php echo $ancho ?>"; //estos sacarlos de la base

                $type = "<?php echo $tipo ?>";
                $Coordenada = "<?php echo $X ?>";

                if ($type == 1) {
                    $dividida1 = $Coordenada.split(',')

                    $x1 = Math.round(($dividida1[0] * document.getElementById('imagenTema').width) / $anchoOrigin)

                    $y1 = Math.round(($dividida1[1] * document.getElementById('imagenTema').height) / $alturaOrigin)

                    $radio = Math.round(($dividida1[2] * document.getElementById('imagenTema').width) / $anchoOrigin)

                    $enlace = $x1 + "," + $y1 + "," + $radio
                    document.getElementById('mapeo').innerHTML += "<area id=\"titulo\" class=\"title\" alt=\"\" href=\"#\" shape=\"circle\" coords=\"" + $enlace + "\" onclick=\"mostrarTitulo('<?php echo $title; ?>')\" data-maphilight=\'{\"alwaysOn\":true}\'>"
                } else {
                    //alert("rectangular" + $Coordenada);
                    $dividida2 = $Coordenada.split(',')
                    $x1 = Math.round(($dividida2[0] * document.getElementById('imagenTema').width) / $anchoOrigin)
                    $y1 = Math.round(($dividida2[1] * document.getElementById('imagenTema').height) / $alturaOrigin)
                    $x2 = Math.round(($dividida2[2] * document.getElementById('imagenTema').width) / $anchoOrigin)
                    $y2 = Math.round(($dividida2[3] * document.getElementById('imagenTema').height) / $alturaOrigin)

                    $enlace = $x1 + "," + $y1 + "," + $x2 + "," + $y2
                    document.getElementById('mapeo').innerHTML += "<area id=\"titulo\"  class=\"title\" alt=\"\" href=\"#\" shape=\"rect\" coords=\"" + $enlace + "\" onclick=\"mostrarTitulo('<?php echo $title; ?>')\" data-maphilight=\'{\"alwaysOn\":true}\'>"
                }
            </script>
        <?php endforeach ?>
    <?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script>document.write("<script type='text/javascript' src='<?= base_url('assets/js/summernote.min.js') ?>?v=" + Date.now() + "' defer><\/script>");</script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?= base_url('Admin_page/css/js/bootstrap.min.js') ?>"></script>
    <script>document.write("<script type='text/javascript' src='<?= base_url('assets/js/JDocente.js') ?>?v=" + Date.now() + "'><\/script>");</script>

    <script type='text/javascript' src='<?= base_url('assets/js/jquery.maphilight.min.js') ?>'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.map').maphilight({
                alwaysOn: true
            });
            $('#summernote').summernote({
                height: 300, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true // set focus to editable area after initializing summe
            });
            // uncomment this line for normal hover highlighting
            // $('.map').maphilight();
        });
    </script>

</body>

</html>