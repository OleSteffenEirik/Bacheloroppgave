<?php
/* 
Beskrivelse: 
    Utviklet av: Steffen
        Kontrollert av:
*/

session_start();

require_once "connect.php";
$con = new tronrudDB();

$error='';

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }else {
        // Variabeler for inntastet data
        $username=$_POST['username'];
        $password=$_POST['password'];
        // MySQL Injection
        $username = $con->real_escape_string($username);
        $password = $con->real_escape_string($password);
        // SQL spørring som henter data fra brukertabellen og sammenligner med inntastet data
        $sql = $con->query("SELECT * FROM brukere WHERE kundeNavn='$username'");
        // Tar spørringen og lager en verdi som lagrer antall rader
        $rows = $sql->num_rows;

        if ($rows > 0) {
            while ($row = $sql->fetch_assoc()) {
                $db_kundeNr = $row['kundeNr'];
                $db_username = $row['kundeNavn'];
                $db_password = $row['passord'];
                $db_feilTeller = $row['feilLogginnTeller'];
                $db_feilSiste = $row['feilLogginnSiste'];
                $db_feilIP = $row['feilIP'];
            }
            if ($username==$db_username && $password==$db_password) {
                $_SESSION['login_user']=$username; // Oppretter sesjon
                $sqlUpdate1 = ("UPDATE brukere SET feilLogginnTeller=0 WHERE kundeNr = '$db_kundeNr'");
                $res1 = $con->query($sqlUpdate1);

                header("location: profile.php"); // Sender brukeren til hovedsiden

            }else {
                $error = "Username or Password is invalid";

                $ip = $_SERVER['REMOTE_ADDR'];  // Henter IP-addressen til brukeren
                $date = date("Y-m-d H:i:s");    // Henter dato
                $number = $db_feilTeller +1; // +1 for hver feil innlogging

                $sqlUpdate2 = ("UPDATE brukere SET feilLogginnTeller='$number', feilLogginnSiste='$date', feilIP='$ip'  WHERE kundeNavn='$username'");
                $res2 = $con->query($sqlUpdate2);

                    if ($number > 2) {
                        header("location: php/timeout.php", Sleep(5));
                        
                        $sqlUpdate3 = ("UPDATE brukere SET feilLogginnTeller=0 WHERE kundeNr = '$db_kundeNr'");
                        $res3 = $con->query($sqlUpdate3);
                    }   
            }
        }
        $error = "Username or Password is invalid";
    }
    $error = "Can't connect to database";
    $con->close(); // Closing Connection
}
?>