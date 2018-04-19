<?php
/* 
Oppretter session for og utfører sjekk om brukeren har en session.
*/
require_once("connect.php");
$con = new tronrudDB();

session_start();

// Lagrer session.
$user_check=$_SESSION['login_user'][2];

// SQL spørring som samler informasjon om bruker.
$ses_sql=$con->query("select ePost from brukere where ePost='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['ePost'];

// Sjekker om riktig bruker har en session, hvis ikke blir man sendt til innlogging.
if(!isset($login_session)){
$con->close();

header('Location: ../index.php');
}
?>