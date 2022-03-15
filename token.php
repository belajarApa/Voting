<?php
include_once "F_loginRegister.php";
 if (isset($_POST["continue"])){
     if (token($_POST)){
     }else{
         echo mysqli_error(($conn));
     }
 }

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "Admin/link/head_loginRegister.php" ?>
<body class="hold-transition login-page">
<div class="login-box" style="margin-top: -5rem;">
  <div class="login-logo">
    <b></b>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter your token</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="token" required placeholder="Token">
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <div class="col-4">
            <button type="submit" name="continue" class="btn btn-primary btn-block">Continue</button>
          </div>
        </div>
      </form>
      <div class="social-auth-links text-center mb-3"><br>
      <a href="login.php" class="text-center">I already have a membership</a>
      </div>
    </div>
  </div>
</div>
<?php include_once "Admin/JS/scriptJs_loginRegister.php" ?>
</body>
</html>
