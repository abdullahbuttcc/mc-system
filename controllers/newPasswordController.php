<?php
session_start();
require_once __DIR__.'/../include/functions.php';
require_once __DIR__.'/../services/Recovery.php';

use Core\Recovery;
//If user is authenticated they cannot access password reset links.
if(isset($_SESSION['userID'])){
    redirect(base_url());
}





$recoveryProvider= new Recovery();

//If the user reaches this page through a GET request, show new password form after verifying the token
if(checkForKeys($_GET,['selector','token'])){
    $requestInfo=$recoveryProvider->verifyAccessToken($_GET['token'],$_GET['selector']);
    if(!$requestInfo){
        $output="<div class='alert alert-danger' role='alert'>
                The provided link has expired
                </div>";
    }else{
        $output= "<form action='". base_url().'createnewpassword.php'."' method='POST'>
        <h1 class='h3 mb-3 fw-normal'>Please fill this form</h1>

        <div class='form-floating'>
          <input name='password' type='password' class='form-control' id='floatingInput' placeholder='New Password'>
          <label for='floatingInput'>Password</label>

        </div>
        
        <input type='hidden' name='selector' value='".$_GET['selector']."'>
        <input type='hidden' name='token' value='".$_GET['token']."'>
        <button class='w-100 btn btn-lg btn-primary' type='submit'>Reset Password</button>
      </form>";
    }
}else if(empty($_POST)){
    $output="<div class='alert alert-danger' role='alert'>
                You have provided an invalid password reset link.
                </div>";
}
//If the user reaches this page though a POST request, change password after verifying token
if(checkForKeys($_POST,['selector','token','password'])){
    $requestInfo=$recoveryProvider->verifyAccessToken($_POST['token'],$_POST['selector']);
    if(!$requestInfo){
        $output="<div class='alert alert-danger' role='alert'>
                The provided link has expired
                </div>";
    }else{
        $recoveryProvider->changePassword($_POST['password'],$requestInfo['PwdResetEmail']);
        $output="<div class='alert alert-success' role='alert'>
                Your password has been changed
                </div>";
    }
}else if(empty($_GET)){
    $output="<div class='alert alert-danger' role='alert'>
                You have provided an invalid password reset link.
                </div>";
}


?>