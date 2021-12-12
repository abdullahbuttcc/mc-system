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
    $birthDate = $_POST['BirthYear'] . "-" . date_parse($_POST['BirthMonth'])['month'] . "-" . $_POST['BirthDay'];
    $arr  = array(
        'EntryDate' => $getdat['EntryDate'],
        'ClientNDISNumber' => $_POST['NDISNumberValue'], 
        'FirstName' => $_POST['FirstNameTextbox'],
        'MiddleName' => $_POST['MiddleNameTextbox'],
        'LastName' => $_POST['LastNameTextbox'],
        'BirthDate' => $birthDate,
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
        'EmergencyContact' => $getdat['EmergencyContact'],
        'AggregateRating' => $_POST['AggregateRatingLabelValue'],
        'NumberOfRatings' => $_POST['NumberOfRatingsLabelValue'],
        'HomePhone' => $_POST['HomePhoneTextBox'],
        'Living' => $getdat['Living'],
        'DepartureDate' => $getdat['DepartureDate'],
        'DepartureReason' => $getdat['DepartureReason'],
        'LastUpdated' => date('Y-m-d h:i:s'),
    );
    $response = $auth->update($_POST['id_c'], $arr , Database::DB_TABLES[$_SESSION['userType']],Database::DB_ID_FIELDS[$_SESSION['userType']]);
    $getdat = $auth->getRow("select * from ".Database::DB_TABLES[$_SESSION['userType']]." where ".Database::DB_ID_FIELDS[$_SESSION['userType']]." = ".$_SESSION['userID']);
    if ($response['usernameError']) {
        $error = "<div class='alert alert-danger' role='alert'>
                You have entered a duplicate username
                </div>";
    }else {
        $error = "<div class='alert alert-success' role='alert'>
                New user created successfully
                </div>";
    }
}
