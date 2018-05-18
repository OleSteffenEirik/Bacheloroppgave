<?php 

require_once("connect.php");
require_once("functions.php");

// Legger informasjon i variabler
$email = $con->real_escape_string($_POST['email']);
$password = $con->real_escape_string($_POST['password']);
$repeatPassword = $con->real_escape_string($_POST['repeatPassword']);
$radio = $con->real_escape_string($_POST['radio']);
$company = $con->real_escape_string($_POST['company']);
$postalAdress = $con->real_escape_string($_POST['postalAdress']);
$postalCode = $con->real_escape_string($_POST['postalCode']);
$phoneNumber = $con->real_escape_string($_POST['phoneNumber']);

// Sjekker om brukernavnet finnes fra før
if(isset($email)) {
$users = $con->query("SELECT * FROM brukere WHERE ePost='$email'");
$rows = $con->affected_rows;
    
    if($rows >= 1){
        http_response_code(500);
        echo 'Brukernavnet finnes allerede!';
        }
    elseif ($password != $repeatPassword) {
        http_response_code(500);
        echo 'Passordene matchet ikke!';   
        }
    else {
        // Password hashing
        $hashedPassword = passwordEncrypter($password);
        $newUser = "INSERT INTO brukere (kundeNavn, passord, ePost, tilgangsNivå, postAdresse, postNr, telefon) 
        VALUES ('$company', '$hashedPassword', '$email', '$radio', '$postalAdress', '$postalCode', '$phoneNumber');";
        $res = $con->query($newUser);
        http_response_code(200);
        echo 'Registering av ny bruker er velykket!';
    }
}
else{
    http_response_code(500);
    echo 'Dette skjedde en feil!';
}

$con->close();
?>