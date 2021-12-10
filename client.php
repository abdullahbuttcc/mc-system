<?php
require_once __DIR__ . '/controllers/loginCheckController.php';

if ($_SESSION['userType'] === 1) {
    redirect(base_url() . 'provider.php');
}

if ($_SESSION['userType'] === 2) {
    redirect(base_url() . 'agency.php');
}
if ($_SESSION['userType'] === 0) {
    $nav = file_get_contents(__DIR__ . "/include/templates/navbar-loggedin-client.php");
}
if ($_SESSION['userType'] === 1) {
    $nav = file_get_contents(__DIR__ . "/include/templates/navbar-loggedin-provider.php");
}
if ($_SESSION['userType'] === 2) {
    $nav = file_get_contents(__DIR__ . "/include/templates/navbar-loggedin-agency.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CUSTOM CSS -->
    <link href="assets/css/services.css" rel="stylesheet">
</head>

<body class="text-center">
    <?php echo $nav ?>

    <!-- SIGN IN FORM -->
    <div class="container">

        <main class="form-signin flex">
            <h1>This is the Client area</h1>
        </main>
    </div>



</body>

</html>