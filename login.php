<?php
session_start();
include_once "F_loginRegister.php";
// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id= '$id'");
    $row = mysqli_fetch_assoc($result);
    if ($key === hash('gost', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

//cek session
if (isset($_SESSION["login"])) {
    header("location: User/index.php");
    exit;
}

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE email = '$email'");
    $row = mysqli_fetch_assoc($cek);
    if (mysqli_num_rows($cek) === 1) {
      if (password_verify($password, $row["password"])) {
          $_SESSION["login"] = true;
      }
      if ($row['id_user'] == "1") {
        $_SESSION["login"] = true;
        $_SESSION['pid'] = $row["id_user"];
        header("location: Admin/index.php");
    } else {
        $_SESSION["login"] = true;
        $_SESSION['pid'] = $row["id"];
        header("location: User/index.php");
    }
  }
    $error = true;
}
?>


<?php
// session_start();
// include_once "F_loginRegister.php";
// //cek session
// if (isset($_SESSION["login"])) {
//     header("location: User/index.php");
//     exit;
// }

// if (isset($_POST["login"])) {
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE email = '$email'");
//     $row = mysqli_fetch_assoc($cek);
//     if (mysqli_num_rows($cek) === 1) {
//         if (password_verify($password, $row["password"])) {
//             $_SESSION["login"] = true;
//         }
//         if ($row['id_pengguna'] == "1") {
//           header("location: Admin/index.php");
//       } else {
//           $_SESSION['uid'] = $row["id"];
//           header("location: User/index.php");
//       }
//     }
//     $error = true;
// }
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
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
        <br>
       <a href="token.php"> <p>don't have an account yet</p></a>
      </div>
    </div>
  </div>
</div>
<?php include_once "Admin/JS/scriptJs_loginRegister.php" ?>
</body>
</html>
