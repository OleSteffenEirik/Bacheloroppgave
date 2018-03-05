<?php
require_once "connect.php";

$user_check = $_SESSION['login_user'];

// SQL spørring som henter data fra brukertabellen og sammenligner med inntastet data
$sql = $con->query("SELECT * FROM brukere WHERE ePost='$user_check'");
// Tar spørringen og lager en verdi som lagrer antall rader
$rows = $sql->num_rows;

if ($rows >= 1) {
    while ($row = $sql->fetch_assoc()) {
        $db_id = $row['kundeNr'];
        $db_name = $row['kundeNavn'];
        $db_email = $row['ePost'];
        $db_access = $row['tilgangsNivå'];
    }

    $sql1 = $con->query("SELECT Produktnavn, products.Item_Id, products.Name, products.Supplier_name, brukere.ePost FROM Maskiner 
    JOIN products ON Maskiner.Item_Id = products.Item_Id JOIN brukere ON Maskiner.kundeNr = brukere.kundeNr WHERE brukere.ePost='$user_check'");

    $rows1 = $sql1->num_rows;

    if ($rows1 >= 1) {
        while ($row1 = $sql1->fetch_assoc()) {
            $db_productname = $row1['Produktnavn'];
            $db_productid = $row1['Item_Id'];
            $db_partname = $row1['Name'];
            $db_productsupplier = $row1['Supplier_name'];
        }
    }else {
        http_response_code(500);
        echo "E-mail and password doesn't match";
    }
} 
else {
    http_response_code(500);
    echo "E-mail and password doesn't match";
}
?>