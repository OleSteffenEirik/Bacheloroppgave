<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


// URL til SMTP-server: https://app.sendgrid.com/   -  kan også bruke andre typer SMTP-servere.
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // ~ skiftes ut med egen SMTP-server brukernavn og passord
    $mail->Username = 'ohelgesen39';                 // SMTP username   
    $mail->Password = 'Eggmoen2011';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients    ~   kan legge til flere
    $mail->setFrom('ohelgesen39@gmail.com', 'Trondrud Engineering');
    $mail->addAddress('ohelgesen39@gmail.com', 'Ole Martin');     // Legg til mottaker ~ legg til parameter for $ePost og $kundeNavn.(settes til samme som innlogging)


    // Informasjon om hva som har blitt lagt til bestilling legges ved under her.
     // legg til informasjon fra database om bruker
    $body = '<p><strong>Hello.</strong>
    <br> This is the orderlist from Tronrud Engineering: </p>';
    
    
    //Content
    $mail->isHTML(true);                                  // Setter email formatet til HTML.
    $mail->Subject = 'Tronrund Engineering billing information';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}