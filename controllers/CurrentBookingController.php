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
$getdat = $auth->fetch_all("select b.*,p.TradingName from ".Database::DB_TABLE_BOOKINGTABLE." as b inner join ".Database::DB_TABLE_PROVIDER_ORGANISATION_TABLE." as p on p.ProviderOrganisationID=b.Provider  where client = ".$_SESSION['userID']);

