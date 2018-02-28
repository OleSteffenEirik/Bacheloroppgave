<?php
/* 

    Beskrivelse: Funksjon for bytte av passord
        Utviklet av: Steffen
            Kontrollert av:

*/    

require_once "connect.php";
$con = new tronrudDB();
include "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Varibeler for bytt passord
        $login_user = $_SESSION['login_user'];
        //$password = $con->real_escape_string($_POST['password1']);
        $new_password = $con->real_escape_string($_POST['newPassword']);
        $repeat_password = $con->real_escape_string($_POST['repeatPassword']);
        //$encrypted_password = passwordEncrypter($password);
        $check_username = "";
        $check_password = "";

        // Spørring mot database. Hente riktig bruker og passord.
        //$sql =("SELECT brukerNavn, passord FROM bruker WHERE brukerNavn='$login_user' AND passord='$encrypted_password'");
        //$res = $con->query($sql);

        $sql =("SELECT * FROM brukere WHERE ePost='$login_user'");
        $res = $con->query($sql);
        
        while ($row = $res->fetch_assoc()) {
            $check_username = $row['ePost'];
            $check_password = $row['passord'];
        }
        //if($login_user == $check_username && $encrypted_password == $check_password){
        if($login_user == $check_username){

            if($new_password == $repeat_password) {
                // Hvis ny passord er like gjenta nytt passord, så utfør spørring og bytte passord.
                $password = $new_password;
                //$encrypted_password = passwordEncrypter($password);
                //$sqlUpdate =("UPDATE bruker SET passord='$encrypted_password' where brukerNavn='$login_user'");
                //$resUpdate = $con->query($sqlUpdate);
                $sqlUpdate =("UPDATE brukere SET passord='$password' WHERE ePost='$login_user'");
                $resUpdate = $con->query($sqlUpdate);

                //$sqlUpdate = $con->query("UPDATE bruker SET passord='$encrypted_password' where brukerNavn='$login_user'");
                if ($resUpdate == true) { 
                    http_response_code(200);
                    echo "Thank You! Your message has been sent.";
                }else{
                    http_response_code(500);
                    echo "There was a problem with your submission, please try again.";
                }   
            }else {
                http_response_code(500);         
                echo "Oops! Something went wrong and we couldn't send your message.";
            }
        }else {
            http_response_code(500);
            echo "There was a problem with your submission, please try again.";
        }
    }else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
}
    
// Avslutte kontakt med databse.
$con->close();
?>