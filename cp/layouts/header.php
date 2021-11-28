<?php
session_start();

require_once $baseUrl . '../database/dbhelper.php';
require_once $baseUrl . '../utils/utility.php';


$user = getUserToken();
if ($user['role_id'] != 1) {
	header('Location: ' . $baseUrl . 'login.php');
	die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>ADMIN | E-commerce TRUONGBO</title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Construction Html5 Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Constra HTML Template v1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= $baseUrl ?>../images/favicon.png" />

	<!-- Themefisher Icon font -->
	<link rel="stylesheet" href="<?= $baseUrl ?>../plugins/themefisher-font/style.css">
	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="<?= $baseUrl ?>../plugins/bootstrap/css/bootstrap.min.css">

	<!-- Animate css -->
	<link rel="stylesheet" href="<?= $baseUrl ?>../plugins/animate/animate.css">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="<?= $baseUrl ?>../plugins/slick/slick.css">
	<link rel="stylesheet" href="<?= $baseUrl ?>../plugins/slick/slick-theme.css">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="<?= $baseUrl ?>../css/style.css">

	<!-- Img Upload Multi Js File -->
	<link type="text/css" rel="stylesheet" href="<?= $baseUrl ?>../css/image-uploader.min.css">

	<!-- jquery add new -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Img Upload Multi Js File -->
	<script src="<?= $baseUrl ?>../js/image-uploader.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js" defer> </script>

	<!-- datatables add new -->
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body id="body">

	<!-- Start Top Header Bar -->
	<section class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="contact-number">
						<i class="tf-ion-ios-telephone"></i>
						<span>0368869690</span>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<!-- Site Logo -->
					<div class="logo text-center">
						<a href="<?= $baseUrl ?>index.php">
							<!-- replace logo here -->
							<svg width="255px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
									<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
										<text id="AVIATO">
											<tspan x="58.94" y="325">TRUONGBO</tspan>
										</text>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<!-- User -->
					<ul class="top-menu text-right list-inline">
						<li class="dropdown cart-nav dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img src="<?= fixUrl($user['thumbnail'], "$baseUrl../") ?>" style="width:10%;border-radius:50%;"> <?= $user['fullname'] ?></a>
							<div class="dropdown-menu cart-dropdown">
								<div class="cart-summary">
									<span>Tùy chọn</span>
								</div>
								<ul class="text-center cart-buttons">
									<li><a href="<?= $baseUrl ?>user/view.php?id=<?= $user['id'] ?>" class="btn btn-small">Trang cá nhân</a></li>
									<li><a href="<?= $baseUrl ?>logout.php" class="btn btn-small btn-solid-border">Đăng xuất</a></li>
								</ul>
							</div>

						</li>
						<!-- / user -->

					</ul><!-- / .nav .navbar-nav .navbar-right -->
				</div>
			</div>
		</div>
	</section><!-- End Top Header Bar -->


	<!-- Main Menu Section -->
	<section class="menu">
		<nav class="navbar navigation">
			<div class="container">
				<div class="navbar-header">
					<h2 class="menu-title">Main Menu</h2>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				</div><!-- / .navbar-header -->

				<!-- Navbar Links -->
				<div id="navbar" class="navbar-collapse collapse text-center">
					<ul class="nav navbar-nav">

						<!-- Home -->
						<li class="dropdown ">
							<a href="<?= $baseUrl ?>index.php">Home</a>
						</li><!-- / Home -->


						<!-- Quản lý đơn hàng -->
						<li class="dropdown dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Quản lý đơn hàng <span class="tf-ion-ios-arrow-down"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= $baseUrl ?>order">Danh sách đơn hàng</a></li>
								<li><a href="<?= $baseUrl ?>order/check-inventory.php">Check tồn kho</a></li>
							</ul>
						</li>
						<!-- / end quản lý đơn hàng -->

						<!-- Quản lý người dùng -->
						<li class="dropdown dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Quản lý người dùng <span class="tf-ion-ios-arrow-down"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= $baseUrl ?>user">Danh sách người dùng</a></li>
								<li><a href="<?= $baseUrl ?>user/add.php">Thêm người dùng</a></li>
								<li><a href="<?= $baseUrl ?>user/resetpass.php">Đặt lại mật khẩu</a></li>
							</ul>
						</li>
						<!-- / end quản lý người dùng -->

						<!-- Quản lý  sản phẩm -->
						<li class="dropdown dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Quản lý sản phẩm <span class="tf-ion-ios-arrow-down"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= $baseUrl ?>product">Danh sách sản phẩm</a></li>
								<li><a href="<?= $baseUrl ?>category">Danh mục sản phẩm</a></li>
								<li><a href="<?= $baseUrl ?>product/add.php">Thêm sản phẩm</a></li>
							</ul>
						</li>
						<!-- / end quản lý sp -->

						<!-- Quản lý bài viết -->
						<li class="dropdown dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Quản lý bài viết <span class="tf-ion-ios-arrow-down"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= $baseUrl ?>post">Danh sách bài viết</a></li>
								<li><a href="<?= $baseUrl ?>category-post">Danh mục bài viết</a></li>
								<li><a href="<?= $baseUrl ?>post/add.php">Thêm bài viết</a></li>
							</ul>
						</li>
						<!-- / end quản lý bv -->


						<!-- khác -->
						<li class="dropdown dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Khác <span class="tf-ion-ios-arrow-down"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= $baseUrl ?>comment">Bình luận</a></li>
								<li><a href="<?= $baseUrl ?>feedback">Quản lý phản hồi</a></li>
								<li><a href="<?= $baseUrl ?>pay">Phương thức vận chuyển</a></li>
								<li><a href="<?= $baseUrl ?>coupon">Mã giảm giá</a></li>
							</ul>
						</li><!-- / Blog -->
					</ul><!-- / .nav .navbar-nav -->

				</div>
				<!--/.navbar-collapse -->
			</div><!-- / .container -->
		</nav>
	</section>