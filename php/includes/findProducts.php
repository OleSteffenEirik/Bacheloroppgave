<?php
/*
spørringer som henter frem maskiner som kunden eier.
*/
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

$machineError ='';
$divHtml = '';
$divHtml .= '<div class="album py-5">';
$divHtml .= '<div class="container">';
$i=0;

if ($rows >= 1) {
    while ($row = $sql->fetch_assoc()) {
        $db_ID = $row['ID'];
        $db_machinename = $row['Name'];
        $db_date = $row['Date_Created'];
        $db_PDFfile = $row['PDF_File'];

        $i++;

        if ($i == 1) {
            $divHtml .='<div class="row">';
        }

        if ($i % 4 == 0) {
            $divHtml .='<div class="row">';
        }

        $divHtml .='<div class="col-md-4 mb-5">';
        $divHtml .='    <a href="#" data-toggle="modal" data-target="#exampleModal">';
        $divHtml .='        <img class="card-img-top img-responsive hvr-grow" src="../img/tronrud-engineering-logo-svart.svg" width="100" height="50" alt="Card image cap">';
        $divHtml .='    </a>';
        $divHtml .='    <h3 class="my-3 text-center">' . $db_machinename . '</h3>';
        $divHtml .='</div>';

        if ($i == 3) {
            $divHtml .='</div>';
        }

        if ($i % 7 == 0) {
            $divHtml .='</div>';
        }
    }
}else {
    $divHtml .=    '<div class="alert alert-info alert-dismissible fade show" role="alert">';
    $divHtml .=        'No machines here, sorry!';
    $divHtml .=        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $divHtml .=            '<i class="fas fa-times"></i>';
    $divHtml .=        '</button';
    $divHtml .=    '</div>';
}

$divHtml .='</div>';
$divHtml .='</div>';

?>