<?php
/* 
Beskrivelse: 
    Utviklet av: Steffen
        Kontrollert av:
*/

session_start();

require_once "connect.php";
$con = new tronrudDB();

$error=''; // Variable for feilmelding
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
}
    else
    {
    // Variabeler for inntastet data
    $username=$_POST['username'];
    $password=$_POST['password'];

    // MySQL Injection
    $username = $con->real_escape_string($username);
    $password = $con->real_escape_string($password);

    // SQL spørring som henter data fra databasen og sammenligner med inntastet data
    $query = $con->query("select * from brukere where passord='$password' AND kundeNavn='$username'");
    $rows = $query->num_rows;
    if ($rows == 1) {
    $_SESSION['login_user']=$username; // Oppretter sesjon
    header("location: profile.php"); // Sender brukeren til hovedsidens
    } else {
    $error = "Username or Password is invalid";
    }
    $con->close(); // Closing Connection
    }
}
?>