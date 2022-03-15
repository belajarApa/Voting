<?php
include_once "F_loginRegister.php";
 if (isset($_POST["register"])){
     if (register($_POST) > 0){
     }else{
         echo mysqli_error(($conn));
     }
 }
  $token = $_GET["token"];
  $idtitle = $_GET["idtitle"];
  $query = mysqli_query($conn, "SELECT max(id_user) as kodeTerbesar FROM pengguna");
  $data = mysqli_fetch_array($query);
  $kodeBarang = $data['kodeTerbesar'];
  $urutan = (int)$kodeBarang;
  $urutan++;

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "Admin/link/head_loginRegister.php" ?>
<body class="hold-transition register-page">
<div class="register-box" style="margin-top: -2rem;">
  <div class="register-logo">
    <b></b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="post">
        <input type="hidden" name="id_pengguna" value="<?= $urutan  ?>">
        <input type="hidden" name="token" value="<?= $token  ?>">
        <input type="hidden" name="idtitle" value="<?= $idtitle  ?>">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" id="password" autocomplete="OFF" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" name="password2" class="form-control" id="password2" autocomplete="OFF" required placeholder="Retype Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<?php include_once "Admin/JS/scriptJs_loginRegister.php" ?>
</body>
</html>
