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

$divHtml = '';

$divHtml .= '<section class="jumbotron text-center">';
$divHtml .= '<div class="container">';
$divHtml .= '<h1 class="display-3">Machine overview</h1>';
$divHtml .= '<p class="lead">Here you will find an overview of all your machines.</p>';
$divHtml .=  '<span class="lead">User: ';
$divHtml .=  '<b>' . $_SESSION['login_user'][1] . '</b>';
$divHtml .= '</span>';
$divHtml .= '<span class="lead ml-2">Membership: ';
$divHtml .= '<b>'. $_SESSION['login_user'][3] .'</b>';
$divHtml .= '</span>';
$divHtml .=  '</div>';
$divHtml .=  '</section>';

$divHtml .= '<div class="container">';
$divHtml .= '<div class="alert alert-info alert-dismissible fade show" role="alert">';
$divHtml .= '<h2 class="alert-heading">Important information!</h2>';
$divHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
$divHtml .= '<i class="fas fa-times"></i>';
$divHtml .= '</button>';
$divHtml .= '<p>This site uses 3D models created in the VRML file format. You will need a browser that supports display of VRML
    3D models, and today, only Internet Explorer supports this. Why? Mozilla, developer of Firefox, explains it in
    this
    <a href="https://support.mozilla.org/en-US/kb/npapi-plugins?as=u&utm_source=inproduct" class="alert-link">article</a>.</p>';
$divHtml .= '<hr>';
$divHtml .= '<p>We recommend using Cortona3D Viewer, as found
    <a href="http://www.cortona3d.com/cortona3d-viewer-download" class="alert-link">here</a>, and if you need help to enable the browser plugin you will find it
    <a href="http://support.cortona3d.com/allow-plugin" class="alert-link">here</a>.</p>';
$divHtml .= '</div>';
$divHtml .= '</div>';

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
        $divHtml .='    <a href="#" class="nounderline" data-toggle="modal" data-target="#exampleModal">';
        $divHtml .='        <img class="card-img-top img-responsive hvr-grow my-4" src="../img/tronrud-engineering-logo-svart.svg" width="120" height="60" alt="Card image cap">';
        $divHtml .='    <h3 class="my-3 text-center text-black">' . $db_machinename . '</h3>';
        $divHtml .='    </a>';
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