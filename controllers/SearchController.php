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
$getservices = $auth->fetch_all("select Service from ".Database::DB_TABLE_SERVICES_PROVIDED_TABLE."   where Active ='yes' group by Service");
print_r($getservices);
if (isset($_REQUEST['SearchButton']) && $_REQUEST['SearchButton'] == 'search') {
    $ser ='';
    if($_REQUEST['ServiceDropBox']==='any'){
        $ser = '';
    }else{
        $ser = "s.Service ='".$_REQUEST['ServiceDropBox']."' and";
    }
    $getdat = $auth->fetch_all("select s.*,p.* from ".Database::DB_TABLE_SERVICES_PROVIDED_TABLE." as s inner join ".Database::DB_TABLE_PROVIDER_ORGANISATION_TABLE." as p on p.ProviderOrganisationID=s.ProviderID  where ".$ser." s.Suburb ='".$_REQUEST['SuburbTextbox']."' group by s.Service");
}