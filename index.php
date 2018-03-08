<?php
/* 
Beskrivelse: 
    Utviklet av:
        Kontrollert av:
*/
?>
<!doctype html>
<html class="login" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Tittel -->
    <title>Tronrud Engineering</title>
    <!-- Ikon -->
    <link rel="shortcut icon" href="img/tronrud-icon.png"/>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" type="text/css" href="static/fontawesome/on-server/css/fontawesome-all.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="Sass/main.css"/>
  </head>

  <body class="text-center login">
  <!-- Bakgrunnsbilde -->  
  <div id="bg">
    <img src="img/TronrudBackground.jpg">
  </div>
    <!-- Login form -->
    <form id="ajaxFormCaptcha" class="form-signin" method="post" action="php/includes/login.php">
      <img class="mb-4" src="img/tronrud-engineering-logo.svg" alt="Tronrud logo" width="320" height="160">
      <!-- AJAX Output -->
      <div class="container">
        <div id="form-messages"></div>
      </div>
      <!-- E-mail input -->
      <div class="container input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
      </div>
      <!-- Password input -->
      <div class="container input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      </div>
      <!-- reCAPTCHA -->
      <div class="container text-center">
        <div class="g-recaptcha mb-3 d-inline-block" data-callback="onHuman" data-sitekey="6Le0nzsUAAAAAIuSj_4hjFI_a7Pxj2v8Coa4A7eR" data-size="normal"></div>
        <input type="hidden" id="captcha" name="captcha" value="">
      </div>
      <div class="container align-items-center d-flex justify-content-between">
        <div class="">
          <!-- Forgot password -->
          <a href="#" class="float-left text-white font-italic" data-toggle="modal" data-target="#exampleModal">
            Forgot password?
          </a>
        </div>
        <div class="">
          <!-- Innloggingsknappen -->
          <button class="btn btn-lg btn-tronrud-primary text-white text-center btn-block" type="submit" name="submit" id="login_button">
          <i id="signin-icon" class="fas fa-sign-in-alt fa-lg align-middle mr-1"></i>
          Sign in</button>
        </div>
      </div>
      <!-- Copyright -->
      <p class="mt-5 mb-0 lead text-white">&copy; <?php echo date('Y');?> Tronrud Engineering</p>
    </form>

<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-tronrud-primary" id="exampleModalLabel">Reset password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ajaxForm" method="post" action="php/includes/forgotPassword.php">
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="E-mail" required>
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
      </div>
        <div class="modal-footer">
          <button id="addSubmit" type="submit" name="submit" class="btn btn-tronrud-primary">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- |Scripts| -->

    <!-- jQuery -->
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Popper -->
    <script type="text/javascript" src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FontAwesome -->
    <script type="text/javascript" src="static/fontawesome/fontawesome-all.js"></script>

    <script type="text/javascript" src="js/ajaxForm.js"></script>
    <!--recaptcha -->
		<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>


    <!-- |Scripts| -->
  </body>
</html>
