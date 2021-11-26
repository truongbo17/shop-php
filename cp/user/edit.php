<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

if (isset($_GET['id'])) {

	//get id từ form
	$id = getGET('id');
	//fix all sql injection :))
	$id = preg_replace("/[^0-9]/", "", $id);

	$sql = "SELECT * FROM user WHERE id = $id";
	$resultUser = executeResult($sql, true);
	if ($resultUser == '' || $resultUser == null) {
		echo "<hr>";
		echo "<div style='text-align:center'>";
		echo "<p>Không có thông tin về người dùng này !</p>";
		echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
		echo "</div>";
		die;
	}
} else {
	echo "<hr>";
	echo "<div style='text-align:center'>";
	echo "<p>Vui lòng chọn người dùng để xem thông tin !</p>";
	echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
	echo "</div>";
	die;
}
?>
<section id="menu" class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<ol class="breadcrumb">
						<li><a href="<?= $baseUrl ?>index.php">Home</a></li>
						<li class="active">Chỉnh sửa chi tiết người dùng</li>
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
					<li><a href="view.php?id=<?= $resultUser['id'] ?>">Chi Tiết</a></li>
					<li>
						<span data-toggle="modal" data-target="#product-modal">
							<a href="#edit" class="active">Chỉnh sửa người dùng (<?= $resultUser['username'] ?>)</a>
						</span>
					</li>
				</ul>
				<div class="dashboard-wrapper dashboard-user-profile">
					<form method="POST" class="form-group" id="editUser" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-5 col-sm-6 col-xs-12">
								<div class="modal-image">
									<img id="output" class="img-responsive" src="<?= fixUrl($resultUser['thumbnail'], "../../") ?>" alt="product-img" />
									<p>Thay đổi ảnh đại diện</p>
									<input type="file" name="thumbnail" accept="image/*" onchange="loadFile(event)">

									<!-- view image befor upload -->
									<script>
										var loadFile = function(event) {
											var output = document.getElementById('output');
											output.src = URL.createObjectURL(event.target.files[0]);
											output.onload = function() {
												URL.revokeObjectURL(output.src) // free memory
											}
										};
									</script>
									<!-- end script -->
								</div>
							</div>
							<div class="col-md-7 col-sm-6 col-xs-12">
								<div class="product-short-details">
									<input type="number" value="<?= $resultUser['id'] ?>" name="id" hidden>
									<div class="form-group">
										<input type="text" value="<?= $resultUser['username'] ?>" class="form-control" name="username" id="username" placeholder="Nhập username" require>
									</div>

									<div class="form-group">
										<input type="text" value="<?= $resultUser['fullname'] ?>" placeholder="Nhập họ tên" class="form-control" name="fullname" id="name" require>
									</div>

									<div class="form-group">
										<input type="email" value="<?= $resultUser['email'] ?>" placeholder="Nhập email" class="form-control" name="email" id="email" require>
									</div>

									<div class="form-group">
										<input type="number" value="<?= $resultUser['phonenumber'] ?>" placeholder="Nhập số điện thoại" class="form-control" name="phonenumber" id="phonenumber" require>
									</div>

									<div class="form-group">
										<input type="text" value="<?= $resultUser['address'] ?>" placeholder="Nhập địa chỉ" class="form-control" name="address" id="address" require>
									</div>

									<div class="form-group">
										<input type="date" value="<?= $resultUser['birthday'] ?>" placeholder="Nhập ngày sinh" class="form-control" name="birthday" id="birthday" require>
									</div>

									<div class="form-group">
										<input type="text" value="<?= $resultUser['story'] ?>" placeholder="Nhập tiểu sử" class="form-control" name="story" id="story" require>
									</div>
									<div class="form-group">
										<p>Trạng thái tài khoản</p>
										<select require name="deleted" id="deleted" class="form-control">
											<?php
											if ($resultUser['deleted'] == 0) {
												echo '
                    								<option value="' . $resultUser['deleted'] . '" selected>Bình thường</option>
                    								<option value="1">Cấm</option>
                    								<option value="3">Khách hàng thân thiết</option>
                    								<option value="2">Cảnh báo</option>
                    								';
											} elseif ($resultUser['deleted'] == 2) {
												echo '
                    								<option value="0">Bình thường</option>
                    								<option value="1">Cấm</option>
                    								<option value="3">Khách hàng thân thiết</option>
                    								<option value="' . $resultUser['deleted'] . '" selected>Cảnh báo</option>
                    								';
											} elseif ($resultUser['deleted'] == 3) {
												echo '
                    								<option value="0>Bình thường</option>
                    								<option value="1">Cấm</option>
                    								<option value="' . $resultUser['deleted'] . '" selected>Khách hàng thân thiết</option>
                    								<option value="2">Cảnh báo</option>
                    								';
											} else {
												echo '
                    								<option value="0">Bình thường</option>
                    								<option value="' . $resultUser['deleted'] . '" selected>Cấm</option>
                    								<option value="3">Khách hàng thân thiết</option>
                    								<option value="2">Cảnh báo</option>
                    								';
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<p>Role</p>
										<select require name="role" id="role" class="form-control">
											<?php
											if ($resultUser['role_id'] == 1) {
												echo '
                    								<option value="' . $resultUser['role_id'] . '" selected>Admin</option>
                    								<option value="2">Người dùng</option>
                    								';
											} else {
												echo '
                    								<option value="1">Admin</option>
                    								<option value="' . $resultUser['role_id'] . '" selected>Người dùng</option>
                    								';
											}
											?>
										</select>
									</div>


								</div>
								<div class="alertPart" style="display: none;">
									<div class="alert alert-danger alert-common error-text" style="display: none;"></div>
									<div class="alert alert-success alert-common success-text" style="display: none;"></div>
								</div>
								<button class="btn btn-main">Lưu</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- edit admin user js -->
<script src="../../js/edituser.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>