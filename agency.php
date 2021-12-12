<?php
require_once __DIR__ . '/controllers/loginCheckController.php';
require_once __DIR__ . '/controllers/CurrentPlanController.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agency</title>
    <?php
        require_once __DIR__ . "/include/templates/site-header.php";
    ?>
</head>

<body>
    <?php 
        if ($_SESSION['userType'] === 0) {
            include(__DIR__ . "/include/templates/navbar-loggedin-client.php");
        }
        if ($_SESSION['userType'] === 1) {
            include(__DIR__ . "/include/templates/navbar-loggedin-provider.php");
        }
        if ($_SESSION['userType'] === 2) {
            include(__DIR__ . "/include/templates/navbar-loggedin-agency.php");
        }
    ?>

    <!-- SIGN IN FORM -->
    <div class="col-9">
        <div class="container pt-4">
            <?php if(isset($error)){echo $error;}; ?>
            <main class="form-signin flex">
                <h1 >Agency</h1>

            </main>
        </div>
    </div>
</body>
<?php
require_once __DIR__ . "/include/templates/sit-js.php";
?>
</html>