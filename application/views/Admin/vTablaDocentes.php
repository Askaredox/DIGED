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
    <title>Docentes</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg text-uppercase  bg-primary fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Administracion') ?>"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid"></a>
            </div>
            <a role="button" class="btn btn-primary  btn-lg bg-secondary" href="<?= base_url('Administracion') ?>" style="color: white;">HOME
                <i class="fas fa-home"></i>
            </a>

    </nav>
    <!-- CAMBIANDO ESTO A VER SI SE VE TABLA DE DOCENTES -->
    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <div class="container bg-primary" style="height: 110px;"></div>
            <div class="card mb-4">
                <h1 class="display-4">DOCENTES</h1>
            </div>
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
        <div class="card mb-4">
            <!--empieza la tablilla-->
            <div class="card-header"><i class="fas fa-table mr-1"></i>DOCENTES-REGISTRADOS
                <input id="TEMPName" type="hidden">
                <input id="TEMPLastname" type="hidden">
                <input id="TEMPPassword" type="hidden">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary">
                            <tr class="text-center text-light text-uppercase">
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-primary">
                            <tr class="text-center text-light text-uppercase">
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($data as $docente) : ?>
                                <tr>
                                    <th class="text-center" scope="row"><?= $docente['Id_Usuario'] ?></th>
                                    <td><?= strtoupper($docente['Nombre']); ?></td>
                                    <td><?= strtoupper($docente['Apellido']); ?></td>
                                    <td style=" white-space: nowrap; width: 1px;">
                                        <input class="contraseniaOculta" type="password" style="border: 0;  background-color:#FFFFFF;" id="p" name="p" value="<?= $docente['Contraseña'] ?>" disabled size="12">
                                        <a type="button " class="btn btn-outline-primary btn-sm " id="VerContrasenia">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                    </td>
                                    <td class="text-center" style=" white-space: nowrap; width: 1px;">
                                        <button type="button " class="btn btn-primary btn-sm" data-toggle="modal" data-id="<?= $docente['Id_Usuario'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button " class="btn btn-danger btn-sm btn-eliminar" data-toggle="modal" data-id="<?= $docente['Id_Usuario'] ?>" role="button">
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


    <!-- Modal ACTUALIZAR FORM-->

    <!--editar en MODAL-->
    <div class="modal fade" id="EDITAR" tabindex="-1" role="dialog" aria-labelledby="EDITAR" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EDITARtitle">ACTUALIZAR DATOS DOCENTE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Register Section Form -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 mx-auto">
                                <form name="UpdateDocenteForm" id="UpdateDocenteForm" novalidate="novalidate" autocomplete="nope">
                                    <div class="form-group">
                                        <label>Codigo Docente</label>
                                        <input class="form-control" name="cod" id="cod" type="text" readonly>
                                    </div>
                                    <div class="form-group">

                                        <label>Nombre</label>
                                        <input class="form-control" name="name" id="name" type="text" autocomplete="nope" value="">
                                    </div>
                                    <div class="form-group">

                                        <label>Apellido</label>
                                        <input class="form-control" name="lastname" id="lastname" type="text" placeholder="Apellido" autocomplete="nop" value="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="show1" id="show1" onclick="MostrarContrasenia()" />
                                            </div>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" autocomplete="nope" value="">
                                        <button class="btn btn-success" type="button" id="confirm">
                                            <i class="fas fa-check-double"></i>
                                        </button>
                                        <a href="#" title="" data-toggle="popover" data-placement="top" data-content="¡CAMPO NO VÁLIDO!" id="pop3"></a>
                                    </div>
                                    <div class="collapse" id="ConfirmarContraseña">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="show" id="show" onclick="MostrarContrasenia2()" />
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" id="password2" placeholder="Confirmar Contraseña" name="password2" value="" autocomplete="nop">
                                            <button class="btn btn-success" type="button" id="verificar">
                                                <i class="fas fa-check-double"></i>
                                            </button>
                                            <a href="#" title="Verficación" data-toggle="popover" data-placement="top" data-content="Contraseñas Iguales" id="pop1"></a>
                                            <a href="#" title="Verficación" data-toggle="popover" data-placement="top" data-content="Contraseñas NO Iguales" id="pop2"></a>
                                            <a href="#" title="Verficación" data-toggle="popover" data-placement="top" data-content="Debe llenar el campo de confirmación" id="pop4"></a>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success rounded-pill btn-xl" id="sendUpdate" value="Actualizar" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded-pill btn-xl" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ELIMINAR-->
    <div class="modal fade" id="ELIMINAR" tabindex="-1" role="dialog" aria-labelledby="ELIMINAR" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ELIMINARtitle">Eliminar Docente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="CodUser" class="col-sm-2 col-form-label">Codigo Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="CodUser">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NombreEliminar" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="NombreEliminar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ApellidoEliminar" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="ApellidoEliminar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="ConfirmDelete" class="btn btn-success">Si</button>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?= base_url('Admin_page/css/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Admin_page/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Admin_page/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('Admin_page/js/Tabla_Docentes_Form.js') ?>"></script>
</body>

</html>