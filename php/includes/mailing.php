<?php
if(isset($_POST["checkoutString"]))
{
    $navn = ' ';
    $data = json_decode($_POST["checkoutString"]);
    $myarray = $data->myarray;
    foreach($myarray as $singular)
    {
        $navn .= $singular->name;
    }
    
    echo json_encode($navn);

}


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

?>
