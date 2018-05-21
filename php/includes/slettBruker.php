<?php

require_once("connect.php");
$con = new tronrudDB();

    if (isset($_POST['slett'])){
        $sql1 = "SELECT * FROM brukere WHERE kundeNr=".$_POST['slett'];
        $res = $con->query($sql1);
        $sql2 = "DELETE FROM brukere WHERE kundeNr =".$_POST['slett'];
        $con->query($sql2);
            header("Location: ../home.php");
    }
    else {
        echo 'Sorry1';
    }

?>