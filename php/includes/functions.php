<?php
/* 
 Diverse PHP funksjoner
*/

function passwordEncrypter($password) {
    $salt = 'IT2_2017';
    if (!empty($_POST['send'])) {
    $encrypted_password = sha1($salt.$password);
    }
    else {
    echo" 
        <script>
         window.alert('Passordkrypering feilet!')           
        </script>
        ";
    }
    return $encrypted_password;
}
?>