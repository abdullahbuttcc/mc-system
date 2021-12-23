<?php
require_once __DIR__ . '/controllers/loginCheckController.php';
require_once __DIR__ . '/controllers/SearchController.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>
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
                <h1 class="text-center pb-4">Search</h1>
                <div class="pb-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="ServiceLabel" class="form-label">Service</label>
                            <select class="form-select" aria-label="Default select example" name="ServiceDropBox">
                                <option value="any">Any</option>
                                <?php
                                    foreach($getservices as $service){?>
                                        <option value="<?php echo $service['Service']?>"><?php echo ucfirst($service['Service']);?></option>
                                    <?php } ?>
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="SuburbLabel" class="form-label">Suburb</label>
                            <input type="text" class="form-control" id="SuburbTextbox" name="SuburbTextbox" value="<?php if(isset($_REQUEST['SuburbTextbox'])){echo $_REQUEST['SuburbTextbox'];};?>">
                        </div>
                        <div class="mb-3">
                            <label for="SuburbRangeLabel" class="form-label">Distance</label>
                            <select class="form-select" aria-label="Default select example" name="SuburbRangeDropbox">
                                <option> Select Distance</option>
                                <option value="any" <?php if(isset($_REQUEST['SuburbRangeDropbox']) &&$_REQUEST['SuburbRangeDropbox']=='any'){ echo 'selected';}?>>Any</option>
                                <option value="5" <?php if(isset($_REQUEST['SuburbRangeDropbox']) &&$_REQUEST['SuburbRangeDropbox']=='5'){ echo 'selected';}?>>5</option>
                                <option value="10" <?php if(isset($_REQUEST['SuburbRangeDropbox']) &&$_REQUEST['SuburbRangeDropbox']=='10'){ echo 'selected';}?>>10</option>
                                <option value="15" <?php if(isset($_REQUEST['SuburbRangeDropbox']) &&$_REQUEST['SuburbRangeDropbox']=='15'){ echo 'selected';}?>>15</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="SearchButton" value="search">Search</button>
                    </form>
                </div>
                <div>
                    <?php if(!empty($getdat)){?>
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Provider</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th scope="col">Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($getdat)){foreach ($getdat as $value) { ?>
                            <tr>
                                <td><?php echo $value['DisplayLogo'];?></td>
                                <td><?php echo '<a href="discussion.php?messageto='.$value['ProviderID'].'" target="_blank">'.$value['TradingName'].'</a>';?></td>
                                <td><?php echo $value['MobilePhone'];?></td>
                                <td><?php echo $value['Email1'];?></td>
                                <td><?php echo $value['Website'];?></td>
                                <td><?php echo $value['AggregateRating'];?></td>
                            </tr>
                            <?php } }else{ ?>
                            <tr>
                                <td colspan="6" class="text-center">Nothing matches your search criteria.</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
                    
            </main>
        </div>
    </div>
</body>
<?php
require_once __DIR__ . "/include/templates/sit-js.php";
?>
</html>
