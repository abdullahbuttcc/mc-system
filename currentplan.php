<?php
require_once __DIR__ . '/controllers/loginCheckController.php';
require_once __DIR__ . '/controllers/CurrentPlanController.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Current Plan</title>
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
                <h1 class="text-center pb-4">Current Plan</h1>
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Start Date</th>
                            <th scope="col">Service</th>
                            <th scope="col">Approved</th>
                            <th scope="col">Available</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($getdat as $value) { ?>
                        <tr>
                            <td><?php echo date('d-m-Y',strtotime($value['PlanStartDate']));?></td>
                            <td><?php echo $value['Service'];?></td>
                            <td><?php echo $value['AmountApproved'];?></td>
                            <td><?php echo $value['AmountAvailable'];?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>
<?php
require_once __DIR__ . "/include/templates/sit-js.php";
?>
</html>