<?php
include "./backend/config.php";

session_start();

// Sjekker om admin er logget inn
if (!isset($_SESSION['username'])) {
	header('Location: /pages/login.php');
	exit;
}

if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    echo "Det her skjedd en feil på vegen";
    session_destroy();
}

// Printer ut id i tabell og holder verdiene for nye input
$stmt = $con->prepare("SELECT name, email, phone FROM persons WHERE id = '$id' ");
$stmt->execute();
$stmt->bind_result($name, $email, $phone);
$stmt->fetch();
$stmt->close();

// Oppdaterer data
if(isset($_POST['update'])){

    $new_name = $_POST['new_name'];
    $new_email = $_POST['new_email'];
    $new_phone = $_POST['new_phone'];

    $sql_querry = "UPDATE persons SET name = '$new_name', email = '$new_email', phone = '$new_phone' WHERE id = '$id' ";

    if (mysqli_query($con, $sql_querry)) {
        echo "Update godkjent";
    } else {
        echo "Error updating " . mysqli_error($con);
    }
}

// Slett data
if(isset($_POST['delete'])){

    $sql_querry = "DELETE FROM persons WHERE id = '$id' ";

    if (mysqli_query($con, $sql_querry)) {
        header('location: /pages/admin.php');
    } else {
        echo "Error updating " . mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style>
            <?php include "./css/admin.css" ?>
        </style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Edit Panel </h1>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>

        <form method="post" action="edit.php">
            <div class="content">
                <div>
                    <h2> Informasjon: </h2>
                    <table>
                        <tr>
                            <td>Navn:</td>
                            <td><?=$name?></td> 
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?=$email?></td>
                        </tr>
                        <tr>
                            <td>Telefon:</td>
                            <td><?=$phone?></td>
                        </tr>
                    </table>
                    <span>Vil du slette denne brukeren?  : </span>
                    <input name="delete" type="submit" class="editBtn" id="delete" value="Delete" style="background: red;" />
                </div>
            </div>
        </form>

        <form method="post" action="edit.php">
            <div class="content">
                <div>
                    <h2> Vil du endre informasjonen ? </h2>
                    <table>
                        <tr>
                            <td>Navn:</td>
                            <td><input name="new_name" type="text" value="<?=$name ?>"></td> 
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input name="new_email" type="text" value="<?=$email ?>"></td>
                        </tr>
                        <tr>
                            <td>Telefon:</td>
                            <td><input name="new_phone" type="text" value="<?=$phone?>"></td>
                        </tr>
                    </table>
                    <div class="boxB">
                        <input name="update" type="submit" class="editBtn" id="update" value="Update" /> <br>
                        <a href="./admin.php"> Tilbake </a>
                    </div>
                </div>
            </div>
        </form>
	</body>
</html>