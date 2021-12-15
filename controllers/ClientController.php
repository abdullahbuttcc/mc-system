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

$getdat = $auth->getRow("select * from ".Database::DB_TABLES[$_SESSION['userType']]." where ".Database::DB_ID_FIELDS[$_SESSION['userType']]." = ".$_SESSION['userID']);
if (isset($_POST['UpdateDetailsButton']) && $_POST['UpdateDetailsButton']=='update'){
    $error = '';
    if (isset($_POST['BirthYear']) && isset($_POST['BirthMonth']) && isset($_POST['BirthDay'])) {
        $birthDate = $_POST['BirthYear']."-".$_POST['BirthMonth']."-". $_POST['BirthDay'];
    }
    //die($birthDate);
    $arr  = array(
        'EntryDate' => $getdat['EntryDate'],
        'FirstName' => $_POST['FirstNameTextbox'],
        'MiddleName' => $_POST['MiddleNameTextbox'],
        'LastName' => $_POST['LastNameTextbox'],        
        'UnitNumber' => $_POST['UnitNumberTextBox'],
        'StreetNumber' => $_POST['StreetNumberTextBox'],
        'StreetName' => $_POST['StreetNameTextbox'],
        'StreetType' => $_POST['StreetTypeTextBox'],
        'Suburb' => $_POST['SuburbTextBox'],
        'State' => $_POST['StateDropBox'],
        'Postcode' => $_POST['PostcodeTextBox'],
        'Email1' => $_POST['Email1TextBox'],
        'Email2' => $_POST['Email2TextBox'],
        'MobilePhone' => $_POST['MobilePhoneTextbox'],
        'PreferredContact' => $_POST['PreferredContactTextBox'],
        'SecurityQuestion' => $_POST['SecurityQuestionTextBox'],
        'Password' => $getdat['Password'],
        'SecurityAnswer' => $getdat['SecurityAnswer'],
        'CommencementDate' => $_POST['CommencementDateValue'],
        'AggregateRating' => $_POST['AggregateRatingLabelValue'],
        'NumberOfRatings' => $_POST['NumberOfRatingsLabelValue'],
        'DepartureDate' => $getdat['DepartureDate'],
        'DepartureReason' => $getdat['DepartureReason'],
        'LastUpdated' => date('Y-m-d h:i:s'),
    );
    if ($_SESSION['userType'] === 0) {
        $arr['ClientNDISNumber'] = $_POST['NDISNumberValue'];
        $arr['BirthDate'] = $birthDate;
        $arr['HomePhone'] = $_POST['HomePhoneTextBox'];
        $arr['Living'] = $getdat['Living'];
        $arr['EmergencyContact'] = $getdat['EmergencyContact'];
    }
    if ($_SESSION['userType'] === 1) {
        $arr['ProviderNDISNumber'] = $_POST['NDISNumberValue'];
        $arr['WorkPhone'] = $_POST['HomePhoneTextBox'];
        $arr['ProviderOrganisation'] = $getdat['ProviderOrganisation'];
        $arr['Active'] = $getdat['Active'];
    }
    // echo Database::DB_TABLES[$_SESSION['userType']];
    // echo Database::DB_ID_FIELDS[$_SESSION['userType']];
    // print_r($arr);die();
    $response = $auth->update($_POST['id_c'], $arr , Database::DB_TABLES[$_SESSION['userType']],Database::DB_ID_FIELDS[$_SESSION['userType']]);
    $getdat = $auth->getRow("select * from ".Database::DB_TABLES[$_SESSION['userType']]." where ".Database::DB_ID_FIELDS[$_SESSION['userType']]." = ".$_SESSION['userID']);
    if ($response['usernameError']) {
        $error = "<div class='alert alert-danger text-center' role='alert'>
                Please fill all inputs
                </div>";
    }else {
        $error = "<div class='alert alert-success text-center' role='alert'>
                Data update successfully
                </div>";
    }
}
