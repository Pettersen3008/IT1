<?php
$DB_HOST = 'mysql';
$DB_USER = 'root';
$DB_PASS = 'san3';
$DB_NAME = 'camp';
 
// Kobler til database med konstantene overnfor
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
 
// Sjekker om tilkobling er feil, hvis ikke printer den ut 'Connected'
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
?>