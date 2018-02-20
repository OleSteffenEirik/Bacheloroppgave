<?php
    include 'dbconn.php';
    $conn = getDatabaseConnection();

    $name = "%" . $_GET['name'] . "%";
    
    $sql = "SELECT name, Item_Id
            FROM products
            WHERE name LIKE :name"  ;
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":name"=>$name));
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>