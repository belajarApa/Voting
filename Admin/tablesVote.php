<?php
include_once "functions_vote.php";
$vote = vote ("SELECT v.number_vote, v.name, t.title FROM vote AS v INNER JOIN title AS t ON t.title_id = v.id_Title ");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
</head>
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
            <section class="content-header">
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Table Vote</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <th style="width: 10px;">Number</th>
                                                <th>Title Vote</th>
                                                <th>Preferred name</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                       <?php $i = 1 ?>
                                       <?php foreach ($vote as $row) : ?>
                                       <tr>
                                                <td style="text-align: center;"><?=  $i ?></td>
                                                <td><?= $row["title"]?></td>
                                                <td><?= $row["name"]. ' ' .'('.$row["number_vote"] .')'?></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach;  ?>
                                       </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once "footer.php" ?>
    </div>
</body>
<?php include_once "JS/scriptJs_Tvote.php" ?>
</html>