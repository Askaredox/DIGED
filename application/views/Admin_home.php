<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DEDEV-ADMINISTRADOR</title>

  <!-- Custom fonts for this theme -->
  <link href="/DIGED/Admin_page/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
    type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
    rel="stylesheet">

  <!-- Theme CSS -->
  <link href="/DIGED/Admin_page/css/freelancer.min.css" rel="stylesheet">
  <link rel='stylesheet' href="/DIGED/Admin_page/css/css/bootstrap.min.css">
</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-primary text-uppercase  text-sm fixed-top" id="mainNav">
    <div class="container">
      <div class="logo float-left">
        <!--LOGO-->
        <a href="#intro" class="scrollto"><img src="/DIGED/Admin_page/img/dedev (3).png" alt="Responsive image"
            class="img-fluid"></a>
      </div>
      <button
        class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-secondary text-white rounded"
        type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse align-items-center" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#intro">HOME</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#CURSOS">CURSOS</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#DOCENTES">DOCENTES</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto">CONTACTO</a>
          </li>
          <li class="nav-item dropdown mx-0 mx-lg-1">
            <div class="dropdown">
              <a class="nav-link dropdown-toggle py-3 px-0 px-lg-3 rounded" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                USUARIO<i class="fas fa-user"></i>
              </a>

              <div class="dropdown-menu bg-info " aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-white" type="button" class="btn" data-toggle="modal"
                  data-target="#EDITARUSER"><i class="fas fa-user-edit"></i>Editar</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-white" type="button" class="btn" data-toggle="modal"
                  data-target="#CERRARSESSION"><i class="fas fa-power-off"></i> Salir</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead -->
  <section id="intro">
    <header class="bg-secondary text-white text-center" style="padding-top: calc(6rem + 50px);
    padding-bottom: 6rem;">

      <!-- Masthead Avatar Image -->
      <img class="mt-20" src="/DIGED/Admin_page/img/admin.png" alt="" style="width: 15rem;">

      <!-- Masthead Heading -->
      <h3 class="masthead-heading text-uppercase mb-0">ADMINISTRACIÓN</h3>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">SISTEMA ADMINISTRADOR DE CURSOS DEDEV</p>


    </header>
  </section>


  <!-- Cursos Section -->
  <section class="page-section portfolio" id="CURSOS">
    <div class="container-sm">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary">CURSOS</h2>

      <!-- Icon Divider -->
      <div class="divider-custom text-white">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon ">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- CURSOS Grid Items -->
      <div class="row">

        <!-- Portfolio Item 1 crear curso -->
        <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="portfolio-item mx-auto bg-secondary text-center" data-toggle="modal"
            data-target="#portfolioModal1">
            <h5 class="display-8 text-white">CREAR CURSOS</h5>
            <div
              class="portfolio-item-caption d-flex bg-primary  align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <h4 class="display-7">CREAR CURSOS</h4>
                <i class="fas fa-hand-pointer fa-3x"></i>
              </div>
            </div>
            <div class="container align-self-center mx-0">
              <img class="img-fluid" src="/DIGED/Admin_page/img/portfolio/crear2.png" alt="">
            </div>
          </div>
        </div>

        <!-- Portfolio Item 2  administrar cursos-->
        <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="portfolio-item mx-auto bg-secondary  text-center" data-toggle="modal"
            data-target="#portfolioModal2">
            <h5 class="display-8 text-white ">ADMINISTRAR CURSOS</h5>
            <div
              class="portfolio-item-caption d-flex  bg-primary  align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <h4 class="display-7">ADMINISTRAR CURSOS</h4>
                <i class="fas fa-hand-pointer fa-3x"></i>
              </div>
            </div>
            <div class="container align-self-center mx-0">
              <img class="img-fluid" src="/DIGED/Admin_page/img/portfolio/modificarCurso2.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
  </section>

  <!-- Docentes Section -->
  <section class="page-section portfolio bg-secondary text-white mb-0 " id="DOCENTES">
    <div class="container">
      <!-- DOCENTES Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-light mb-0">DOCENTES</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line bg-light"></div>
        <div class="divider-custom-icon ">
          <i class="fas fa-star" style="color: white;"></i>
        </div>
        <div class="divider-custom-line bg-light"></div>
      </div>


      <div class="row">

        <!-- Portfolio Item 3  crear docente-->
        <div class="col-sm-12 col-md-6 col-lg-6">
          <a href="/DIGED/Admin_page/RegistroDocentes.html">
            <div class="portfolio-item mx-auto bg-secondary">
              <h5 class="display-7 text-center">REGISTRAR DOCENTE</h5>
              <div
                class="portfolio-item-caption d-flex align-items-center bg-primary  justify-content-center h-100 w-100"
                id="caption3">
                <div class="portfolio-item-caption-content  text-center text-white">
                  <h5 class="display-7 ">REGISTRAR DOCENTE</h5>
                  <i class="fas fa-hand-pointer fa-3x"></i>
                </div>

              </div>
              <div class="container align-self-center mx-0 ">
                <a href="" title="Docente" data-toggle="popover" data-placement="top" data-content="Registrar Docentes"
                  id="pop3"></a>
                <img class="img-fluid" src="/DIGED/Admin_page/img/portfolio/docente2.png" alt="">
              </div>
            </div>
          </a>
        </div>

        <!-- Portfolio Item 4  modificar o borrar docentes-->
        <div class="col-sm-12 col-md-6 col-lg-6">
          <a href="/DIGED/Admin_page/TablaDocentes.html">
            <div class="portfolio-item mx-auto bg-secondary">
              <h5 class="display-7 text-center">ADMINISTRAR DOCENTES</h5>
              <div
                class="portfolio-item-caption d-flex align-items-center bg-primary  justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white">
                  <h4 class="display-7">ADMINISTRAR <br> DOCENTES</h4>
                  <i class="fas fa-hand-pointer fa-3x"></i>
                </div>

              </div>
              <div class="container align-self-center mx-0">
                <img class="img-fluid" src="/DIGED/Admin_page/img/portfolio/editarProfesor2.png" alt="">
              </div>
            </div>
          </a>
        </div>
      </div>
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
  <div class="modal fade" id="CERRARSESSION" tabindex="-1" role="dialog" aria-labelledby="CERRARSESSION"
    aria-hidden="true">
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
          <button type="button" class="btn btn-primary">Si</button>
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
            <form class="needs-validation" name="sentMessage" id="UpdatePassword" novalidate>
              <div class="control-group">
                <label for="validationCustom01">NUEVA CONTRASEÑA</label>
                <input type="text" class="form-control" id="pass1" placeholder="contraseña" required>
                <div class="valid-feedback">
                  CONTRASEÑA
                </div>
                <div class="invalid-feedback">
                  Por favor Ingresa una nueva contraseña
                </div>
              </div>
              <div class="form-group">
                <label for="validationCustom01">CONFIRMACIÓN</label>
                <input type="text" class="form-control" id="pass2" placeholder="nueva contraseña" required>
                <div class="valid-feedback">
                  NUEVA CONTRASEÑA
                </div>
                <div class="invalid-feedback">Por favor ingresa de nuevo la contraseña.</div>
                <a href="#" title="Verficación" data-toggle="popover" data-placement="top"
                  data-content="Contraseñas Iguales" id="pop1"></a>
                <a href="#" title="Verficación" data-toggle="popover" data-placement="top"
                  data-content="Contraseñas NO Iguales" id="pop2"></a>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group ">
                <input type="submit" class="btn btn-secondary rounded-pill btn-xl bg-secondary" id="actualizarPass"
                  value="Cambiar Contraseña" />
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

  <!-- Portfolio Modals -->
  <!-- Portfolio Modal CREAR CURSO-->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog"
    aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body">
          <div class="container-md">
            <div class="row justify-content-center">
              <div class="col-lg-8 ">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase text-center mb-0">Crear Curso</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <div class="row">
                  <div class="col-lg-10 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <form class="needs-validation" name="sentMessage" id="registerForm" novalidate>
                      <div class="control-group">
                        <label for="validationCustom01">Nombre Curso</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Curso" required>
                        <div class="valid-feedback">
                          Válido
                        </div>
                        <div class="invalid-feedback">
                          Por favor Ingresa el nombre del Curso
                        </div>
                      </div>
                      <div class="form-group">
                        <select class="custom-select" searchable="Search here.." required>
                          <option value="" disabled selected>Seleccione un profesor</option>
                          <option value="1">Luis Espino</option>
                          <option value="2">Francisco Guevara</option>
                          <option value="3">Erik Ruiz</option>
                        </select>
                        <div class="invalid-feedback">Por favor selecciona un profesor.</div>
                      </div>
                      <br>
                      <div id="success"></div>
                      <div class="form-group ">
                        <input type="submit" class="btn btn-secondary rounded-pill btn-xl bg-secondary"
                          id="sendMessageButton" value="Registrar Curso" />
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 2 DIRIGIR A LA PAGINA TablaCursos.html para editarlos o eliminarlos -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog"
    aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-justify">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0 text-center">ADMINISTRAR CURSOS</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <h4>
                  <p class="mb-5">En esta sección puede eliminar y editar los cursos existentes, cambiar
                    el profesor que la imparte, y los datos del curso.
                  </p>
                </h4>
                <div class="row justify-content-center">
                  <a class="btn btn-primary rounded-pill" href="/DIGED/Admin_page/TablaCursos.html">
                    IR A SECCIÓN
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="/DIGED/Admin_page/vendor/jquery/jquery.min.js"></script>
  <script src="/DIGED/Admin_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/DIGED/Admin_page/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="/DIGED/Admin_page/js/jqBootstrapValidation.js"></script>
  <script src="/DIGED/Admin_page/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/DIGED/Admin_page/js/freelancer.min.js"></script>

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

</body>

</html>