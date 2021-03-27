<?php

// Inkluderer vi databasen
include "./backend/config.php";

// Her sjekker vi om knappen submit er satt(trykket)
// Deretter utfører det som kommer inni {}
if(isset($_POST['submit'])) {

    // Her henter vi ut hva bruker skriver inn i input formen og lagrer det i variabler
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    // Her lager vi en querry som vi skal sende inn til databasen vår
    $sql_querry = "INSERT INTO persons (name, email, phone, date) VALUES ('$name', '$email', '$phone', '$date')";
    
    // Her sender vi inn til database og får response
    if (mysqli_query($con, $sql_querry)) {
        header('location: /pages/complete.php');
    } else {
        echo "Error updating <br>" . mysqli_error($con). "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestill</title>
    <style>
    <?php include "./css/bestill.css" ?>
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="nav">
                <nav class="navContainer">
                    <ul class="navItems">
                        <li class="navItem navHeader"><a href="index.php" style="text-decoration: none; color: black;">Grenland Camping</a></li>
                        <li class="navItem navChild"><a href="index.php" style="text-decoration: none; color: black;">Hjem</a></li>
                        <li class="navItem navChild"><a href="#" style="text-decoration: none; color: black;">Om oss</a></li>
                        <li class="navItem navChild"><a href="#cards" style="text-decoration: none; color: black;">Bestill</a></li>
                        <li class="navItem navChild loginBtn"><a href="./login.php" style="text-decoration: none; color: black;">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="form">
            <form action="" method="post">
                <div class="inputs">
                    <div class="input">
                        <div class="input-header">
                            <h1 style="padding-left: 5px; padding-bottom: 20px;">Informasjon</h1>
                        </div>
                        <div class="label">
                            <input name="name" type="text" placeholder="Navn" class="inputTxt" required>
                        </div>

                        <div class="label">
                            <input name="email" type="email" placeholder="Email" class="inputTxt" required>
                        </div>
                        <div class="label">
                            <input name="phone" type="tel" placeholder="Telefon" class="inputTxt" required>
                        </div>
                        <div class="label">
                            <input name="date" type="date" placeholder="Dato du ønsker" class="inputTxt" required> 
                        </div>

                        <input name="submit" type="submit" value="Send" class="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>