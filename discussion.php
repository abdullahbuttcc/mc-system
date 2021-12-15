
<?php
require_once __DIR__ . '/controllers/loginCheckController.php';
require_once __DIR__ . '/controllers/DiscussionController.php';
require_once __DIR__ . '/config/Database.php';
use Config\Database;
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
    <style>
        .fixTableHead {
          overflow-y: auto;
          height: 250px;
        }
        table {
          border-collapse: collapse;        
          width: 100%;
        }
        th,
        td {
          padding: 8px 15px;
          
        }
        .bg-lt {
            background-color: #e6fff5!important;
        }

        .ml-4, .mx-4 {
            margin-left: 57.5rem!important;
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
                <?php if ($_SESSION['userType'] === 1) { ?>
                <div class="pb-4">
                    <form method="get" id="search_client">
                        <select class="form-select" name="messageto" onchange="submit()">
                            <option> Select Client</option>
                            <?php foreach ($getclients as $client): 
                                $select ='';
                                    if($client['ClientContactID']==$_REQUEST['messageto']){$select="selected";}else{$select="";}
                                ?>
                                <option value="<?php echo $client['ClientContactID'];?>" <?php echo $select;?>><?php echo $client['FirstName']?></option>
                            <?php endforeach ?>
                        </select>
                    </form>
                </div>
                <div class="pb-4 pt-4">
                    <a class="btn btn-primary pull-right ml-4" href="./provider.php">Back</a><span></span>
                </div>
                <?php } ?>
                <div class="pb-4 row fixTableHead" id="tableDiv">
                    <table class="table" id="Table">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 50%;"></th>
                                <th style="width: 50%;"></th>
                            </tr>                        
                        </thead>
                        <tbody>
                        <?php if(!empty($getdat)){foreach ($getdat as $value) { ?>
                            <tr class="text-left">
                                <?php if($value['type'] == 'provider'){ 
                                    $sender = $auth->getRow('select FirstName from '.Database::DB_TABLES[1].' where '.Database::DB_ID_FIELDS[1].' = '.$value['SenderID']);
                                    ?>
                                <td class="bg-light"><?php echo $value['Message'].'<br><br><span>'.$sender['FirstName'].'</span>';?></td>
                                <td></td>
                                <?php }elseif($value['type']== 'client'){
                                    $sender = $auth->getRow('select FirstName from '.Database::DB_TABLES[0].' where '.Database::DB_ID_FIELDS[0].' = '.$value['SenderID']);
                                    ?>
                                <td></td>
                                <td class="bg-lt"><?php echo $value['Message'].'<br><br><span>'.$sender['FirstName'].'</span>';?></td>
                                <?php }?>
                            </tr>
                        <?php }}else{ ?>
                            <tr>
                                <?php if(!isset($_REQUEST['messageto']) && $_SESSION['userType'] === 0){?>
                                    <td class="text-center" colspan="2">Search a provider from the "Search & Book" tab to view the discussion.</td>
                                   <?php }else{?>
                                    <td class="text-center" colspan="2">Discussion not started yet.</td>
                                <?php }?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php if(isset($_REQUEST['messageto']) && !empty($_REQUEST['messageto'])){?>
                <div class="pb-4 pt-4">
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
            </main>
            <?php  }?>
        </div>
    </div>
</body>
<?php
    require_once __DIR__ . "/include/templates/sit-js.php";
?>
<script type="text/javascript">
    function submit(argument) {
         $('#search_client').submit();
    }
    //window.scrollTo(0,200);
    function scrollToBottom() {
       var scrollBottom = Math.max($('#Table').height() - $('#tableDiv').height() + 20, 0);
       $('#tableDiv').scrollTop(scrollBottom);
    }
    $(document).ready(scrollToBottom);
</script>
</html>