<?php
include('php/login.php'); // Inkluderer Login Script
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Tittel samt ikon -->
    <title>Tronrud</title>
    <link rel="shortcut icon" href="img/tronrud-icon.png"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="Sass/login.css"/>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" type="text/css" href="static/fontawesome/on-server/css/fontawesome-all.min.css"/>
  </head>

  <body class="text-center">  
  <div id="bg">
    <img src="img/TronrudBackground.jpg">
  </div>
    <!-- Login form -->
    <form class="form-signin mx-auto d-block" method="post" action="">
      <img class="mb-4" src="img/tronrud-engineering-logo-svart.svg" alt="" width="320" height="160">
      <!-- Feilmelding -->
      <?php echo $result; ?>
      <!-- Username input -->
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
          <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
      </div>
      <!-- Password input -->
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
      <!-- "Remember me" -->
      <div class="custom-control custom-checkbox mb-3 mt-3 text-left">
        <input type="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1"></label>Remember me</label>
        <!--<a href="#" class="float-right" data-toggle="modal" data-target="#exampleModal">
          Need help?
          <i class="fas fa-envelope fa-lg text-tronrud-primary"></i>
        </a>-->
      </div>
      <!-- Innloggingsknappen -->
      <button class="btn btn-lg btn-tronrud-primary text-black btn-block" type="submit" name="submit">Sign in</button>
      <!-- Copyright -->
      <p class="mt-5 mb-0">&copy; 2018 Tronrud Engineering</p>
    </form>

<!-- Modal
<div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-tronrud-primary" id="exampleModalLabel">New message<i class="far fa-comment fa-lg ml-2"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="php/sendmail.php">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="E-mail" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message..." required></textarea>
          </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-tronrud-secondary" data-dismiss="modal">
          <i class="fas fa-times fa-sm mr-2"></i>Close</button>
          <button type="submit" name="submit" class="btn btn-tronrud-primary">
          <i class="fas fa-envelope fa-sm mr-2"></i>Send message
          </button>
        </form>
      </div>
    </div>
  </div>
</div> -->

    <!-- Scripts -->
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/popper.js/dist/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="static/fontawesome/fontawesome-all.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <!-- Scripts -->
  </body>
</html>
