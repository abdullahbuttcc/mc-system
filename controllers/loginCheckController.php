<?php
session_start();
require_once __DIR__ . '/../include/functions.php';
require_once __DIR__ . '/../config/Environment.php';

if (!isset($_SESSION['email'])) {
    redirect(base_url() . "login.php");
}
