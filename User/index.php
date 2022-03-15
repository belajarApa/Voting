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
$cek = mysqli_query($conn, "SELECT * FROM dates WHERE idTitle = '$idtitle'");
$row = mysqli_fetch_assoc($cek);

$tglmulai = $row['tgl_mulai'];
$tglakhir = $row['tgl_akhir'];
$jmmulai = $row['jam_awal'];
$jmakhir = $row['jam_akhir'];

?>
<!doctype html>
<html lang="en">
<?php include_once "head.php" ?>
	<body onload="countDown();"> 
		<div class="Loader"></div>
		<div class="wrapper">  
			<div class="clearfix"></div>
			<div class="hero-banner" data-ride="carousel" data-pause="hover" data-interval="false" >
				<div class="hero-img">
					<img src="assets/img/gtrr.jpg" class="img-responsive" alt="">
				</div>
				<div class="container">
					<div class="row">
						<div class="col col-md-6 col-sm-8">
							<div class="content">
								<h3 id="mulai">Voting Belum Dimulai</h3>
								<p>Mohon Tunggu</p>
								<br>
								<h4 style="color: green;"  id="waktu"></h4>
                            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- link JS-->
			<?php include_once "JS/linkJs.php"  ?>
			<?php include_once "JS/reload.php"  ?>
		</div>
	</body>
</html>