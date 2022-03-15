<?php
include_once "functions_user.php";
session_start();
$pid = $_SESSION["pid"];
$lihat = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '$pid'");
$row = mysqli_fetch_assoc($lihat);
$idtitle = $row["idTitle"];
$no = $_GET["no"];

$vote = tvote("SELECT * FROM vote WHERE number_vote = '$no' and id_Title = $idtitle");
?>
<!doctype html>
<html lang="en">
<?php include_once "head.php" ?>
<link rel="stylesheet" href="../Admin/plugins/bootstrap-5.1.3/css/bootstrap-grid.min.css">
	<body>
		<div class="Loader"></div>
		<div class="wrapper">  			
			<!-- ====================== Freelancer Slide ================= -->
			<section>
				<div class="container">
					<div class="row">
							<?php foreach ($vote as $row) : ?>
			<div class="col-8" style="margin: auto;">
			                    <div class="grid-slide-box">
								<div class="top-candidate-wrap style-2">
									<div class="top-candidate-box">
									<span class="tpc-status"><?= $row["number_vote"] ?></span>
										<div class="tp-candidate-inner-box">
											<div class="top-candidate-box-thumb">
											<img class="img-responsive img-circle" src="../admin/image/<?= $row['image'] ?>">
											</div>
											<div class="top-candidate-box-detail">
												<h2><?= $row["name"] ?></h2>
											</div>
										</div>
										<div class="top-candidate-box-extra">
                                            <h5 style="margin-top: -10px;"><?= $row["VS"] ?></h5>
											<p class="mt-5 mb-5"><?= $row["explanation"] ?>.</p>
										</div>
										<a href="kembali.php" class="btn btn-candidate-two bg-default mt-5">Previous Page</a>
										<a href="vote.php?no=<?= $row["number_vote"]?>" class="btn btn-candidate-two bg-info mt-5" onclick="return confirm ('Yakin?')">Vote</a>
									</div>
								</div>
							</div>
			</div>
							<?php endforeach ?>
						</div>
				</div>
			</section>
			<!-- link JS-->
			<?php include_once "JS/linkJs.php"  ?>

		</div>
	</body>
</html>