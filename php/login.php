<?php
/* 
Beskrivelse: 
    Utviklet av: Steffen
        Kontrollert av:
*/

session_start();

require_once "connect.php";
$con = new tronrudDB();

$error1='';
$error2='';
$result='';
$modalerror = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password field are empty";
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

        if ($rows >= 1) {
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
                $error1 = "Username or Password is invalid";

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
        $error2 = "Username not found";
    }
    $con->close(); // Closing Connection
}
if ($error1 == true) {
    $result='
    <div class="alert alert-warning alert-dismissible fade show text-left " role="alert">Username or Password is invalid
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span  aria-hidden="true">&times;</span>
        </button>
    </div>';
    }elseif ($error2 == true) {
        $result='
        <div class="alert alert-warning alert-dismissible fade show text-left" role="alert">Username not found
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="fas fa-times fa-sm"></i>
        </button>
        </div>';
} 
?>