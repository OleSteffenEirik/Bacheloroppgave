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
            echo "This user was not verified by recaptcha";
        }
        else if ($captcha_success->success==true) {
            //This user is verified by recaptcha

            // SQL spørring som henter data fra brukertabellen og sammenligner med inntastet data
            $sql = $con->query("SELECT * FROM brukere WHERE ePost='$email' AND passord='$password'");

            $_SESSION['login_user']=$email; // Oppretter sesjon
            header("location: ../profile.php"); // Sender brukeren til hovedsiden

            }else {
                echo "E-mail or Password is invalid";
            }
        }
    } $con->close(); // Closing Connection
?>