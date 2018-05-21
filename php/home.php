<?php
/* 
Frontsiden man kommer til når man logger inn.
*/

require_once("includes/sessionExpire.php");
require_once("includes/session.php");
require_once("includes/findProducts.php");
require_once("includes/adminBruker.php");

?>
  <!doctype html>
  <html class="pages" lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=" Ole Martin Helgesen, Steffen J Gundersen, Eirik J Aanstad">
    <title>Tronrud Engineering</title>
    <link rel="shortcut icon" href="../img/tronrud-icon.png" />
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" type="text/css" href="../static/fontawesome/on-server/css/fontawesome-all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../Sass/main.css" />
  </head>

  <body class="pages bg-light">
    <?php require_once('navbar.php'); ?>
    <main role="main">

      <!-- AJAX Output -->
      <div class="container mt-4">
        <div id="formMessagesNewUser"></div>
      </div>

      <!-- AJAX Output -->
      <div class="container mt-4">
        <div id="formMessagesChangePW"></div>
      </div>

      <?php 
        if($_SESSION['login_user'][1] == 'Admin'){
          echo $userTable;
        }
        else {
          echo $divHtml;
        }
      ?>
    </main>

    <!-- Legger til footer fra filen 'footer.php' -->
    <?php require_once('footer.php'); ?>

    <!-- Machine Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-tronrud-primary" id="exampleModalLabel">
              <?php echo $db_machinename; ?>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5">
                  <!-- Henter VRML 3D model og viser den i modalen -->
                  <OBJECT CLASSID="CLSID:86A88967-7A20-11d2-8EDA-00600818EDB1" WIDTH="300" HEIGHT="300">
                    <PARAM NAME="SRC" VALUE="../Cortona Part Catalog/1130349.wrl">
                    <PARAM NAME="VRML_BACKGROUND_COLOR" VALUE="#CDCDCD">
                    <PARAM NAME="VRML_DASHBOARD" VALUE="false">
                    <PARAM NAME="VRML_SPLASHSCREEN" VALUE="false">
                    <PARAM NAME="CONTEXTMENU" VALUE="false">
                    <!--[if !IE]>-->
                    <img class="img-responsive" src="../img/tronrud-engineering-logo-svart.svg" width="200" height="100" alt="Card image cap">
                    <!--<![endif]-->
                  </OBJECT>
                </div>
                <!-- Info om maskinen som hentes fra datamaskinen -->
                <div class="col-md-4">
                  <h4 class="mb-4">Informasjon</h4>
                  <p>
                    <b>Item ID:</b>
                    <?php echo $db_ID; ?>
                  </p>
                  <p>
                    <b>Name:</b>
                    <?php echo $db_machinename; ?>
                  </p>
                  <p>
                    <b>Date created: </b>
                    <?php echo date('Y-m-d', strtotime($db_date));; ?>
                  </p>
                </div>
                <div class="col-md-3">
                  <h4 class="mb-4">Dokumentasjon</h4>
                  <a target="_blank" href="../pdf/<?php echo $db_PDFfile; ?>">
                    <i class="far fa-file-pdf"></i>
                    <?php echo $db_PDFfile; ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="../Cortona Part Catalog/start.htm" target="_blank" class="btn btn-info">
              <i class="fas fa-info-circle fa-lg align-middle mr-1"></i>
              <b>Detailed view</b>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal END -->

    <!-- Part Search -->
    <div class="container border rounded mt-4">
      <h1 class="display-4 my-4 text-center">Part search</h1>
        <div class="col-md-12">
          <form id="search-form">
            <div class="row mx-5">
              <div class="input-group input-group-lg inputBig">
                <div class="input-group-prepend prependBig">
                    <span class="input-group-text textBig" id="inputGroup-sizing-lg"><i class="fas fa-search fa-lg align-middle"></i></span>
                </div>
                <input id="search-bar" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-lg" placeholder="Search for parts using item id..."> 
                <div class="input-group-append">
                  <button type="submit" class="form-control btn btn-tronrud-secondary font-weight-bold">
                  <!--<i class="fas fa-search fa-lg align-middle mr-1"></i>-->
                    Search
                  </button>
                </div>
              </div>
            </div>
          </form>

            <div class="table-responsive-md">
              <table id="table" class="table table-hover table-striped table-bordered my-5">
                <thead class="bg-tronrud-secondary text-white font-weight-bold lead text-uppercase">
                  <tr>
                    <!--<th scope="col-1">#</th>-->
                    <th scope="col-8">Product</th>
                    <th scope="col-2">Item Id</th>
                    <th class="text-center" scope="col-1"><i class="fas fa-lg fa-cart-arrow-down"></i></th>
                  </tr>
                </thead>
                <tbody class="text-uppercase" id="item-table">
                  
                </tbody>
              </table>
            </div>

      </div>
  </div>

    <!-- Scripts -->
    <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Kompatibilitet for handlekurv -->
    <script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>
    <!-- -->
    <script type="text/javascript" src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mycart.js"></script>
    <script type="text/javascript" src="../js/mycart-settings.js"></script>
    <script type="text/javascript" src="../static/fontawesome/fontawesome-all.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script type="text/javascript" src="../js/ajaxForm.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/machineSearch.js"></script>

    <script type="text/javascript">
      let companySession = "<?php echo $_SESSION['login_user'][1]; ?>";
      let emailSession = "<?php echo $_SESSION['login_user'][2]; ?>";
      let phoneSession = "<?php echo $_SESSION['login_user'][6]; ?>";
      let adressSession = "<?php echo $_SESSION['login_user'][4]; ?>";
      let zipSession = "<?php echo $_SESSION['login_user'][5]; ?>";
    </script>

  </body>

  </html>