<?php
session_start();

require_once __DIR__ . '/../services/Authentication.php';

require_once __DIR__ . '/../include/functions.php';

use Core\Authentication;

if (isset($_GET['logout'])) {
    $auth = new Authentication();
    $auth->logout();
    redirect(base_url() . 'index.php');
}
if (!isset($_SESSION['userID'])) {
    redirect(base_url() . 'index.php');
}

if ($_SESSION['userType'] === 0) {
    redirect(base_url() . 'client.php');
}
if ($_SESSION['userType'] === 1) {
    redirect(base_url() . 'provider.php');
}
if ($_SESSION['userType'] === 2) {
    redirect(base_url() . 'agency.php');
}
