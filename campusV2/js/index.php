<?php 
include "./backend/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
    <?php include "./css/index.css" ?>
    </style>
</head>
<body>
    <div class="container">
        <section id="home">
        <?php include "./components/navbar.php" ?>
            <div class="flex">
                <div class="heading">
                    <h1>Velkommen til</h1>
                    <h2>Grenland Cabins</h2>

                    <a href="#about"><button>Les mer</button></a>
                </div>
            </div>
        </section>
        <section id="about">
            
        </section>
    </div>

    <script src="./js/navbar.js"></script>
    <script src="./js/scroll.js"></script>
</body>
</html>
