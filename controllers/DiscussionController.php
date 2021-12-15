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
if ($_SESSION['userType'] === 1) {
    $getclients = $auth->fetch_all("select ".Database::DB_TABLE_CLIENT_ID_FIELD.",FirstName from ".Database::DB_TABLE_CLIENT);
}
if (isset($_REQUEST['messageto']) && $_REQUEST['messageto'] > 0) {
    $receiver_id = $_REQUEST['messageto'];
    $getdat = $auth->fetch_all("select * from ".Database::DB_TABLE_DISCUSSION_TABLE." where SenderID = ".$_SESSION['userID']." and RecipientID =".$_REQUEST['messageto']);
}

if (isset($_REQUEST['SendButton']) && $_REQUEST['SendButton'] =='send' && isset($_REQUEST['messageto']) && intval($_REQUEST['messageto']) > 0 ) {
    $type = '';
    if ($_SESSION['userType'] === 0) {
        $type = 'client';
    }
    if ($_SESSION['userType'] === 1) {
        $type = 'provider';
    }
   $arr = array(
        'EntryDate' => date('Y-m-d h:i:s'),
        'SenderID' => $_SESSION['userID'],
        'RecipientID' => $_REQUEST['messageto'],
        'Message' => $_REQUEST['MessageTextbox'],
        'type' => $type
    );
   $auth->insertToCvs($arr,Database::DB_TABLE_DISCUSSION_TABLE);
   $getdat = $auth->fetch_all("select * from ".Database::DB_TABLE_DISCUSSION_TABLE." where SenderID = ".$_SESSION['userID']." and RecipientID =".$_REQUEST['messageto']);
}