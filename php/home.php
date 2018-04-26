<?php
/* 
Frontsiden man kommer til når man logger inn.
*/

require_once("includes/sessionExpire.php");
require_once("includes/session.php");
require_once("includes/findProducts.php");

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
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="display-3">Machine overview</h1>
          <p class="lead">Here you will find an overview of all your machines.</p>
          <span class="lead">User: 
            <b><?php echo $_SESSION['login_user'][1]; ?></b>
          </span>
          <span class="lead ml-2">Membership: 
            <b><?php echo $_SESSION['login_user'][3]; ?></b>
          </span>
        </div>
      </section>

      <!-- AJAX Output -->
      <div class="container">
        <div id="formMessagesNewUser"></div>
      </div>

      <!-- AJAX Output -->
      <div class="container">
        <div id="formMessagesChangePW"></div>
      </div>

      <!-- AJAX Output -->
      <?php echo $machineError; ?>

      <div class="container">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <h2 class="alert-heading">Important information!</h2>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="fas fa-times"></i>
          </button>
          <p>This site uses 3D models created in the VRML file format. You will need a browser that supports display of VRML
            3D models, and today, only Internet Explorer supports this. Why? Mozilla, developer of Firefox, explains it in
            this
            <a href="https://support.mozilla.org/en-US/kb/npapi-plugins?as=u&utm_source=inproduct" class="alert-link">article</a>.</p>
          <hr>
          <p>We recommend using Cortona3D Viewer, as found
            <a href="http://www.cortona3d.com/cortona3d-viewer-download" class="alert-link">here</a>, and if you need help to enable the browser plugin you will find it
            <a href="http://support.cortona3d.com/allow-plugin" class="alert-link">here</a>.</p>
        </div>
      </div>

      <div class="album py-5">
        <div class="container">
          <?php echo $divHtml; ?>
          <!--<div class="row">
            <div class="col-md-4 mb-5">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" src="../img/tronrud-engineering-logo-svart.svg" width="100" height="50" alt="Card image cap">
              </a>
              <h3 class="my-3 text-center"><?php echo $db_machinename; ?></h3>
            </div>
            <div class="col-md-4 mb-5">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" src="../img/tronrud-engineering-logo-svart.svg" width="100" height="50"
                  alt="Card image cap">
              </a>
              <h3 class="my-3 text-center">
                <?php echo $db_machinename; ?> </h3>
            </div>
            <div class="col-md-4 mb-5">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" src="../img/tronrud-engineering-logo-svart.svg" width="100" height="50"
                  alt="Card image cap">
              </a>
              <h3 class="my-3 text-center">
                <?php echo $db_machinename; ?> </h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-5">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" src="../img/tronrud-engineering-logo-svart.svg" width="100" height="50"
                  alt="Card image cap">
              </a>
              <h3 class="my-3 text-center">
                <?php echo $db_machinename; ?> </h3>
            </div>
            <div class="col-md-4 mb-5">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" src="../img/tronrud-engineering-logo-svart.svg" width="100" height="50"
                  alt="Card image cap">
              </a>
              <h3 class="my-3 text-center">
                <?php echo $db_machinename; ?> </h3>
            </div>
            <div class="col-md-4 mb-5">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img class="card-img-top img-responsive hvr-grow" src="../img/tronrud-engineering-logo-svart.svg" width="100" height="50"
                  alt="Card image cap">
              </a>
              <h3 class="my-3 text-center">
                <?php echo $db_machinename; ?> </h3>
            </div>
          </div>-->

        </div>
      </div>
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
            <a href="partfinder.php" class="btn btn-success">
              <i class="fas fa-search fa-lg align-middle mr-1"></i>
              <b>Find parts</b>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto mb-4 my-2">
          <div class="card card-body m-10">
            <form id="search-form" class="container d-flex justify-content-between align-items-center form-inline">
              <div class="shopping-cart-icon">
                <span class="my-cart-icon">
                  <i class="fas fa-shopping-cart fa-2x text-dark"></i>
                </span>
                <span class="badge badge-pill badge-tronrud-primary my-cart-badge position-absolute"></span>
              </div>
              <div class="row ml-auto mr-3 mt-3">
                <div class="form-group">
                  <select id="searchOption" class="form-control">
                    <option value="name">Name</option>
                    <option value="Item_Id">Item Id</option>
                  </select>
                </div>
                <div class="form-group ml-3">
                  <input type="text" class="form-control input-sm" id="search-bar" placeholder="Search">
                </div>
                <div class="form-group ml-3">
                  <button type="submit" class="form-control btn btn-tronrud-primary font-weight-bold" id="searchBtn">
                    <i class="fas fa-search fa-lg align-middle mr-1"></i>
                    Search
                  </button>
                </div>
              </div>
            </form>

            <div class="table-responsive-md">
              <table id="table" class="table table-hover mt-5">
                <thead class="bg-tronrud-secondary text-white font-weight-bold">
                  <tr>
                    <th scope="col-1">#</th>
                    <th scope="col-8">Product</th>
                    <th scope="col-2">Item Id</th>
                    <th scope="col-1"></th>
                  </tr>
                </thead>
                <tbody id="item-table">

                </tbody>
              </table>
            </div>


          </div>
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

    <script type="text/javascript">
      let companySession = "<?php echo $_SESSION['login_user'][1]; ?>";
      let emailSession = "<?php echo $_SESSION['login_user'][2]; ?>";
      let phoneSession = "<?php echo $_SESSION['login_user'][6]; ?>";
      let adressSession = "<?php echo $_SESSION['login_user'][4]; ?>";
      let zipSession = "<?php echo $_SESSION['login_user'][5]; ?>";
    </script>

  </body>

  </html>