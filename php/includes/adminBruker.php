<?php
/*
spørringer som henter frem maskiner som kunden eier.
*/
require_once("connect.php");
$con = new tronrudDB();

$user_check = $_SESSION['login_user'][2];

$sql = $con->query("SELECT * FROM brukere;");

$rows = $sql->num_rows;

$userTable =  '<div class="container border rounded mt-4">';
$userTable .= '<h1 class="display-4 my-4 text-center">User overview</h1>';
$userTable .= '<form method="POST" action="includes/slettBruker.php">';
$userTable .= '<table id="table" class="table table-hover table-striped table-bordered my-5">';
$userTable .=   '<thead class="bg-tronrud-secondary text-white font-weight-bold lead text-uppercase">';
$userTable .=       '<tr>';
$userTable .=           '<th scope="col-2">Company</th>';
$userTable .=           '<th scope="col-2">E-mail</th>';
$userTable .=           '<th scope="col-2">Membership</th>';
$userTable .=           '<th scope="col-1">Number of logins</th>';
$userTable .=           '<th scope="col-3">Last logged in</th>';
$userTable .=           '<th scope="col-2"></th>';
$userTable .=       '</tr>';
$userTable .=   '</thead>';
$userTable .=   '<tbody>';
$userTable .= '</div>';

if ($rows >= 1) {
    while ($row = $sql->fetch_assoc()) {
        $kundeID = $row['kundeNr'];

        $userTable .= '<tr>';
        $userTable .=   '<td>'.$row['kundeNavn'].'</td>';
        $userTable .=   '<td>'.$row['ePost'].'</td>';
        $userTable .=   '<td>'.$row['tilgangsNivå'].'</td>';
        $userTable .=   '<td>'.$row['AntallInnlogging'].'</td>';
        $userTable .=   '<td>'.$row['SistInnlogging'].'</td>';
        $userTable .=   '<td><button class="btn btn-danger btn-rounded btn my-0 my-cart-btn font-weight-bold" type="submit" name="slett" value="' . $row['kundeNr']. '"> <i class="fas fa-lg fa-times"></i> </button></td>';
        $userTable .= '</tr>';

    }
    $userTable .=   '</tbody>';
    $userTable .= '</table>';
    $userTable .= '</form>';

}
else {
    echo 'Sorry2';
};

?>