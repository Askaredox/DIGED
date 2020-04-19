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
    <title>TEMAS</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg text-uppercase  bg-primary fixed-top" id="mainNav">
        <div class="container">
            <div class="logo float-left">
                <a href="<?= base_url('Temas/' . $this->uri->segment(3)) ?>" class="scrollto"><img src="<?= base_url('Admin_page/img/dedev (3).png') ?>" alt="Responsive image" class="img-fluid">
                </a>
            </div>
            <a href="<?= base_url('HOME#intro') ?>" class="btn btn-primary btn-lg bg-secondary" role="button">
                HOME <i class="fas fa-home"></i>
            </a>
    </nav>
    <!-- CAMBIANDO ESTO A VER SI SE VE TABLA DE CURSOS -->
    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <div class="container bg-primary" style="height: 110px;"></div>
            <div class="card mb-4">
                <h1 class="display-4" style="text-align:center;"><?= $curso ?> </h1>
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
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col"> <h2>TEMAS</h2> </div>
                        <div class="col"> 
                            <a href="<?=base_url('Temas/Crear/' . $this->uri->segment(3)) ?>" class="btn bg-success float-right" role="button" style="color: white;">
                                Agregar tema   <i class="fas fa-plus"></i>
                            </a> 
                        </div>
                    </div>  
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <!--DEFINIR CABECERAS, NUMERO DE COLUMNAS EN ACCION VAN LOS BOTONES DE EDITAR O BORRAR-->
                            <thead>
                                <tr class="text-center text-uppercase">
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <!--DEFINICIION DE PIES DE TABLA -->
                            <tfoot>
                                <tr class="text-center text-uppercase">
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                            <!--INSERCIÓN DE DATOS TODAS SON  DATO2, DATO3, BOTONES DE ACCIONES-->
                            <tbody>
                                <?php if($data):?>
                                    <?php foreach ($data as $tema) : ?>
                                        <tr id="<?= "fila" . $tema['Cod_Tema'] ?>">
                                            <td><?= strtoupper($tema['Nombre_T']); ?></td>
                                            <td style="text-align:center;">
                                                <?php if($tema['Imagen']):?>
                                                    <img src="<?= base_url().$tema['Imagen']; ?>" height="80" width="80">
                                                <?php else:?>
                                                    <pre>NO IMAGE</pre>
                                                <?php endif;?>
                                            </td>
                                            <td class="text-center">
                                                <a type="button " class="btn btn-secondary btn-sm " id="VerTema" role="button" href="<?= base_url('Titulo/Dashboard/' . $tema['Curso'] . '/' . $tema['Cod_Tema']) ?>" data-id="<?= $tema['Cod_Tema'] ?>" data-curso="<?= $tema['Curso'] ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a type="button " class="btn btn-primary btn-sm " id="EditTema" role="button" href="<?= base_url('Temas/EditTema/' . $tema['Curso'] . '/' . $tema['Cod_Tema']) ?>" data-id="<?= $tema['Cod_Tema'] ?>" data-curso="<?= $tema['Curso'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!--
                                                <a class="scrollto" href="#EDITAR" style="color: white;">
                                                    <button type="button " class="btn btn-primary btn-sm" role="button" data-id="<? //$tema['Cod_Tema'] ?>" data-curso="<?// $tema['Curso'] ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                -->
                                                <button type="button " id="BDelete" class="btn btn-danger btn-eliminar btn-sm " data-toggle="modal" data-id="<?= $tema['Cod_Tema'] ?>" data-curso="<?= $tema['Curso'] ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal ELIMINAR CURSO PENDIENTE-->
        <div class="modal fade" id="EliminarModal" tabindex="-1" role="dialog" aria-labelledby="ELIMINAR" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ELIMINARtitle">Eliminar Tema</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="TemaEliminar" class="col-sm-2 col-form-label">Tema</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="TemaEliminar">
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?= base_url('Admin_page/css/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Admin_page/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Admin_page/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/tabla_Temas.js') ?>"></script>

</body>

</html>