<?php 
include "../backend/config.php";

session_start();

if(isset($_POST['but_submit'])){

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($username != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from logintest where username='".$username."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['username'] = $username;
            header('Location: /pages/admin.php');

        }else{
            echo "Feil brukernavn eller passord";
        }

    }

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
        <?php include "../css/login.css"; ?>
    </style>
</head>
<body>
    <div class="container">
        <section id="header">
            <div class="nav">
                <div class="nav">
                    <nav class="navContainer">
                        <ul class="navItems">
                            <li class="navItem navHeader"><a href="./index.php" style="text-decoration: none; color: black;">Grenland Camping</a></li>
                            <li class="navItem navChild"><a href="./index.php" style="text-decoration: none; color: black;">Hjem</a></li>
                            <li class="navItem navChild"><a href="#" style="text-decoration: none; color: black;">Om oss</a></li>
                            <li class="navItem navChild"><a href="./index.php#cards" style="text-decoration: none; color: black;">Bestill</a></li>
                            <li class="navItem navChild loginBtn"><a href="./login.php" style="text-decoration: none; color: white;">Login</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        <section id="bestill">
            <div class="formContainer">
                <div class="formFlex">
                    <div class="formImg"></div>
                    <div class="form">
                        <form method="post" action="">
                            <h2 style="padding-left: 5px" class="Heading">Login</h2>
                            <div class="inputs">
                                <div class="input">
                                    <input type="text" placeholder="Brukernavn" name="username" id="username" required value="<?php echo $username; ?>">
                                </div>
                                <div class="input">
                                    <input style="margin-bottom: 20px" type="password" placeholder="Passord" name="password" id="password" required value="<?php echo $password; ?>">
                                </div>
                                <input value="Login" type="submit" name="but_submit" id="but_submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
