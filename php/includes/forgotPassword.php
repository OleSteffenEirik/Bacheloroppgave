<?php
/* 
Tar imot e-post fra bruker, lager tidfeldig passord og sender det til brukeren.
*/

require_once("connect.php");
require_once("functions.php");
$con = new tronrudDB();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        $sql = $con->query("SELECT * FROM brukere WHERE ePost='$email'");

        // Check that data was sent to the mailer.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        if ($sql->num_rows > 0) {
            $str = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
            $str = str_shuffle($str);
            $str = substr($str, 0, 10);
            
            // Lager nytt passord til bruker. De tre første tegnene er faste for å garantere passordkravene. De ti siste er tilfeldige for å sikkerhetens skyld.
            $password = 'Tr0'.$str;

    
            $url = "http://tronrud.steffenjg.com";

            // Steffen sin e-post ligger her foreløbig 
            $to = 'steffenjg94@gmail.com';

            $subject = 'Forgot password Tronrud';

            $headers = "From: " . $email . "\r\n";
            $headers .= "CC: susan@example.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $email_content = "Your new password is: $password\nTo change your password, please visit this: $url\n\nRegards\n\nTronrud Engineering";
        
            $hashedPassword = passwordEncrypter($password);
            
            //Salter, krypterer og oppdaterer passordet til riktig bruker i databasen.
            $sqlUpdate = $con->query("UPDATE brukere SET passord='$hashedPassword' WHERE ePost='$email'");
        }
        // Send the email.
        if (mail($to, $subject, $email_content, $headers) && $sqlUpdate == true) {
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    } else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
$con->close();
?>