<?php

define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', 'san3');
define('DB_NAME', 'campus');

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(mysqli_connect_error($con)) {
    echo "Noe er feil med tilkoblingen til databasen";
}

?>