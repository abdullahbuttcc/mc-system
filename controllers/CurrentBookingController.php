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
$user = "";

$auth = new Authentication;
if ($_SESSION['userType'] === 0) {
    $getdat = $auth->fetch_all("select b.*,p.FirstName,p.MiddleName,p.LastName from ".Database::DB_TABLE_BOOKINGTABLE." as b inner join ".Database::DB_TABLES[1]." as p on p.ProviderContactID = b.Provider  where b.Client= ".$_SESSION['userID']." and b.DateStart >= CURDATE()");
}
if ($_SESSION['userType'] === 1) {
    $getdat = $auth->fetch_all("select b.*,p.FirstName,p.MiddleName,p.LastName from ".Database::DB_TABLE_BOOKINGTABLE." as b inner join ".Database::DB_TABLES[0]." as p on p.ClientContactID  = b.Client  where b.Provider= ".$_SESSION['userID']." and b.DateStart >= CURDATE()");
}



// $auth = new Authentication;
// $getdat = $auth->fetch_all("select b.*,p.TradingName from ".Database::DB_TABLE_BOOKINGTABLE." as b inner join ".Database::DB_TABLE_PROVIDER_ORGANISATION_TABLE." as p on p.ProviderOrganisationID=b.Provider  where client = ".$_SESSION['userID']);

