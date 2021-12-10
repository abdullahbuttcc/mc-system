<?php
session_start();
require_once __DIR__ . '/../services/Authentication.php';
require_once __DIR__ . '/../include/functions.php';

use Core\Authentication;

$response['errors'] = "Incorrect password";
$response['errors'] = "Invalid username or email";

// Use a post-redirect-get pattern to prevent post caching
$userIdInput = 'username';
$userPassInput = 'password';
$response = [];
$usernameError = "";
$passwordError = "";
if (checkForKeys($_POST, [$userIdInput, $userPassInput])) {
    $_SESSION[$userIdInput] = $_POST[$userIdInput];
    $_SESSION[$userPassInput] = $_POST[$userPassInput];
    redirect(base_url() . 'login.php');
}

$auth = new Authentication();
if (session_status() !== PHP_SESSION_NONE) {
    if (checkForKeys($_SESSION, [$userIdInput, $userPassInput])) {

        $response = $auth->login($_SESSION[$userIdInput], $_SESSION[$userPassInput]);
        if (!$response['success']) {
            unset($_SESSION[$userPassInput]);
            unset($_SESSION[$userIdInput]);
            if ($response['usernameError']) {
                $usernameError = "<div class='alert alert-danger' role='alert'>
                email not recognised
                </div>";
            }
            if ($response['passError']) {
                $passwordError = "<div class='alert alert-danger' role='alert'>
                password not recongised
                </div>";
            }
        } else {
            redirect(base_url() . 'redirector.php');
        }
    }
}
