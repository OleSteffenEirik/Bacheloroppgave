<?php
/* 

Tittel: Loginscript
    Beskrivelse: 
        Sist oppdatert: 15.02.2018
            Utviklet av: Steffen
                Kontrollert av:

*/

session_start(); // Starting Session

require_once "connect.php";
$con = new tronrudDB();

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection for Security purpose
$username = $con->real_escape_string($username);
$password = $con->real_escape_string($password);

// SQL query to fetch information of registerd users and finds user match.
$query = $con->query("select * from brukere where passord='$password' AND kundeNavn='$username'");
$rows = $query->num_rows;
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
echo "<script>alert('Du må trykke på bytt passord knappen!');
        </script>";
}
$con->close(); // Closing Connection
}
}
?>