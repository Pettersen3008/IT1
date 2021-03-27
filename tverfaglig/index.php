<?php
// Debugger 
//print_r($_POST);


if (isset($_POST['tid']) && isset($_POST['strekning']) && $_POST['tid'] > 0) {
    $tid = $_POST['tid'] / 60;
    $svar = $_POST['strekning'] / $tid;
}else {
    $svar = "0";
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VST</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-dark">
        <form method="post" action="">
            <h2 class="sr-only">Regn ut!</h2>
            <div class="illustration"><i class="icon ion-ios-search-strong"></i></div>
 <div class="form-group"><input class="form-control" type="tid" name="tid" placeholder="Tid"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Regn ut!</button></div>
            <div>            <div class="form-group"><input class="form-control" type="strekning" name="strekning" placeholder="Strekning" autofocus=""></div>
           
                <h3><?php echo "Svaret er {$svar} km/h" ?></h3>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>