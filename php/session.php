
<?php
/* 

Tittel: Sessjon
    Beskrivelse: Oppretter sessjon for og utfører sjekk om brukeren har en sessjon
        Sist oppdatert:
            Utviklet av: Steffen
                Kontrollert av:

*/
require_once "connect.php";
$con = new tronrudDB();

session_start();

// Lagrer session
$user_check=$_SESSION['login_user'];

// SQL spørring som samler informasjon om bruker
$ses_sql=$con->query("select kundeNavn from brukere where kundeNavn='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['kundeNavn'];

// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($login_session)){
$con->close();

header('Location: index.php');
}

?>