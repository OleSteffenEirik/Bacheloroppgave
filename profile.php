<?php 
    include("php/dbconn.php");
    include("php/sessionExpire.php");
    include("php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Tittel samt ikon -->
    <title>Tronrud</title>
    <link rel="shortcut icon" href="img/tronrud-icon.png"/>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" type="text/css" href="static/fontawesome/on-server/css/fontawesome-all.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="Sass/main.css"/>
  </head>
    <body class="d-flex align-items-baseline">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card card-body m-10">
                        <form id="search-form" class="d-flex justify-content-between align-items-center">
                            <img class="" src="img/tronrud-engineering-logo-svart.svg" alt="logo" width="200px">
                            <div class="row ml-auto mr-3 mt-3">
                              <div class="form-group">
                                <input type="text" class="form-control input-sm" id="search-bar" placeholder="Search">
                              </div>
                              <div class="form-group">
                                <input type="submit" class="form-control btn btn-dark" value="Search" id="searchBtn">
                              </div>                       
                            </div>
                            <!-- Logg ut -->
                            <a class="" href="php/logout.php">
                                <i class="fas fa-sign-out-alt fa-3x text-tronrud-secondary"></i>
                            </a>       
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
                              <tbody id="item-table">
                         
                              </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
          </div>  
    <!-- Scripts -->
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/popper.js/dist/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="static/fontawesome/fontawesome-all.min.js"></script>
    <script type="text/javascript">
            /* Script for count down/ teller ned tiden for time-out */
        const startTimer =(duration, display) => {
            let timer = duration, minutes, seconds;
            let end =setInterval(()=> {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;
                //display.textContent = seconds;

                if (--timer < 0) {
                    window.location = "../index.php";
                    clearInterval(end);
                }
            }, 1000);
        }

        // ES6 sin Arrow-funksjon.
        window.onload = () => {
            let fiveMinutes = 120, display = document.querySelector('#counter'); startTimer(fiveMinutes, display)
        };
    </script>
    <!-- Scripts -->
    </body>
</html>