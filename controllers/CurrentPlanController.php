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
$getdat = $auth->fetch_all("select * from ".Database::DB_TABLE_NDISPLANTABLE." where client = ".$_SESSION['userID']);

