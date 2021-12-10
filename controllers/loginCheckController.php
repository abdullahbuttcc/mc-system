<?php
session_start();
require_once __DIR__ . '/../include/functions.php';

if (!isset($_SESSION['email'])) {
    redirect(base_url() . "login.php");
}
