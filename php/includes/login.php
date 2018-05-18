<?php
/* 
Kode for å logge inn fra'index.php' med Email og Passord. 
*/

require_once("connect.php");
require_once("functions.php");
$con = new tronrudDB();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (empty($_POST['email']) || empty($_POST['password'])) {
        http_response_code(400);
        echo "E-mail or Password field are empty";
    }else {
        // Variabler
        $email = $con->real_escape_string($_POST['email']);
        $password = $con->real_escape_string($_POST['password']);
        //$password = $_POST['password'];

        // reCAPTCHA
        $secret="6Le0nzsUAAAAADyDcU-el9B9WpLYgkQ1TrTzreEa";
        $response=$_POST["captcha"];

        $options=array(
            'ssl'=>array(
                'verify_peer'       => false,
                'verify_peer_name'  => false,
            ),
        );
        $context = stream_context_create($options);

        $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}", false, $context);
        $captcha_success=json_decode($verify);

        if ($captcha_success->success==false) {
            http_response_code(500);
            echo 'This user was not verified by recaptcha';
        }
        else if ($captcha_success->success==true) {
            //This user is verified by recaptcha

            // SQL spørring som henter data fra brukertabellen og sammenligner med inntastet data
            $sql = $con->query("SELECT * FROM brukere WHERE ePost='$email'");
            // Tar spørringen og lager en verdi som lagrer antall rader
            $rows = $sql->num_rows;

            if ($rows >= 1) {
                while ($row = $sql->fetch_assoc()) {
                    $db_kundeNr = $row['kundeNr'];
                    $db_kundeNavn = $row['kundeNavn'];
                    $db_password = $row['passord'];
                    $db_email = $row['ePost'];
                    $db_tilgangNivå = $row['tilgangsNivå'];
                    $db_postAdresse = $row['postAdresse'];
                    $db_postNr = $row['postNr'];
                    $db_telefon = $row['telefon'];
                }
                //if ( $email==$db_email && password_verify($password, $db_password)) {
                if ($email==$db_email && $password==$db_password) {
                    $sqlCount = $con->query("UPDATE brukere SET AntallInnlogging=AntallInnlogging+1 WHERE ePost='$db_email'");
                    $sqlLastTime = $con->query("UPDATE brukere SET SisteInnlogging= now()");
                    $session_array = array($db_kundeNr, $db_kundeNavn, $db_email, $db_tilgangNivå, $db_postAdresse, $db_postNr, $db_telefon); // Oppretter sesjon
                    $_SESSION['login_user'] = $session_array;
                    http_response_code(200);
                }else {
                    http_response_code(500);
                    echo "E-mail and password doesn't match";
                }
            }else {
                http_response_code(500);
                echo "E-mail or password is invalid";
            }
        }else {
            http_response_code(500);
            echo "E-mail or password is invalid";
        }
    }
}else{
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}

$con->close(); // Closing Connection
?>