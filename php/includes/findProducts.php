<?php
require_once "connect.php";
$con = new tronrudDB();

$user_check = $_SESSION['login_user'][2];

$sql = $con->query("SELECT Maskiner.Produktnavn, products.Item_Id, products.Name, products.Supplier_name 
FROM brukereMaskin
	INNER JOIN Maskiner
		ON Maskiner.Maskin_Id = brukereMaskin.Maskin_Id
			INNER JOIN brukere 
				ON brukere.kundeNr = brukereMaskin.kundeNr 
					LEFT JOIN products 
						ON Maskiner.Item_Id = products.Item_Id 
							WHERE brukere.ePost='$user_check';");

$rows = $sql->num_rows;

if ($rows >= 1) {
    while ($row = $sql->fetch_assoc()) {
        $db_productname = $row['Produktnavn'];
        $db_productid = $row['Item_Id'];
        $db_partname = $row['Name'];
        $db_productsupplier = $row['Supplier_name'];
    }
}else {
    echo "E-mail and password doesn't match";
}
?>