<?php
include_once "functions_user.php";
session_start();
$pid = $_SESSION["pid"];
$lihat = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '$pid'");
$row = mysqli_fetch_assoc($lihat);
$idtitle = $row["idTitle"];
$vote = tvote("SELECT * FROM vote WHERE id_Title = '$idtitle'");
?>
<!doctype html>
<html lang="en">
<?php include_once "head.php" ?>
<link rel="stylesheet" href="../Admin/plugins/bootstrap-5.1.3/css/bootstrap-grid.min.css">
	<body>
		<div class="wrapper">  		
			<!-- ====================== Freelancer Slide ================= -->
			<section>
				<div class="container"> 
                    <h3>Hasil Vote</h3>
					<div class="row">
                    <?php foreach ($vote as $row) : ?>
								<?php
								$no =  $row["number_vote"];
								$number =md5($no);
								$data = mysqli_query($conn,"SELECT * FROM pengguna WHERE idTitle = '$idtitle' and voted = '$number'");
								$jumlah = mysqli_num_rows($data);
								?>
						<div class="col-6 mt-5" style="margin-bottom: 100px;">
                            <!-- Single Freelancer -->
							<div class="grid-slide-box">
								<div class="top-candidate-wrap style-2">
									<div class="top-candidate-box navbar navbar-default navbar-fixed navbar-light white bootsnav p-5">
									<span class="tpc-status"><?= $row["number_vote"] ?></span>
										<div class="tp-candidate-inner-box">
											<div class="top-candidate-box-thumb">
											<img class="img-responsive img-circle" src="../admin/image/<?= $row['image'] ?>">
											</div>
											<div class="top-candidate-box-detail">
												<h2><?= $row["name"] ?></h2>
												<span class="location" style="margin-top: -10px; margin-bottom: 30px;"><?= $row["nickname"] ?></span>
											</div>
										</div>
										<div class="top-candidate-box-extra" style="margin-bottom: 80px;">
											<p><?= $row["VS"] ?>.</p>
										</div>
                                        <h4><?= 'Total : ' . $jumlah ?></h4>
									</div>
								</div>
							</div>
                        </div>
                        <?php endforeach ?>
					</div>
				</div>
			</section>
			<a href="logout.php">Logout</a>
			<!-- link JS-->
			<?php include_once "JS/linkJs.php"  ?>

		</div>
	</body>
</html>