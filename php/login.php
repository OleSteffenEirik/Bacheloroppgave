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
$error3='';
$result='';

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error1 = "E-mail or Password field are empty";
    }else {
        // Variabeler for inntastet data
        $email=$_POST['email'];
        $password=$_POST['password'];
        // MySQL Injection
        $email = $con->real_escape_string($email);
        $password = $con->real_escape_string($password);
        // SQL spørring som henter data fra brukertabellen og sammenligner med inntastet data
        $sql = $con->query("SELECT * FROM brukere WHERE ePost='$email'");
        // Tar spørringen og lager en verdi som lagrer antall rader
        $rows = $sql->num_rows;

        if ($rows >= 1) {
            while ($row = $sql->fetch_assoc()) {
                $db_kundeNr = $row['kundeNr'];
                $db_email = $row['ePost'];
                $db_password = $row['passord'];
                $db_feilTeller = $row['feilLogginnTeller'];
                $db_feilSiste = $row['feilLogginnSiste'];
                $db_feilIP = $row['feilIP'];
            }
            if ($email==$db_email && $password==$db_password) {
                $_SESSION['login_user']=$email; // Oppretter sesjon
                $sqlUpdate1 = ("UPDATE brukere SET feilLogginnTeller=0 WHERE kundeNr = '$db_kundeNr'");
                $res1 = $con->query($sqlUpdate1);

                header("location: profile.php"); // Sender brukeren til hovedsiden

            }else {
                $error2 = "E-mail or Password is invalid";

                $ip = $_SERVER['REMOTE_ADDR'];  // Henter IP-addressen til brukeren
                $date = date("Y-m-d H:i:s");    // Henter dato
                $number = $db_feilTeller +1; // +1 for hver feil innlogging

                $sqlUpdate2 = ("UPDATE brukere SET feilLogginnTeller='$number', feilLogginnSiste='$date', feilIP='$ip'  WHERE ePost='$email'");
                $res2 = $con->query($sqlUpdate2);

                    if ($number > 2) {
                        header("location: php/timeout.php", Sleep(5));
                        
                        $sqlUpdate3 = ("UPDATE brukere SET feilLogginnTeller=0 WHERE kundeNr = '$db_kundeNr'");
                        $res3 = $con->query($sqlUpdate3);
                    }   
            }
        }
        $error3 = "E-mail not found";
    }
    $con->close(); // Closing Connection
}

if ($error1 == true) {
    $result='
    <div class="alert alert-warning alert-dismissible fade show text-left " role="alert">E-mail or Password field are empty
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="fas fa-times fa-sm"></i>
        </button>
    </div>';
    }
    elseif ($error2 == true) {
        $result='
        <div class="alert alert-warning alert-dismissible fade show text-left " role="alert">E-mail or Password is invalid
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="fas fa-times fa-sm"></i>
            </button>
        </div>';
        }elseif ($error3 == true) {
            $result='
            <div class="alert alert-warning alert-dismissible fade show text-left" role="alert">E-mail not found
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="fas fa-times fa-sm"></i>
            </button>
            </div>';
        } 
?>