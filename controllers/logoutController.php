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
