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
$getdat = $auth->fetch_all("select Service from ".Database::DB_TABLE_SERVICES_PROVIDED_TABLE." as s inner join ".Database::DB_TABLE_PROVIDER." as p on p.ProviderContactID=s.ProviderID  where s.ProviderID =".$_SESSION['userID']." group by s.Service");
