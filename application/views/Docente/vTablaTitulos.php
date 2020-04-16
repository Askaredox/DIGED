<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?= base_url('Admin_page/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel='stylesheet' href="<?= base_url('Admin_page/css/css/bootstrap.min.css') ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="stylesheet" href="<?= base_url('Admin_page/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') ?>" />
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <title>TITULOS</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg text-uppercase  bg-primary fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Titulo/Dashboard/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="scrollto"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid">
                </a>
            </div>
            <button type="button " class="btn btn-primary btn-lg bg-secondary" role="button">
                <a href="<?= base_url('Titulo/Dashboard/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" style="color: white;"><i class="fas fa-arrow-left"></i></a>

            </button>
    </nav>
    <!-- CAMBIANDO ESTO A VER SI SE VE TABLA DE CURSOS -->
    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <div class="container bg-primary" style="height: 110px;"></div>
            <div class="card mb-4">
                <h1 class="display-4">TITULOS </h1>

                <div id="notificacion">
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

            </div>
            <div class="card mb-4">
                <!--empieza la tablilla-->
                <div class="card-header"><i class="fas fa-table mr-1"></i>
                    Listado Titulos
                    <input type="text" id="TEMPCodCurso" name="TEMPCodCurso" value="<?= $this->uri->segment(3) ?>">
                    <input type="text" id="TEMPCodTema" name="TEMPCodTema" value="<?= $this->uri->segment(4) ?>">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <!--DEFINIR CABECERAS, NUMERO DE COLUMNAS EN ACCION VAN LOS BOTONES DE EDITAR O BORRAR-->
                            <thead>
                                <tr class="text-center text-uppercase">
                                    <th>Titulo</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <!--DEFINICIION DE PIES DE TABLA -->
                            <tfoot>
                                <tr class="text-center text-uppercase">
                                    <th>Titulo</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                            <!--INSERCIÓN DE DATOS TODAS SON  DATO2, DATO3, BOTONES DE ACCIONES-->
                            <tbody>
                                <?php foreach ($data as $titulo) : ?>
                                    <tr id="<?= "fila" . $titulo['Id_Titulo'] ?>">
                                        <td><?= strtoupper($titulo['Nombre']); ?></td>
                                        <td class="text-center">
                                            <a type="button " class="btn btn-secondary btn-sm " id="VerTitulo" role="button" href="#" data-id="<?= $titulo['Id_Titulo'] ?>" data-tema="<?= $titulo['Tema'] ?>">
                                                <i class="fas fa-eye"></i> <!-- aquí iría lo de agregar el contenido-->
                                            </a>
                                            <a class="scrollto" href="#EDITAR" style="color: white;">
                                                <button type="button " class="btn btn-primary btn-edit btn-sm" role="button" data-id="<?= $titulo['Id_Titulo'] ?>" data-tema="<?= $titulo['Tema'] ?>" data-pos="<?= $titulo['Coordenadas'] ?>" data-curso="<?= $this->uri->segment(3)  ?>" data-tipo="<?= $titulo['tipoEnlace'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <button type="button " id="BDelete" class="btn btn-danger btn-eliminar btn-sm " data-toggle="modal" data-id="<?= $titulo['Id_Titulo'] ?>" data-tema="<?= $titulo['Tema'] ?>" data-curso="<?= $this->uri->segment(3) ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- SECCIÓN EDITAR COMPLETA-->
        <section class="page-section" id="EDITAR">
            <div class="container pt-5">


                <!-- Contact Section Heading -->
                <header>
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">EDITAR TITULO</h2>

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
                        <div id="notificacion2">
                        </div>
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <div class="container-sm">
                            <form class=" col-md-12 col-sm-8" name="UpdateForm" id="UpdateForm">
                                <div class="form-group" id="GroupCod">
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="Curso" id="Curso" placeholder="Codigo del Curso" hidden>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="Tema" id="Tema" placeholder="Codigo del Tema" hidden>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="Titulo" id="Titulo" placeholder="Codigo del Titulo" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  col-md-12 col-sm-8" id="GroupName">
                                    <label for="Nombre">Nombre Titulo</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre del Titulo">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group  col-md-12 col-sm-8" id="GroupPos">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="pos" id="pos" placeholder="Posicion del Titulo" readonly>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo enlace" readonly>
                                        </div>
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
                                        <div class="row">
                                            <div class="form-check">
                                                <input type="checkbox" name="circ" id="circ" onclick="Circular(this)" />
                                                <label class="form-check-label" for="circ">
                                                    Enlace Circular
                                                </label>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-sm rounded-pill" id="BorrarButtonButton">Deshacer</button>'
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

                                        <div class="row">
                                            <div class="form-check">
                                                <input type="checkbox" name="Poly" id="Poly" onclick="Libre(this)" />
                                                <label class="form-check-label" for="Poly">
                                                    Enlace Libre
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
                                                    <img src="<?= base_url($img) ?>" class="map grande" alt="" id="imagenTema" crossorigin="anonymous" usemap="#mapeo" width="600">
                                                </div>
                                            </div>
                                        </div>


                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success rounded-pill btn-xl" id="sendUpdate" value="Actualizar" />
                                    <button type="button" class="btn btn-danger rounded-pill btn-xl" id="cancel">Cancelar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- Modal ELIMINAR CURSO PENDIENTE-->
        <div class="modal fade" id="EliminarModal" tabindex="-1" role="dialog" aria-labelledby="ELIMINAR" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ELIMINARtitle">Eliminar Titulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="TituloEliminar" class="col-sm-2 col-form-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="TituloEliminar" name="TituloEliminar">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="ButtonConfirm">Si</button>
                    </div>
                </div>
            </div>
        </div>


        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?= base_url('Admin_page/css/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Admin_page/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Admin_page/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/tabla_Titulos.js') ?>"></script>


</body>

</html>