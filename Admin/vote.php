<?php
include_once "functions_vote.php";
$title = $_GET["title"];
if (isset($_POST["continue"])) {
  if (addvote($_POST) > 0) {
    echo "<script>alert('vote berhasil ditambahkan');
    document.location.href = 'vote.php?title=$title';
    </script>";
  }
}
if (isset($_POST["finished"])) {
      echo "<script>
      document.location.href = 'index.php';
      </script>";
  }
  $query = mysqli_query($conn, "SELECT max(number_vote) as kodeTerbesar FROM vote WHERE id_Title = $title");
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
                <h4 class="mb-3" style="text-align: center;">Add Options</h4>
                <form method="POST" enctype= "multipart/form-data">
                <input type="hidden" name="number" value="<?= $number  ?>">
                <input type="hidden" name="title" value="<?= $title ?>">
                <div class="form-floating mb-3">
                <label for="nama">Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" autocomplete="OFF" placeholder=" Name " require>
                </div>
                <div class="form-floating mb-3">
                <label for="nama">Nickname</label>
                    <input type="text" name="nickname" class="form-control" id="name" autocomplete="OFF" placeholder=" Name " require>
                </div>
                <div class="form-floating mb-3">
                <label for="nama">Vision & Mission</label>
                    <input type="text" name="visimisi" class="form-control" id="visimisi" autocomplete="OFF" placeholder=" Vision and Mission " require>
                </div>
                <div class="form-floating  mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Explanation</label>
                  <textarea class="form-control" name="explanation" id="exampleFormControlTextarea1" placeholder="Explanation" style="height: 200px;"></textarea>
                </div>
                <div class="form-floating  mb-1">
                <style>
                                        .halo .w-100 {
                                            background-color: #F5F7FA;
                                            border: none;
                                            height: 60px;
                                            color: #676A94;
                                            padding-left: 30px;
                                            font-size: 14px;
                                            border-radius: none;
                                            outline-style: hidden;
                                        }

                                        .halo .w-100:focus {
                                            outline: none !important;
                                            border-color: aqua;
                                            box-shadow: 0 0 0 2px #BFDEFF;
                                        }
                                    </style>
                                    <div class="col-md-12 mb-5 halo">
                                        <label for="gambar">Image:</label>
                                        <input type="file" class="form-control" id="gambar" name="image" autocomplete="off" onchange="readURL(this);" style="max-width: 270px; margin-bottom: 1rem;">
                                        <img id="blah" src="http://placehold.it/180" alt="your image" />
                                    </div>
                                    <div class="col-md-12">
                                    <button type="submit" name="finished" class="btn btn-secondary float-lg-right mr-3" style="width: 100px;">Finished</button>
                                     <button type="submit" name="continue" class="btn btn-secondary float-lg-right mr-3" style="width: 100px;">continue</button>
                                    </div>
                </div>
              </form>
            </div>
            </div>
    <?php include_once "footer.php" ?>
</div>
<?php include_once "linkJS.php" ?>
</body>
</html>
