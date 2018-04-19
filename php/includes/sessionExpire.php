<?php
  if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']>30)){ //600 = 10 min / Bruker 30 for å debugge. ***må endres tilbake senere***
    // bruker blir logget ut dersom bruker ikke er aktiv i 10 minutter
    $message = "You've been logged out.";
    session_unset();
    session_destroy();
    echo"<script> window.location.href='../index.php';alert('$message'); </script>";
    die();
  }
    //oppdaterer siste aktivitet time stamp
  $_SESSION['LAST_ACTIVITY'] = time();

?>