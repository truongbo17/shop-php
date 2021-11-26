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
						<li class="active">Thêm người dùng</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Chỉnh sửa -->
<section class="user-dashboard page-wrapper" style="padding-top:10px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">
					<li>
						<span data-toggle="modal" data-target="#product-modal">
							<a href="index.php">Quay lại</a>
						</span>
					</li>
					<li>
						<span data-toggle="modal" data-target="#product-modal">
							<a href="#add" class="active">Thêm tài khoản</a>
						</span>
					</li>
				</ul>
				<div class="dashboard-wrapper dashboard-user-profile">
					<form method="POST" class="form-group" id="editUser" enctype="multipart/form-data">
						<div class="alertPart" style="display: none;">
							<div class="alert alert-danger alert-common error-text" style="display: none;"></div>
							<div class="alert alert-success alert-common success-text" style="display: none;"></div>
						</div>
						<div class="row">
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="product-short-details">
									<div class="form-group">
										<p>Username</p>
										<input type="text" class="form-control" name="username" id="username" placeholder="Nhập username" require>
									</div>

									<div class="form-group">
										<p>Họ tên</p>
										<input type="text" placeholder="Nhập họ tên" class="form-control" name="fullname" id="name" require>
									</div>

									<div class="form-group">
										<p>Email</p>
										<input type="email" placeholder="Nhập email" class="form-control" name="email" id="email" require>
									</div>

									<div class="form-group">
										<p>Password (Để trống mặc định là 123456)</p>
										<input type="passsword" placeholder="Nhập mật khẩu" class="form-control" name="passsword" id="passsword">
									</div>

								</div>
							</div>
							<div class="col-md-5 col-sm-7 col-xs-12">
								<div class="form-group">
									<p>Trạng thái tài khoản</p>
									<select name="deleted" id="deleted" class="form-control" required>
										<option value="0" selected>Bình thường</option>
										<option value="1">Cấm</option>
										<option value="3">Khách hàng thân thiết</option>
										<option value="2">Cảnh báo</option>

									</select>
								</div>
								<div class="form-group">
									<p>Role</p>
									<select name="role" id="role" class="form-control" required>
										<option value="2">Người dùng</option>
										<option value="1">Admin</option>
									</select>
								</div>

							</div>

						</div>
						<button class="btn btn-main">Lưu</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- login admin js -->
<script src="../../js/adduser.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>