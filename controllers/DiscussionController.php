<?php
require_once __DIR__ . '/../include/functions.php';
require_once __DIR__ . '/../services/Authentication.php';
require_once __DIR__ . '/../config/Database.php';
use Core\Authentication;
use Config\Database;
if (!isset($_SESSION['userID'])) {
    redirect(base_url() . '../index.php');
}
$error = "";

$auth = new Authentication;


if (isset($_REQUEST['messageto']) && $_REQUEST['messageto'] > 0) {
    $receiver_id = $_REQUEST['messageto'];
    $getdat = $auth->fetch_all("select * from ".Database::DB_TABLE_DISCUSSION_TABLE." where SenderID = ".$_SESSION['userID']." and RecipientID =".$_REQUEST['messageto']." order by DiscussionID desc");
}

if (isset($_REQUEST['SendButton']) && $_REQUEST['SendButton'] =='send' && isset($_REQUEST['messageto']) && intval($_REQUEST['messageto']) > 0 ) {
   $arr = array(
        'EntryDate' => date('Y-m-d h:i:s'),
        'SenderID' => $_SESSION['userID'],
        'RecipientID' => $_REQUEST['messageto'],
        'Message' => $_REQUEST['MessageTextbox'],
    );
   $auth->insertToCvs($arr,Database::DB_TABLE_DISCUSSION_TABLE);
   $getdat = $auth->fetch_all("select * from ".Database::DB_TABLE_DISCUSSION_TABLE." where SenderID = ".$_SESSION['userID']." and RecipientID =".$_REQUEST['messageto']." order by DiscussionID desc");
}