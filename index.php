<?php
include('php/login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tronrud</title>

    <!-- Custom styles for this template -->
    <link href="Sass/main.css" rel="stylesheet">

<<<<<<< HEAD:index.html
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
=======
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <script defer src="static/fontawesome/fontawesome-all.js"></script>
>>>>>>> 05ad61f91370442a0b33883bb2371106e52576a1:index.php
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="">
      <img class="mb-4" src="img/tronrud-engineering-logo-svart.svg" alt="" width="320" height="160">
      <h1 class="h3 mb-3"></h1>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
          <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
      </div>
      
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
      
      <div class="custom-control custom-checkbox mb-3 text-left">
        <input type="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1"></label>Remember me</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      
      <span><?php echo $error; ?></span>
      
      <p class="mt-5 mb-3">&copy; 2018 Tronrud Engineering</p>
    </form>
  </body>
</html>
