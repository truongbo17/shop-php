<?php
require_once '../database/dbhelper.php';
require_once '../utils/utility.php';

//check login
$user = getUserToken();
if ($user != null) {
	if ($user['role_id'] == 1) {
		header('Location:index.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>LOGIN | ADMIN TRUONGBO</title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Hận đời đi bán quần áo, hét lên 4 chữ: quần áo đẹp đây!">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="TruongBo">
	<meta name="generator" content="TruongBo - Hận đời đi bán quần áo, hét lên 4 chữ: quần áo đẹp đây!">

	<!-- Themefisher Icon font -->
	<link rel="stylesheet" href="../plugins/themefisher-font/style.css">
	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">

	<!-- Animate css -->
	<link rel="stylesheet" href="../plugins/animate/animate.css">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="../plugins/slick/slick.css">
	<link rel="stylesheet" href="../plugins/slick/slick-theme.css">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- jquery add new -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body id="body">

	<section class="signin-page account">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="block text-center">
						<section class="form login">
							<h2 class="text-center">ĐĂNG NHẬP QUẢN TRỊ | TRUONGBO</h2>
							<form action="#" method="POST" enctype="multipart/form-data" class="text-left clearfix" autocomplete="off">
								<div class="alertPart" style="display: none;">
									<div class="alert alert-danger alert-common error-text"></div>
								</div>
								<input type="text" name="actionLogin" hidden>
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="text-center button">
									<button type="submit" class="btn btn-main text-center">Login</button>
								</div>
							</form>
						</section>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- 
    Essential Scripts
    =====================================-->

	<!-- Main jQuery -->
	<script src="../plugins/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.1 -->
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Touchpin -->
	<script src="../plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	<!-- Count Down Js -->
	<script src="../plugins/syo-timer/build/jquery.syotimer.min.js"></script>

	<!-- slick Carousel -->
	<script src="../plugins/slick/slick.min.js"></script>
	<script src="../plugins/slick/slick-animation.min.js"></script>

	<!-- Main Js File -->
	<script src="../js/config.js"></script>

	<!-- login admin js -->
	<script src="../js/loginadmin.js"></script>

</body>

</html>