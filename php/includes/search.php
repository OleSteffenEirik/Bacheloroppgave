<?php
    /*include 'dbconn.php';
    $conn = getDatabaseConnection();

    $name = "%" . $_GET['name'] . "%";
    
    $sql = "SELECT name, Item_Id
            FROM products
            WHERE name LIKE :name"  ;
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":name"=>$name));
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);*/

    /*$rows = $sql->num_rows;

    if ($rows >= 1) {
        while ($row = $sql->fetch_assoc()) {
            $db_productid = $row['Item_Id'];
            $db_partname = $row['Name'];
        }
    }else {
        echo "E-mail and password doesn't match";
    }*/

    require_once("connect.php");
    $con = new tronrudDB();

    $term = "%" . $_GET['searchterm'] . "%";
    // echo $term;
    $term = $con->real_escape_string($term);
    $option = $_GET["option"];
    // echo $option;
    $option = $con->real_escape_string($option);
    $query = "SELECT name, Item_Id FROM products WHERE $option LIKE '$term'";
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