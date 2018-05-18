<?php
    // Kode for å søke etter parter.
    require_once("connect.php");
    $con = new tronrudDB();

    $term = "%" . $_GET['searchterm'] . "%";
    // echo $term;
    $term = $con->real_escape_string($term);
    $query = "SELECT name, Item_Id FROM products WHERE Item_Id LIKE '$term'";
    $myArray = array();
    if ($sql = $con->query($query)) {
        while($row = $sql->fetch_object()) {
                $myArray[] = $row;
        }
        http_response_code(200);
    }
    else {
        http_response_code(500);
    }

    echo json_encode($myArray);
    $sql->close();
    $con->close();
?>