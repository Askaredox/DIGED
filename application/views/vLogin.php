<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Aulas virtuales DIGED</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/DIGED/assets/css/login.css">
  </head>
  
  <body>
    <div class="container">
      <div class="row">

        <div class="col-sm-12 col-xs-12 col-md-4">            
          <div class="space-top">
            <h3 class="text-center">Inicia Sesión</h3>
              
              <form class="form-signin" class="form-horizontal" action="<?php echo site_url('cLogin/user_login_process'); ?>">
                <label class=""> Usuario </label>
                <input type="text" name="txtUser" class="form-control" placeholder="" required autofocus>
            
                <label class=""> Password </label>
                <input type="password" name="txtPass" class="form-control" placeholder="" required>
                </br>
                <input class="btn btn-dark btn-lg btn-block" type="submit" value="Entrar">
              </form>
          </div>
        </div>
      
        <div class="col-md-1 hidden-xs hidden-sm">   
          <div class="border-login"></div>
        </div>

        <div class="col-sm-6 col-md-5 hidden-xs hidden-sm" >
          <img width="130%" src="/DIGED/assets/teacher.svg">
        </div>

      </div>
    </div>
  </body>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
  
</html>
<!-- vamos tu puedes :)-->