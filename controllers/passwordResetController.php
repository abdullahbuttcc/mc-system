<?php
session_start();
require_once __DIR__ . '/../include/functions.php';
require_once __DIR__ . '/../services/Recovery.php';

use Core\Recovery;
//If user is authenticated they cannot access password reset links.
if (isset($_SESSION['userID'])) {
    redirect(base_url());
}
$alert = "";
//Use post-redirect-get pattern to avoid $_POST retention
if (checkForKeys($_POST, ['username'])) {
    $_SESSION['username'] = $_POST['username'];
    redirect(base_url() . "passwordreset.php");
}

if (checkForKeys($_SESSION, ['username'])) {
    $recoveryProvider = new Recovery();
    $success = $recoveryProvider->requestPasswordRecovery($_SESSION['username']);
    if (!$success) {
        $alert = "<div class='alert alert-danger' role='alert'>
                email not found in records
                </div>";
    } else {
        $alert = "<div class='alert alert-success' role='alert'>
                An email has been sent to your email address with a link to reset your password.
                </div>";
    }
    session_unset();
}
