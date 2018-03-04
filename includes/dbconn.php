<?php

function getDatabaseConnection() {
    $host = 'sql129.main-hosting.eu'; 
    $dbname = 'u412596952_tren';
    $username = 'u412596952_tren1';
    $password = 'Eggemoen2011';
    
    
    //creates database connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //we'll be able to see some errors with database
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
}
?>