<nav class="navbar navbar-expand-md bg-tronrud-secondary">
    <div class="container d-flex justify-content-between align-items-center">
        <img class="img-responsive navbar-brand my-2" src="../img/tronrud-engineering-logo.svg" alt="logo" height="50px" width="200px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""><i class="fas fa-bars fa-lg text-tronrud-primary"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <!-- Change password -->
                    <a class="btn btn-md btn-tronrud-primary mr-2" href="#" data-toggle="modal" data-target="#ChangePWModal">
                        <i class="fas fa-key fa-lg align-middle mr-1"></i><b>Change password</b>
                    </a>
                </li>
                <li class="nav-item">
                    <!--Logout--> 
                    <a class="btn btn-md btn-tronrud-primary mr-3" href="../php/includes/logout.php">
                        <i class="fas fa-sign-out-alt fa-lg align-middle mr-1"></i><b>Sign out</b>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="shopping-cart-icon">
                        <span class="my-cart-icon"><i class="fas fa-shopping-cart fa-2x text-light"></i></span><span class="badge badge-pill badge-tronrud-primary my-cart-badge position-absolute"></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="ChangePWModal" tabindex="-1" role="dialog" aria-labelledby="ChangePWModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-tronrud-primary" id="ChangePWModalLabel">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ajaxForm" method="post" action="../php/includes/changePassword.php">
                <div class="form-group">
                    <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" placeholder="Repeat password" required>
                </div>
            </div>
                <div class="modal-footer">
                <button id="addSubmit" type="submit" name="submit" class="btn btn-tronrud-primary">
                    <i class="fas fa-check fa-lg align-middle mr-1"></i>Confirm
                </button>
                </form>
            </div>
        </div>
    </div>
</div>