<?php
/*
Denne filen setter opp template for mail, som sendes videre til Tronrud Enginering for deler kunden vil bestille.

*** Foreløbig gått over til PHP sin mail()-funksjon isteden for PHPMailer for lettere testing.
*** PHPMailer vil være best egnet for å forhindre at mail havner i spam-filter.
***
*/


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
/*use PHPMailer\PHPMailer\PHPMailer;
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
    //sett brukernavn og passord til smtp-bruker.
    $mail->Username = '';                            // SMTP username   
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients    ~   kan legge til flere
  //  $mail->setFrom('email@email.no', 'Trondrud Engineering');
   // $mail->addAddress('email@gg.ez', 'Ole Martin');     // Legg til mottaker ~ legg til parameter for $ePost og $kundeNavn.(settes til samme som innlogging)


    // Informasjon om hva som har blitt lagt til bestilling legges ved under her.
     // legg til informasjon fra database.
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
*/


// PHP mail()
// Set the recipient email address.
            // FIXME: Update this to your desired email address.
            $recipient = "hello@example.com";

            // Set the email subject.
            $subject = "Tronrund Engineering billing information";

            // Build the email content.
            $email_content = '';

            if(isset($_POST["checkoutString"])) {
                $ordre = json_decode($_POST["checkoutString"]);
                $fritekst = $_POST['fritekst'];        
            }
            // Build the email headers.
            $email_content .= 'Name ';
            $email_content .= 'Id ';
            $email_content .= 'quantity ';
            $email_content .= '<br>';

            foreach($ordre as $order) {
                $email_content .= $order->name . ' ';
                $email_content .= $order->id . ' ';
                $email_content .= $order->quantity . ' ';
                $email_content .= '<br>';
            }

            $email_content .= $fritekst;

            $headers =  'MIME-Version: 1.0' . "\r\n"; 
            $headers .= 'From: Your name <info@address.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 


            mail($recipient, $subject, $email_content, $headers);
?>
