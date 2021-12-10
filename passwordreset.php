<?php
require_once __DIR__ . '/controllers/passwordResetController.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- CUSTOM CSS -->
  <link href="assets/css/login.css" rel="stylesheet">
</head>

<body class="text-center">
   <?php include_once __DIR__."/include/templates/navbar-loggedout.php"?>

  <!-- SIGN IN FORM -->
  <div class="container-login">

    <main class="form-signin flex">
     <?php
      echo $alert;
      ?>
      <form action="<?php echo base_url()."passwordreset.php" ?>" method="POST">
        <h1 class="h3 mb-3 fw-normal">Please fill this form</h1>

        <div class="form-floating">
          <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Username or Email</label>

        </div>
        


        <button class="w-100 btn btn-lg btn-primary" type="submit">Request Reset</button>
      </form>

    </main>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>