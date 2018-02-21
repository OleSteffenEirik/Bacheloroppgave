<?php 
    //contact form submission code
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = nl2br($_POST['message']);

    if (isset($_POST['submit'])) {
        $to = 'steffenjg94@gmail.com';
        $subject = 'New contact form have been submitted';
        $htmlContent = "
            <h1>Contact request details</h1>
            <p><b>Name: </b>".$name."</p>
            <p><b>Email: </b>".$email."</p>
            <p><b>Message: </b>".$message."</p>
        ";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
        //send email
            if( mail($to, $subject, $htmlContent, $headers) ){
                $modalerror = "Message sent!";
                header("location: ../index.php", Sleep(10));
            } else {
                $modalerror = "The server failed to send the message. Please try again later.";
            }
    }else {
        $modalerror = "Error occured!";
    }
?>