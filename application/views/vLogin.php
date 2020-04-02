<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Aulas virtuales DIGED</title>
  <link rel='stylesheet' href="<?= base_url('Admin_page/css/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>

<body style="background-color: #002C76;">
  <div class="container text-white">
    <div class="row">
    <div class="col-sm-12 col-xs-12 col-md-4"> 
        <div class="space-top">
          <h3 class="text-center">Inicia Sesión</h3>
          <form class="form-signin" class="form-horizontal" id="frm_Login">
            <div class="form-group" id="alert">
            </div>
            <div class="form-group" id="Usr">
              <label class=""> Usuario </label>
              <input type="text" name="txtUser" id="txtUser" class="form-control" placeholder="" autofocus>
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group" id="Psw">
              <label class=""> Password </label>
              <input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group">
              <input class="btn btn-light rounded-pill btn-lg btn-block" type="submit" value="Entrar">
            </div>
          </form>
        </div>
      </div>

      <div class="col-md-1 hidden-xs hidden-sm">   
          <div class="border-login" style="border-right:1px solid white;"></div>
        </div>

        <div class="col-sm-6 col-md-5 hidden-xs hidden-sm" >
          <img width="130%" src="/DIGED/assets/teacher.svg">
        </div>

      </div>
    </div>
  </body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script src="<?= base_url('assets/js/JLogin.js')?>"></script>

</html>
<!-- vamos tu puedes :)-->