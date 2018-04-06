<?php
require_once("connect.php");
$con = new tronrudDB();

$user_check = $_SESSION['login_user'][2];

$sql = $con->query("SELECT Maskin.ID, Maskin.Name, Maskin.Date_Created, PDF.PDF_File
FROM brukereMaskin
	INNER JOIN Maskin
		ON Maskin.ID = brukereMaskin.Maskin_Id
			INNER JOIN brukere 
				ON brukere.kundeNr = brukereMaskin.kundeNr 
                    LEFT JOIN PDF
                        ON brukereMaskin.PDF_Id = PDF.PDF_Id
                            WHERE brukere.ePost='$user_check';");

$rows = $sql->num_rows;

if ($rows >= 1) {
    while ($row = $sql->fetch_assoc()) {
        $db_ID = $row['ID'];
        $db_machinename = $row['Name'];
        $db_date = $row['Date_Created'];
        $db_PDFfile = $row['PDF_File'];
    }
}else {
    echo "E-mail and password doesn't match";
}
?>