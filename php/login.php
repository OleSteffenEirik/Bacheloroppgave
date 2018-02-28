<?php
/* 
Beskrivelse: 
    Utviklet av: Steffen
        Kontrollert av:
*/

session_start();

require_once "connect.php";
$con = new tronrudDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (empty($_POST['email']) || empty($_POST['password'])) {
        http_response_code(400);
        echo "E-mail or Password field are empty";
    }else {
        // Variabeler for inntastet data
        $email=$_POST['email'];
        $password=$_POST['password'];
        // MySQL Injection
        $email = $con->real_escape_string($email);
        $password = $con->real_escape_string($password);
        // reCAPTCHA
        $secret="6Le0nzsUAAAAADyDcU-el9B9WpLYgkQ1TrTzreEa";
        $response=$_POST["captcha"];

        $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
        $captcha_success=json_decode($verify);

        if ($captcha_success->success==false) {
            http_response_code(500);
            echo "This user was not verified by recaptcha";
        }
        else if ($captcha_success->success==true) {
            //This user is verified by recaptcha

            // SQL spørring som henter data fra brukertabellen og sammenligner med inntastet data
            $sql = $con->query("SELECT * FROM brukere WHERE ePost='$email'");
            // Tar spørringen og lager en verdi som lagrer antall rader
            $rows = $sql->num_rows;

            if ($rows >= 1) {
                while ($row = $sql->fetch_assoc()) {
                    $db_email = $row['ePost'];
                    $db_password = $row['passord'];
                }
                if ($email==$db_email && $password==$db_password) {
                    $_SESSION['login_user']=$email; // Oppretter sesjon
                    http_response_code(200);
                    echo "Logged in successfully! Redirecting...";
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