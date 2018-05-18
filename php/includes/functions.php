<?php
/* 
 Diverse PHP funksjoner
*/

function passwordEncrypter($password) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hash = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
    http_response_code(500);
        echo "Password hashing failed!";
    }
    return $hash;
}

?>