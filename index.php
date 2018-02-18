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
    <title>Tronrud</title>
    <!-- Custom CSS -->
    <link href="Sass/main.css" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome 5 -->
    <script defer src="static/fontawesome/fontawesome-all.js"></script>
  </head>

  <body class="text-center">
  <div id="bg">
    <img src="img/TronrudBackground.jpg">
  </div>
    <!-- Login form -->
    <form class="form-signin" method="post" action="">
      <img class="mb-4" src="img/tronrud-engineering-logo-svart.svg" alt="" width="320" height="160">
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
      <div class="custom-control custom-checkbox mb-3 text-left">
        <input type="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1"></label>Remember me</label>
      </div>
      <!-- Innloggingsknappen -->
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      <!-- Feilmelding -->
      <span><?php echo $error; ?></span>
      <!-- Copyright -->
      <p class="mt-5 mb-3">&copy; 2018 Tronrud Engineering</p>
    </form>
  </body>
</html>
