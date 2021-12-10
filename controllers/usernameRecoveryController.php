<?php 
session_start();
require_once __DIR__.'/../include/functions.php';
require_once __DIR__.'/../services/Recovery.php';

use Core\Recovery;
//If user is authenticated they cannot access username retrieval links.
if(isset($_SESSION['userID'])){
    redirect(base_url());
}
$output= "<form action='". base_url().'recoverusername.php'."' method='POST'>
        <h1 class='h3 mb-3 fw-normal'>Please fill this form</h1>

        <div class='form-floating'>
          <input name='email' type='text' class='form-control' id='floatingInput' placeholder='Enter Email'>
          <label for='floatingInput'>Email</label>

        </div>
        
        <button class='w-100 btn btn-lg btn-primary' type='submit'>Recover Username</button>
      </form>";
//Use post-redirect-get pattern to avoid $_POST retention
if(checkForKeys($_POST,['email'])){
    $_SESSION['email']=$_POST['email'];
    redirect(base_url()."recoverusername.php");
}

if(checkForKeys($_SESSION,['email'])){
    $recoveryProvider = new Recovery();
    $success=$recoveryProvider->requestUsernameRecovery($_SESSION['email']);
    if(!$success){
        $output="<div class='alert alert-danger' role='alert'>
                Email not found in records.
                </div>";
    }else{
        $output="<div class='alert alert-success' role='alert'>
                An email has been sent to your email address with your username.
                </div>";
    }
    session_unset();
}




?>