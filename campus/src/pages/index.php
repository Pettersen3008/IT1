<?php 
require('../backend/config.php');

if(isset($_POST['subPer'])){
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        <?php 
        include "../css/index.css"; 
        ?>
    </style>
</head>
<body>
    <div class="container">
        <section id="header">
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
        </section>
        <section id="cards"> 
            <h1 style="text-align: center; padding-top: 100px; font-weight: 900; font-size: xx-large;"> Skal du bestille ?</h1>
            <div class="cards">

                <?php
                // Velger alt fra database
                $sql_querry = 'SELECT * FROM cabins';
                if($result = mysqli_query($con, $sql_querry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){

                            // Kan adde bilde til database om du vil det også. Bilde for hver hytte

                            // Men tar det på den enkle måten nå
                            ?>
                            <div class="card">
                                <img src="../img/img1.jpg" alt="" class="cardImg">
                                <p class="carditems"> 
                                    ID: <?=$row['id']?> <br>
                                    Navn: <?=$row['name']?> <br>
                                    Sted: <?=$row['place']?> <br>
                                    Rom: <?=$row['room']?> <br>
                                    Senger: <?=$row['bed']?> <br>

                                <button value="myBtn" id="myBtn" class="imgBtn">Bestill her</button>
                            </div>
                            <?php
                        }
                        mysqli_free_result($result);
                    } else{
                        echo "Fant ikke noen i databasen.";
                    }
                } else{
                    echo "Kunne ikke utføre sql $sql_querry. " . mysqli_error($con);
                }
                ?>
                
            </div>
        </section>
    </div>
    

    <!-- Denne er skjult -->
<div id="mymodal" class="modal">

    <!-- Modal -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="index.php" method="post">
            <div class="inputContainer">
                <div class="inputs">
                    <h1 style="text-align: center; padding-bottom: 20px;">Vi trenger litt informasjon om deg: </h1>


                    <div class="input">
                        <p> Navn: </p>
                        <input class="inputBox" type="text" name="name" placeholder="Navn" required/>

                        <p>Email: </p>
                        <input class="inputBox" type="text" name="email" placeholder="Email" required />

                        <p>Telefon: </p>
                        <input class="inputBox" type="phone" name="phone" placeholder="Telfon" required />

                        <p>Dato: </p>
                        <input class="inputBox" type="date" name="date" placeholder="Dato" required style="margin-top: 0px;"/>

                        <input type="submit" name="subPer" value="Bestill nå" class="modalBtn" style="margin-left: 20px;">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/scroll.js"></script>
<script>

function modalShow() {
  var modal = document.getElementById("mymodal");

  var btn = document.getElementById('myBtn');

  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}

</script>
</body>
</html>
