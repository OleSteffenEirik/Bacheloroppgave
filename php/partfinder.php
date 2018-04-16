<?php 

require_once("includes/connect.php");
require_once("includes/sessionExpire.php");
require_once("includes/session.php");

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
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>-->
  </head>
    <body class="pages">
    <?php require_once('navbar.php'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto my-2">
                    <div class="card card-body m-10">
                        <form id="search-form" class="container d-flex justify-content-between align-items-center form-inline">
                            <a class="btn btn-md btn-tronrud-primary font-weight-bold" href="../php/home.php">
                                <i class="fas fa-arrow-alt-circle-left fa-lg align-middle mr-1"></i>
                                Back
                            </a>
                            <!--<a href="#" class="ml-5" data-toggle="modal" data-target="#orderModal">
                                Test
                            </a>-->
                            <div class="row ml-auto mr-3 mt-3">
                                <div class="form-group">
                                <select id="searchOption" class="form-control">
                                    <option value = "name">Name</option>
                                    <option value = "Item_Id">Item Id</option>
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

                        <!--<div id="form-messages"></div>-->
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

<!-- Legger til footer fra filen 'footer.php' -->
<?php require_once('footer.php'); ?>

<!-- Modal -->
<!--<div class="modal fade bd-example-modal-lg" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-tronrud-primary" id="orderModalLabel">Your order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill"></span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div class="mr-auto">
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <div class="form-group ml-auto">
                            <h6 class="mb-2">Quantity</h6>
                            <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="">
                    <div class="mb-3">
                        <label for="firstName">Company</label>
                        <input type="text" class="form-control" id="firstName" disabled="disabled" value="<?php echo $_SESSION['login_user'][1]; ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" disabled="disabled" value="<?php echo $_SESSION['login_user'][2]; ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="zip">Phone</label>
                            <input type="text" class="form-control" id="zip" disabled="disabled" value="<?php echo $_SESSION['login_user'][6]; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" disabled="disabled" value="<?php echo $_SESSION['login_user'][4]; ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" disabled="disabled" value="<?php echo $_SESSION['login_user'][5]; ?>">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
            <div class="modal-footer">
                <a href="" class="btn btn-success">
                    <i class="fas fa-check fa-lg align-middle mr-1"></i><b>Checkout</b>
                </a>
            </div>
        </form>
    </div>
</div>-->

    <!-- Scripts -->
    <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Komobilitet for handlekurv -->
    <script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/jquery.mycart.js"></script>
    <script type="text/javascript" src="../js/mycart-settings.js"></script>
    <script type="text/javascript" src="../static/fontawesome/fontawesome-all.js"></script>
    <script type="text/javascript">
        let companySession="<?php echo $_SESSION['login_user'][1]; ?>";
        let emailSession="<?php echo $_SESSION['login_user'][2]; ?>";
        let phoneSession="<?php echo $_SESSION['login_user'][6]; ?>";
        let adressSession="<?php echo $_SESSION['login_user'][4]; ?>";
        let zipSession="<?php echo $_SESSION['login_user'][5]; ?>";
    </script>
<!--
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "includes/search.php",
                "columns": [
                    { "data": "name" },
                    { "data": "Item_Id" },
                ]
            } );
        } );
    </script>
-->
    <!-- Scripts -->
    </body>
</html>