<?php 

// Lister opp databaseinformasjon og kobler til databasen 

class tronrudDB extends mysqli {
function __construct(
$host = 'sql129.main-hosting.eu',
$user = "u412596952_tren1",
$pw = "Eggemoen2011",
$base = "u412596952_tren") {
    parent::__construct($host,$user,$pw,$base);
    }
}

// Lager databasekobling
$con = new tronrudDB();

// Sjekker databasekobling
    if ($con->connect_error) {
       die("Connection failed: " . $con->connect_error);
   }
?>