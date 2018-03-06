<?php
/* 
Beskrivelse: 
    Utviklet av:
        Kontrollert av:
*/
include("includes/session.php");
include("includes/findProducts.php");
?>
<!doctype html>
<html class="home" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Tittel samt ikon -->
    <title>Tronrud Engineering</title>
    <link rel="shortcut icon" href="../img/tronrud-icon.png"/>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" type="text/css" href="../static/fontawesome/on-server/css/fontawesome-all.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../Sass/main.css"/>
  </head>

  <body class="home">
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="display-4">Oversikt over maskiner</h1>
          <p class="lead">Her får du oversikt over alle maskiner som er registrert på <b><?php echo $db_name; ?>.</b></p>
        </div>
      </section>
      
      <div class="container">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <h4 class="alert-heading">Viktig informasjon!</h4>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
          <p>Denne nettsiden bruker 3D-modeller som er laget i filformatet VRML. Det vil si at du trenger et nettlesertillegg for visning av 3D-modellene, og i dag er det kun Internet Explorer som støtter dette. 
            Hvorfor lurer du kanskje på? Mozilla, utvikleren av Firefox, forklarer det i denne <a href="https://support.mozilla.org/en-US/kb/npapi-plugins?as=u&utm_source=inproduct" class="alert-link">artikkelen</a>.  </p>
          <hr>
          <p>Vi anbefaler å bruke Cortona3D Viewer, som du finner <a href="http://www.cortona3d.com/cortona3d-viewer-download" class="alert-link">her</a>, og trenger du hjelp til å aktivere nettlesertillegget finner du det <a href="http://support.cortona3d.com/allow-plugin" class="alert-link">her</a>.</p>
        </div>
      </div>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="md-4">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
              </a>
              <h3 class="my-3 text-center"> <?php echo $db_productname; ?> </h3>
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-4">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
              </a>
              <h3 class="my-3 text-center"> <?php echo $db_productname; ?> </h3>
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-4">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
              </a>
              <h3 class="my-3 text-center"> <?php echo $db_productname; ?> </h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="md-4">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
              </a>
              <h3 class="my-3 text-center"> <?php echo $db_productname; ?> </h3>
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-4">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
              </a>
              <h3 class="my-3 text-center"> <?php echo $db_productname; ?> </h3>
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-4">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
              </a>
              <h3 class="my-3 text-center"> <?php echo $db_productname; ?> </h3>
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
            <!-- Henter VRML 3D model og viser den i modalen -->
              <OBJECT CLASSID="CLSID:86A88967-7A20-11d2-8EDA-00600818EDB1" WIDTH="400" HEIGHT="300">
                <PARAM NAME="SRC" VALUE="../Cortona Part Catalog/1130349.wrl">
                <PARAM NAME="VRML_BACKGROUND_COLOR" VALUE="#CDCDCD">
                <PARAM NAME="VRML_DASHBOARD" VALUE="false">
                <PARAM NAME="VRML_SPLASHSCREEN" VALUE="false">
                <PARAM NAME="CONTEXTMENU" VALUE="false">
                <!--[if !IE]>-->
                <img class="img-responsive" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="">
                <!--<![endif]-->
              </OBJECT>
            </div>
            <!-- Info om maskinen som hentes fra datamaskinen -->
            <div class="col-md-4 ml-auto">
              <p>Item ID: <?php echo $db_productid; ?></p>
              <p>Name: <?php echo $db_partname; ?></p>
              <p>Supplier name: <?php echo $db_productsupplier; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="../Cortona Part Catalog/start.htm" class="btn btn-info">
          Detaljert visning
        </a>
        <button type="button" class="btn btn-success">Finn del</button>
      </div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <!-- Scripts -->

    </body>
</html>