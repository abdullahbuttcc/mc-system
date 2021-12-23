<?php
require_once __DIR__ . '/controllers/loginCheckController.php';
require_once __DIR__ . '/controllers/ServiceController.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services</title>
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
        <a class="btn btn-primary float-right ml-4" style="margin-top: 2.0rem!important;" href="./provider.php">Back</a>
        <div class="container pt-4">
            <?php if(isset($error)){echo $error;}; ?>
            <main class="form-signin flex">
                <h1>Services</h1>
                <div class="pb-4 row">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Sr#</th>
                                <th scope="col"> Services </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($getdat)){$i=0;foreach ($getdat as $value) { ?>
                            <tr class="text-center">
                                <td><?php echo $i=$i+1;?></td>
                                <td><?php echo $value['Service'];?></td>
                            </tr>
                        <?php } }?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
<?php
require_once __DIR__ . "/include/templates/sit-js.php";
?>
</html>