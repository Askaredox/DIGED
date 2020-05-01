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
</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-primary text-uppercase text-sm static-top" id="mainNav">
    <div class="container">
        <!--LOGO-->
      <a class="scrollto navbar_brand" href="<?= base_url('HOME#intro') ?>">
        <img src="<?= base_url('Admin_page/img/dedev (3).png') ?>">
      </a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-secondary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse align-items-center" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded scrollto" href="#intro">HOME</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scrollto" href="#CURSOS">CURSOS</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scrollto" href="#contacto">CONTACTO</a>
          </li>
          <li class="nav-item dropdown mx-0 mx-lg-1">
            <div class="dropdown">
              <a class="nav-link dropdown-toggle py-3 px-0 px-lg-3 rounded" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                USUARIO<i class="fas fa-user"></i>
              </a>

              <div class="dropdown-menu bg-info " aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-white" type="button" class="btn" data-toggle="modal" data-target="#EDITARUSER"><i class="fas fa-user-edit"></i>Editar</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-white" type="button" class="btn" data-toggle="modal" data-target="#CERRARSESSION"><i class="fas fa-power-off"></i> Salir</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead -->
  <section id="intro" >
    <header class="bg-secondary text-white text-center" style="padding-top: 20px; padding-bottom: 1rem;">
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
        <!--
        <?php var_dump($data);
        var_dump(count($data));  ?>
        -->
      </div>

      
      <!-- Masthead Avatar Image -->
      <img class="mt-2 img-fluid" src="<?= base_url('assets/docente.png') ?>" alt="">

      
      <!-- Masthead Heading -->
      <h3 class="mt-4 masthead-heading text-uppercase">ADMINISTRACIÓN</h3>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light">SISTEMA ADMINISTRADOR DE CURSOS DEDEV</p>
    </header>
  </section>





  <!-- Cursos Section -->
  <section class="page-section portfolio bg-secondary" style="background-image: url('assets/Patron_Azul_.png'); background-repeat: repeat; " id="CURSOS">
    <h2 class="text-white" style="text-align:center;"> CURSOS </h2>
    <div class="container d-flex align-items-start">
      
      <!-- CURSOS Grid Items -->
      <div class="card-deck mx-auto justify-content-center">
        <?php foreach ($data as $curso) : ?>
          <div class="card mb-4 text-center bg-light" style=" min-width: 18rem; max-width: 18rem; border-radius: 25px;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= strtoupper($curso['Nombre']) ?></h5>
              <a type="button" class="btn mt-auto btn-info btn-md btn-block rounded-pill"  href="<?= base_url('Temas/Administrar/'. $curso['Cod_Curso']) ?>" data-id=<?= $curso['Cod_Curso'] ?>>VER TEMAS</a>
            </div>
          </div>
        <?php endforeach ?>


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

  <!--EDITAR USUARIO Y CERRAR SESIÓN-->
  <div class="modal fade" id="CERRARSESSION" tabindex="-1" role="dialog" aria-labelledby="CERRARSESSION" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title" id="SESSION">CERRAR SESION</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-danger">
          <p> ¿DESEA CERRAR SESIÓN?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <a role="button" class="btn btn-primary" href="cLogin/logout">Si</a>
        </div>
      </div>
    </div>
  </div>

  <!--EDITAR CONTRASEÑA-->
  <div class="modal fade" id="EDITARUSER" tabindex="-1" role="dialog" aria-labelledby="EDITARUSER" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title" id="EDITUSR">CAMBIAR CONTRASEÑA</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-lg-10 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <form id="UpdatePassword">
              <div class="form-group" id="Pw1">
                <label for="validationCustom01">NUEVA CONTRASEÑA</label>
                <input type="text" class="form-control" name="Pass1" id="Pass1" placeholder="contraseña">
                <div class="invalid-feedback">
                </div>
              </div>
              <div class="form-group" id="Pw2">
                <label for="validationCustom01">CONFIRMACIÓN</label>
                <input type="text" class="form-control" name="Pass2" id="Pass2" placeholder="nueva contraseña">
                <div class="invalid-feedback"></div>
              </div>
              <br>
              <div class="form-group ">
                <input type="submit" class="btn btn-secondary rounded-pill btn-xl bg-secondary" value="Cambiar Contraseña" />
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="<?= base_url('Admin_page/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Contact Form JavaScript -->
  <!--<script src="<//?=base_url('Admin_page/js/jqBootstrapValidation.js')?>"></script>-->
  <!-- Custom scripts for this template -->
  <script src="<?= base_url('Admin_page/js/freelancer.min.js') ?>"></script>
  <script>document.write("<script type='text/javascript' src='<?= base_url('assets/js/JDocente.js') ?>?v=" + Date.now() + "'><\/script>");</script>
</body>

</html>