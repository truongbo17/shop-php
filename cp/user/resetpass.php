<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';
?>
<section id="menu" class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<ol class="breadcrumb">
						<li><a href="<?= $baseUrl ?>index.php">Home</a></li>
						<li class="active">Đặt lại mật khẩu</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Chỉnh sửa -->
<section class="user-dashboard page-wrapper" style="padding-top:10px">
	<div class="container">
		<ul class="list-inline dashboard-menu text-center">
			<li>
				<span data-toggle="modal" data-target="#product-modal">
					<a href="index.php">Quay lại</a>
				</span>
			</li>
			<li>
			</li>
		</ul>
		<div id="alert">

		</div>
		<hr>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 resetpass">
				<form method="POST">
					<div class="alertPart" style="display: none;">
						<div class="alert alert-danger alert-common error-text" style="display: none;"></div>
						<div class="alert alert-success alert-common success-text" style="display: none;"></div>
					</div>
					<div class="form-group">
						<p>Nhập tên người dùng cần Đặt lại mật khẩu </p>
						<input type="text" placeholder="Nhập username" class="form-control" name="username" id="username" required>
					</div>
					<center><button class="btn btn-main">Đặt lại</button></center>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</section>

<!-- edit admin resetpass user js -->
<script src="../../js/resetpassuser.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>