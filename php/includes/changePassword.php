<?php

session_start();
require_once("connect.php");
require_once("functions.php");
$con = new tronrudDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Varibeler for bytt passord
        $login_user = $_SESSION['login_user'][2];

        $new_password = $con->real_escape_string($_POST['newPassword']);
        $repeat_password = $con->real_escape_string($_POST['repeatPassword']);

        $check_username = "";
        $check_password = "";

        // Spørring mot database. Hente riktig bruker og passord.
        $sql =("SELECT * FROM brukere WHERE ePost='$login_user'");
        $res = $con->query($sql);
        
        while ($row = $res->fetch_assoc()) {
            $check_username = $row['ePost'];
        }
        if($login_user == $check_username){

            if($new_password == $repeat_password) {
                // Hvis ny passord er like gjenta nytt passord, så utfør spørring og bytte passord.
                $password = $new_password;
                $hashedPassword = passwordEncrypter($password);

                $sqlUpdate = $con->query("UPDATE brukere SET passord='$hashedPassword' where ePost='$login_user'");
                if ($sqlUpdate == true) { 
                    http_response_code(200);
                    echo "Password changed!";
                }else{
                    http_response_code(500);
                    echo "There was a problem with your submission, please try again. 1";
                    echo $hashedPassword;
                }   
            }else {
                http_response_code(500);         
                echo "Oops! Something went wrong and we couldn't send your message. 2";
            }
        }else {
            http_response_code(500);
            echo "There was a problem with your submission, please try again. 3";
        }
    }else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again. 4";
}

$con->close();
?>