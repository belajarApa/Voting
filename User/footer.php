	<?php
	include_once "functions_user.php";
	$pid = $_SESSION["pid"];
	?>
	<!-- ============================ Before Footer ================================== -->
	<div class="before-footer">
				<div class="container">
					<div class="row">
						
						<div class="col-md-6 col-sm-6">
							<div class="jb4-form-fields">
								<div class="input-group">
								  <input type="email" class="form-control" placeholder="Enter your email address">
								  <span class="input-group-btn">
									<button class="btn theme-bg" type="submit"><span class="fa fa-paper-plane-o"></span></button>
								  </span>
								</div>
							</div>
						</div>
						
						<div class="col-md-6 col-sm-6 hill">
							<ul class="job stock-facts">
							<?php foreach ($vote as $row) : ?>
								<?php
								$no =  $row["number_vote"];
								$number =md5($no);
								$data = mysqli_query($conn,"SELECT * FROM pengguna WHERE idTitle = '$idtitle' and voted = '$number'");
								$jumlah = mysqli_num_rows($data);
								?>
								<li><span><?= $jumlah ?></span></br><?= $row["nickname"] ?></li>
							<?php endforeach ?>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<!-- ============================ Before Footer ================================== -->

<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">
				<div>
					<div class="container">
						<div class="row">
							
							<div class="col-lg-4 col-md-4">
								<div class="footer-widget">
								<h4 class="widget-title">Address</h4>
									<div class="footer-add">
										<p>Collins Street West, Victoria, Australia (AU4578).</p>
										<p><strong>Email:	</strong>hello@jobstock.com</p>
										<p><strong>Call:	</strong>91 855 742 62548</p>
									</div>
									
								</div>
							</div>		
							<div class="col-lg-3 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">Navigations</h4>
									<ul class="footer-menu">
										<li><a href="index.php">Home</a></li>
										<li><a href="vote.php">Vote</a></li>
										<li><a href="../index.php">Login Atau Register</a></li>
										<li><a href="logout.php">Logout</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2">
								<div class="footer-widget">
									<h4 class="widget-title">Choice</h4>
									<ul class="footer-menu">
									<?php foreach ($vote as $row) : ?>
										<li><a href="deskripsi.php"><?= $row["number_vote"] ?>. <?= $row["name"] ?></a></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
									
							<div class="col-lg-3 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">Download Apps</h4>
									<a href="#" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="ti-android theme-cl"></i>
											</div>
											<div class="os-app-caps">
												Google Play
												<span>Get It Now</span>
											</div>
										</div>
									</a>
									<a href="#" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="ti-apple theme-cl"></i>
											</div>
											<div class="os-app-caps">
												App Store
												<span>Now it Available</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							
							<div class="col-lg-6 col-md-6">
								<p class="mb-0">© 2020 Job Stock. Designd By <a href="https://themezhub.com/">Themez Hub</a> All Rights Reserved</p>
							</div>
							
							<div class="col-lg-6 col-md-6 text-right">
								<ul class="footer-bottom-social">
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
									<li><a href="#"><i class="ti-linkedin"></i></a></li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->