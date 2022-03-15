<?php
include_once "functionsDate.php";
if (isset($_POST["continue"])) {
  if (Fdate($_POST) > 0) { 
      echo"<script>
      alert('Waktu diset');
      </script>";
  }
}
$tgl_min = date('m-d-Y');
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
                <h4 class="mb-3" style="text-align: center;">Add Token</h4>
                <form action="" method="POST">
                <div class="form-floating mb-3 mt-2">
                <label for="inputState">Title Vote</label>
                <select id="inputState" name="titleVote" class="form-control" require>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM title");
                    while ($data = mysqli_fetch_assoc($query)){?>
                    <option value="<?= $data['title_id']; ?>"><?= $data["title"]; ?></option>
                    <?php } ?> 
                </select>
                </div>
               <div class="row">
                   <div class="col-6 col-col-md-6">
                   <div class="form-floating mb-3 mt-2">
                   <label for="nama">Tanggal Mulai</label>
                   <input type="text" id="date" min="<?= $tgl_min ?>" name="tglmulai" class="form-control" autocomplete="OFF" placeholder="Tanggal Mulai" require>
                </div>
                   </div>
                   <div class="col-2 col-col-md-2">
                   <div class="form-floating mb-3 mt-2">
                   <label for="nama">Jam Mulai</label>
                   <input type="time" name="jammulai" id="waktu_mulai_masuk"  class="form-control" onkeyup="Waktumasuk();" /> 
                </div>
                    </diV>
               </div>
               <div class="row">
                   <div class="col-6 col-col-md-6">
                   <div class="form-floating mb-3 mt-2">
                   <label for="nama">Tanggal Akhir</label>
                   <input type="text" id="tanggal" min="<?= $tgl_min ?>" name="tglakhir" class="form-control" autocomplete="OFF" placeholder="Tanggal akhir" require>
                </div>
                   </div>
                   <div class="col-2 col-col-md-2">
                   <div class="form-floating mb-3 mt-2">
                   <label for="nama">Jam Akhir</label>
                   <input type="time" name="jamakhir" id="waktu_mulai_masuk"  class="form-control" onkeyup="Waktumasuk();" /> 
                </div>
                   </div>
                <div class="col-md-12">
                <button type="submit" name="continue" class="btn btn-secondary float-lg-right mr-3" style="width: 100px;">continue</button>
                </div>
              </form>
  </div>
  </div>
    <?php include_once "footer.php" ?>
</div>
</script>
</body>
</html>
