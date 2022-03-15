<?php
session_start();
include_once "functions_user.php";
$pid = $_SESSION["pid"];
$lihat = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '$pid'");
$row = mysqli_fetch_assoc($lihat);
$idtitle = $row["idTitle"];
//cek session
if ($_SESSION["pid"] == '1') {
    header("location: ../Admin/index.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}
$vote = tvote("SELECT * FROM vote WHERE id_Title = '$idtitle'");
$cek = mysqli_query($conn, "SELECT * FROM dates WHERE idTitle = '$idtitle'");
$row = mysqli_fetch_assoc($cek);

$tglmulai = $row['tgl_mulai'];
$tglakhir = $row['tgl_akhir'];
$jmmulai = $row['jam_awal'];
$jmakhir = $row['jam_akhir'];

date_default_timezone_set('Asia/Jakarta');
$tgl_sekrang = date('m-d-Y');
$jam_sekarang = date('H:i');

if (!$tgl_sekrang == $tglmulai) {
	header("location: ../login.php");
	exit;
}
if (!$jam_sekarang == $jmmulai) {
	header("location: ../login.php");
	exit;
}
?>
<!doctype html>
<html lang="en">
<?php include_once "head.php" ?>
	<body onload="countDown();"> 
		<div class="Loader"></div>
		<div class="wrapper">  
			<?php include_once "nav.php" ?>
			<div class="clearfix"></div>

			<!-- Main Banner Section Start -->
			<div class="hero-banner" data-ride="carousel" data-pause="hover" data-interval="false" >
				<div class="hero-img">
					<img src="assets/img/gtrr.jpg" class="img-responsive" alt="">
				</div>
				<div class="container">
					<div class="row">
						<div class="col col-md-6 col-sm-8">
							<div class="content">
								<h2>Already chosen?</h2>
								<p>Support your choice by voting below.<br>Use your voting rights, Be a smart & qualified voter.</p>
								<br>
								<h4 style="color: green;"  id="waktu"></h4>
                            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Main Banner Section End -->
			
			<!-- ====================== Freelancer Slide ================= -->
			<section>
				<div class="container">
					<div class="row">
						<div class="grid-slide">
							
							<!-- Single Freelancer -->
							<?php foreach ($vote as $row) : ?>
							<div class="grid-slide-box">
								<div class="top-candidate-wrap style-2">
									<div class="top-candidate-box">
									<span class="tpc-status"><?= $row["number_vote"] ?></span>
										<div class="tp-candidate-inner-box">
											<div class="top-candidate-box-thumb">
											<img class="img-responsive img-circle" src="../admin/image/<?= $row['image'] ?>">
											</div>
											<div class="top-candidate-box-detail">
												<h4><?= $row["name"] ?></h4>
												<span class="location"><?= $row["nickname"] ?></span>
											</div>
										</div>
										<div class="top-candidate-box-extra">
											<p><?= $row["VS"] ?>.</p>
										</div>
										<div class="tombol" id="box">
										<a href="detalis.php?no=<?= $row["number_vote"]?>" class="btn btn-candidate-two bg-default"> Detail</a>
										<a href="vote.php?no=<?= $row["number_vote"]?>" class="btn btn-candidate-two bg-info" onclick="return confirm ('Yakin?')">Vote</a>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</section>
			
			<!-- ============================ Call To Action ================================== -->
			<section class="theme-bg call-to-act-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call-to-act">
								<div class="call-to-act-head">
									<h3>Have you voted?</h3>
									<span>Support your choice by voting via the link below.</span>
								</div>
								<a href="vote.php" class="btn btn-call-to-act">Cast your vote</a>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Call To Action End ================================== -->			
			<?php include_once "footer.php" ?>
			
			<!-- link JS-->
			<?php include_once "JS/linkJs.php"  ?>
			<?php include_once "JS/jstime.php"  ?>
		</div>
	</body>
</html>