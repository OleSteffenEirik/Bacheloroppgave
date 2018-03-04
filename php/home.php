<?php
/* 
Beskrivelse: 
    Utviklet av:
        Kontrollert av:
*/

include("../includes/findProducts.php");
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
    <link rel="shortcut icon" href="../img/tronrud-icon.png"/>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" type="text/css" href="../static/fontawesome/on-server/css/fontawesome-all.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../Sass/main.css"/>
  </head>

  <body>

    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Oversikt over maskiner</h1>
          <p class="lead text-muted">Her får du oversikt over alle maskiner som er registrert på <?php echo $db_name; ?>.</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4 hovereffect">
              <div class="md-4 hovereffect">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="overlay">
                </div>
              </div>
              </a>
              <div class="card">
                <div class="card-body">
                  <?php echo $db_productname; ?>
                </div>
              </div>
            </div>
            <div class="col-md-4 hovereffect">
              <div class="md-4 hovereffect">
              <a href="#">
                <img class="card-img-top img-responsive" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="overlay">
                </div>
              </div>
              </a>
              <div class="card">
                <div class="card-body">
                  This is some text within a card body.
                </div>
              </div>
            </div>
            <div class="col-md-4 hovereffect">
              <div class="md-4 hovereffect">
              <a href="#">
                <img class="card-img-top img-responsive" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="overlay">
                </div>
              </div>
              </a>
              <div class="card">
                <div class="card-body">
                  This is some text within a card body.
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </main>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-tronrud-primary" id="exampleModalLabel"><?php echo $db_productname; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <img class="img-responsive" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="">
            </div>
            <div class="col-md-4 ml-auto">
              <p>Item ID: <?php echo $db_productid; ?></p>
              <p>Name: <?php echo $db_partname; ?></p>
              <p>Supplier name: <?php echo $db_productsupplier; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info">Detaljert visning</button>
        <button type="button" class="btn btn-success">Finn del</button>
      </div>
    </div>
  </div>
</div>

    <!-- Scripts -->
    <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../static/fontawesome/fontawesome-all.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <!-- Scripts -->
  </body>
</html>
