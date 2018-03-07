<?php 
    include("../php/includes/dbconn.php");
    include("../php/includes/sessionExpire.php");
    include("../php/includes/session.php")
?>
<!DOCTYPE html>
<html class="pages" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Tittel samt ikon -->
    <title>Tronrud</title>
    <link rel="shortcut icon" href="../img/tronrud-icon.png"/>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" type="text/css" href="../static/fontawesome/on-server/css/fontawesome-all.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../Sass/main.css"/>
  </head>
    <body class="pages">
    <?php include 'navbar.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto my-2">
                    <div class="card card-body m-10">
                        <form id="search-form" class="d-flex justify-content-between align-items-center">
                            <!--<img class="" src="../img/tronrud-engineering-logo-svart.svg" alt="logo" width="200px">-->
                            <a class="btn btn-md btn-tronrud-primary" href="../php/home.php">
                                <i class="fas fa-arrow-alt-circle-left fa-lg align-middle mr-1"></i><b>Back</b>
                            </a>
                            <div class="row ml-auto mr-3 mt-3">
                              <div class="form-group">
                                <input type="text" class="form-control input-sm" id="search-bar" placeholder="Search">
                              </div>
                              <div class="form-group">
                                <input type="submit" class="form-control btn btn-dark" value="Search" id="searchBtn">
                              </div>                       
                            </div>
                        </form>

                        <div id="form-messages"></div>
                        <table class="table mt-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Item Id</th>
                                </tr>
                            </thead>
                            <div id="items">
                              <tbody id="item-table">
                         
                              </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
          </div>

<!-- Legger til footer fra filen 'footer.php' -->
<?php include 'footer.php' ?>

    <!-- Scripts -->
    <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../static/fontawesome/fontawesome-all.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/ajaxForm.js"></script>
    <!-- Scripts -->
    </body>
</html>