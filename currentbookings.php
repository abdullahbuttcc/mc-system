<?php
require_once __DIR__ . '/controllers/loginCheckController.php';
require_once __DIR__ . '/controllers/CurrentBookingController.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Current Bookings</title>
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
        <a class="btn btn-primary float-right ml-4 " style="margin-top: 2.0rem!important;" href="./provider.php">Back</a>
        <div class="container pt-4">
            <?php if(isset($error)){echo $error;}; ?>
            <main class="form-signin flex">
                <h1 class="text-center pb-4">Current Bookings</h1>
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <?php if ($_SESSION['userType'] === 0) {?>
                            <th scope="col">Client</th>
                            <?php } ?>
                            <?php if ($_SESSION['userType'] === 1) {?>
                            <th scope="col">Provider</th>
                            <?php } ?>
                            <th scope="col">Service</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Recurring</th>
                            <th scope="col">Frequency</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($getdat as $value) { ?>
                        <tr>
                            <td><?php echo ucfirst($value['FirstName'])." ".ucfirst($value['MiddleName'])." ".ucfirst($value['LastName']);?></td>
                            <td><?php echo $value['Service'];?></td>
                            <td><?php echo date('d-m-Y',strtotime($value['DateStart']));?></td>
                            <td><?php echo $value['TransactionPrice'];?></td>
                            <td><?php echo $value['Recurring'];?></td>
                            <td><?php if($value['Recurring']!=''){echo $value['Frequency'];}else{ echo $value['Recurring'];}?></td>
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