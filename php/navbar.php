<!-- Vi har laget kode for navbar her, slik vi bare kan gjøre include på .php-filen i 'home.php' -->

<nav class="navbar navbar-expand-md bg-tronrud-secondary">
    <div class="container d-flex justify-content-between align-items-center">
        <img class="img-responsive navbar-brand my-2" src="../img/tronrud-engineering-logo.svg" alt="logo" height="50px" width="200px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""><i class="fas fa-bars fa-lg text-tronrud-primary"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
            <?php
                if($_SESSION['login_user'][1] == 'Admin'){
                    echo 
                    '<li class="nav-item">
                        <!-- Add user -->
                        <a class="btn btn-md btn-tronrud-primary mr-2" href="#" data-toggle="modal" data-target="#AddUserModal">
                            <i class="fas fa-user fa-lg align-middle mr-1"></i><b>Add user</b>
                        </a>
                    </li>';
                }
            ?>
                <li class="nav-item">
                    <!-- Change password -->
                    <a class="btn btn-md btn-tronrud-primary mr-2" href="#" data-toggle="modal" data-target="#ChangePWModal">
                        <i class="fas fa-key fa-lg align-middle mr-1"></i><b>Change password</b>
                    </a>
                </li>
                <li class="nav-item">
                    <!--Logout--> 
                    <a class="btn btn-md btn-tronrud-primary mr-2" href="../php/includes/logout.php">
                        <i class="fas fa-sign-out-alt fa-lg align-middle mr-1"></i><b>Sign out</b>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="shopping-cart-icon">
                        <span class="badge badge-pill badge-tronrud-primary my-cart-badge position-absolute" style="margin-left: 2.6rem"></span>
                        <span class="my-cart-icon ml-2">
                            <i class="fas fa-shopping-cart fa-2x text-white align-middle mr-1" style="font-size: 36px"></i>
                        </span>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Change Password -->
<div class="modal fade bd-example-modal-sm" id="ChangePWModal" tabindex="-1" role="dialog" aria-labelledby="ChangePWModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-tronrud-primary" id="ChangePWModalLabel">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ajaxFormChangePW" method="post" action="../php/includes/changePassword.php">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-redo"></i></span>
                        </div>
                        <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" placeholder="Repeat password" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-tronrud-primary">
                    <i class="fas fa-check fa-lg align-middle mr-1"></i>Confirm
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add User -->
<div class="modal fade bd-example-modal-lg" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="AddUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-tronrud-primary" id="AddUserModalLabel">Add user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 order-md-1">
                            <form id="ajaxFormNewUser" method="post" action="../php/includes/newUser.php">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-redo"></i></span>
                                    </div>
                                    <input type="password" name="repeatPassword" class="form-control" placeholder="Repeat password" required>
                                </div>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="radio" class="custom-control-input" value="Basic" checked>
                                <label class="custom-control-label" for="customRadioInline1">Basic</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="radio" class="custom-control-input" value="Premium">
                                <label class="custom-control-label" for="customRadioInline2">Premium</label>
                            </div>
                        </div>
                        <div class="col-md-7 order-md-2">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <input type="text" name="company" class="form-control" placeholder="Company" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></i></span>
                                    </div>
                                    <input type="text" name="postalAdress" class="form-control" placeholder="Postal adress" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" pattern="[0-9]{4}" name="postalCode" class="form-control" placeholder="Postal code" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="tel" name="phoneNumber" class="form-control" placeholder="Phone number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-tronrud-primary">
                                    <i class="fas fa-check fa-lg align-middle mr-1"></i>Confirm
                                </button>
                            </form>
                            </div>
        </div>
    </div>
</div>