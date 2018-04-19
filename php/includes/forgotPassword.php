<?php
/* 

Beskrivelse: Tar imot e-post fra bruker, lager tidfeldig passord og sender det til brukeren.
    Utviklet av: Steffen
        Kontrollert av: 

*/

require_once("connect.php");
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
            //$password = 'Vi0'.$str;
            $password = $str;
    
            $url = "http://tronrud.steffenjg.com";

            // Set the recipient email address.
            // FIXME: Update this to your desired email address.
            $recipient = "hello@example.com";

            // Set the email subject.
            $subject = "New contact from webportalen";

            // Build the email content.
            $email_content = "Name: Reset Password\n";
            $email_content .= "Email: $email\n\n";
            $email_content .= "Your new password is: $password\nTo change your password, please visit this: $url\n\nRegards\n\nTronrud Engineering";

            // Build the email headers.
            $email_headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";

            //$salt = 'IT2_2017';
        
            //$encrypted_password = passwordEncrypter($password);
            //$con->query("UPDATE bruker SET passord = $encrypted_password WHERE ePost='$email'");
            
            //Salter, krypterer og oppdaterer passordet til riktig bruker i databasen.
            $sqlUpdate = $con->query("UPDATE brukere SET passord = '$password' WHERE ePost='$email'");
        }
        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers) && $sqlUpdate == true) {
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