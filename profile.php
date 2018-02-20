<?php 
    session_start();
    include("php/dbconn.php");
    include("php/sessionExpire.php");
    if(!$_SESSION['login_user']){
         header("location:index.php");
        die('Could not connect to database'. mysqli_connect_error());
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="img/tronrud-icon.png" />
        <!-- Custom CSS -->
        <!--<link href="Sass/main.css" rel="stylesheet"> -->
        <!-- Bootstrap 4 -->
        <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <!-- Fontawesome 5 -->
        <link rel="stylesheet" type="text/css" href="static/fontawesome/on-server/css/fontawesome-all.css">
        <title>Profil</title>
    </head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card card-body m-10">
                        <form id="searchForm">
                            <img src="img/tronrud-engineering-logo-svart.svg" class="float-left" alt="logo" width="200px">
                            <div class="row float-right mt-3 mr-1">
                              <div class="form-group">
                                <input type="text" name="Thing" class="form-control input-sm" id="searchBar" placeholder="Search">
                              </div>
                              <div class="form-group">
                                <input type="submit" class="form-control btn btn-dark" value="Search" id="searchBtn">
                              </div>                                
                            </div>
                        </form>
                        <table class="table mt-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Item Id</th>
                                </tr>
                            </thead>
                            <div id="items">
                              <tbody id="itemTable">
                         
                              </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
          </div>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script defer src="static/fontawesome/fontawesome-all.js"></script> <!--lurer på om vi kan fjerne JS linken over -->
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>