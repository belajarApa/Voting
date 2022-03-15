<?php
include_once "functions_vote.php";
if (isset($_POST["continue"])) {
  if (addtitle($_POST)) { 
  }
}
$query = mysqli_query($conn, "SELECT max(title_id) as kodeTerbesar FROM title");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int)$kodeBarang;
$urutan++;
$number = $urutan;
?>
<!DOCTYPE html>
<html lang="en">
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <?php  include_once "head.php"?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <?php include_once "sidebar.php" ?>
  <div class="content-wrapper">
  <div class="container card shadow p-4" style="width: 80%; margin-top: 5rem;">
                <h4 class="mb-3" style="text-align: center;">Add Title</h4>
                <form action="" method="POST">
                <div class="form-floating mb-3 mt-2">
                <label for="nama">Title</label>
                    <input type="hidden" name="title_id" value="<?= $number ?>">
                    <input type="text" name="title" class="form-control" id="title" autocomplete="OFF" placeholder=" Title " require>
                </div>
                <div class="col-md-12">
                <button type="submit" name="continue" class="btn btn-secondary float-lg-right mr-3" style="width: 100px;">continue</button>
                </div>
              </form>
  </div>
  </div>
    <?php include_once "footer.php" ?>
</div>
<?php include_once "linkJS.php" ?>
</body>
</html>
