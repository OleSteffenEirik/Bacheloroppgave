<?php 

include("includes/dbconn.php");
include("includes/sessionExpire.php");
include("includes/session.php")

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
                        <form id="search-form" class="container d-flex justify-content-between align-items-center">
                            <!--<img class="" src="../img/tronrud-engineering-logo-svart.svg" alt="logo" width="200px">-->
                            <a class="btn btn-md btn-tronrud-primary" href="../php/home.php">
                                <i class="fas fa-arrow-alt-circle-left fa-lg align-middle mr-1"></i><b>Back</b>
                            </a>
                            <a href="#" class="ml-5" data-toggle="modal" data-target="#orderModal">
                                Test
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

                        <!--<div id="form-messages"></div>-->
                        <table class="table mt-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col-1">#</th>
                                    <th scope="col-4">Product</th>
                                    <th scope="col-3">Item Id</th>
                                    <th scope="col-2">Quantity</th>
                                    <th scope="col-2">Button</th>
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

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
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
                    <span class="badge badge-secondary badge-pill">3</span>
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
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
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
                            <!--<div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">+47</span>
                                </div>
                                <input type="text" class="form-control" id="zip" disabled="disabled">
                            </div>-->
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
                <!--<a href="" class="btn btn-info">
                    <i class="fas fa-shopping-cart fa-lg align-middle mr-1"></i><b>Add to cart</b>
                </a>-->
                <a href="" class="btn btn-success">
                    <i class="fas fa-check fa-lg align-middle mr-1"></i><b>Order parts</b>
                </a>
            </div>
        </form>
    </div>
</div>

    <!-- Scripts -->
    <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../static/fontawesome/fontawesome-all.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/bootstrap-number-input.js"></script>
    <!-- Scripts -->
    </body>
</html>