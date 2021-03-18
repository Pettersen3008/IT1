<?php
include "../backend/config.php";

session_start();

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

if(isset($_POST) and !empty($_POST['setid'])){
	$_SESSION['id'] = $_POST['setid'];
	header('Location: edit.php');
}
// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<style>
        <?php include "../css/admin.css"; ?>
    </style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Admin</h1>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2 style="margin-left: 20px;">Home Page</h2>
			<p>Welcome back, <?=$_SESSION['username']?>!</p>
		</div>

		<?php
		// Velger alt fra database
		$sql_querry = 'SELECT * FROM persons';
		if($result = mysqli_query($con, $sql_querry)){
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)){
					?>
					<div class="content">
						<p> 
							ID: <?=$row['id']?> <br> 
							Navn: <?=$row['name']?> <br>
							Email: <?=$row['email']?> <br>
							Telefon: <?=$row['phone']?> <br>
							Date: <?=$row['date']?> <br>
							<form action="admin.php" method="post">
								<input type="hidden" name="setid" value="<?=$row['id']?>" />
								<input type="submit" value="Edit" class="editBtn" style="margin-left: 20px;">
							</form>
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
	</body>
</html>