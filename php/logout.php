<?php
session_start();
if(session_destroy()) // Fjerner sesjonen
{
header("Location: ../index.php"); // Sender brukeren tilbake til innlogging
}
?>