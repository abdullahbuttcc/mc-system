
<?php
require_once __DIR__ . '/controllers/loginCheckController.php';
require_once __DIR__ . '/controllers/DiscussionController.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discussion</title>
    <?php
        require_once __DIR__ . "/include/templates/site-header.php";
    ?>
    <style type="text/css">
        .dataTables_filter {
           width:auto;
           float: right;
           text-align: right;
        }
        .dataTables_filter >label {
           text-align: left;
        }
        .dataTables_paginate {
            width: auto;
           float: right;
           text-align: right;
        }
        #myTable_length >label{
           margin-top: 25px;
        }
    </style>
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
                <h1 class="text-center pb-4">Discussion</h1>
                <div class="pb-4">
                    <form method="POST">
                        <input type="hidden" name="receiver" value="">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a message here" id="floatingTextarea" style="height: 150px" name="MessageTextbox"></textarea>
                            <label for="floatingTextarea">Message</label>
                        </div>
                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary" name="SendButton" value="send">Send</button>
                        </div>
                    </form>
                </div>
                <div class="pb-4 row">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">DiscussionID</th>
                                <th scope="col">Sender</th>
                                <th scope="col">Recipient</th>
                                <th scope="col">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($getdat)){foreach ($getdat as $value) { ?>
                            <tr>
                                <td><?php echo $value['DiscussionID'];?></td>
                                <td><?php echo $value['SenderID'];?></td>
                                <td><?php echo $value['RecipientID'];?></td>
                                <td><?php echo $value['Message'];?></td>
                            </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="6" class="text-center">Nothing Message found</td>   
                            </tr>
                        <?php } ?>
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
<script type="text/javascript">
    $('#myTable').DataTable({
        "order": [[ 0, "desc" ]],
        "bFilter": true,
        "bInfo": true,
        "bLengthChange": true,
        oLanguage: {
           sLengthMenu: "_MENU_",
        }
    });
</script>
</html>