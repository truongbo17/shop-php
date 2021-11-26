<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

$id = $user['id'];
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
?>
<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<ol class="breadcrumb">
						<li><a href="<?= $baseUrl ?>index.php">Home</a></li>
						<li class="active">Chi tiết người dùng</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- profile -->
<section id="profile" class="user-dashboard page-wrapper" style="padding-top:10px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">
					<li><a class="active" href="#">Chi tiết người dùng (<?= $resultUser['username'] ?>)</a></li>
					<li>
						<span>
							<a href="edit.php">Chỉnh Sửa</a>
						</span>
					</li>
				</ul>
				<div class="dashboard-wrapper dashboard-user-profile">
					<div class="media">
						<div class="pull-left text-center" href="#!">
							<img class="media-object user-img" src="<?= fixUrl($resultUser['thumbnail'], "../") ?>" alt="Image">
						</div>
						<div class="media-body">
							<ul class="user-profile-list">
								<li><span>Họ tên:</span><?= $resultUser['fullname'] ?></li>
								<li><span>Địa chỉ:</span><?= $resultUser['address'] ?></li>
								<li><span>Email:</span><?= $resultUser['email'] ?></li>
								<li><span>SĐT:</span><?= $resultUser['phonenumber'] ?></li>
								<li><span>Ngày sinh:</span><?= date('d-m-Y', strtotime($resultUser['birthday'])) ?></li>
								<li><span>Tiểu sử:</span><?= $resultUser['story'] ?></li>
								<li><span>Trạng thái:</span>
									<?php
									if ($resultUser['deleted'] == 0) {
										echo '<label class="label label-success">Bình thường</label>';
									} elseif ($resultUser['deleted'] == 2) {
										echo '<label class="label label-warning">Cảnh Báo</label>';
									} elseif ($resultUser['deleted'] == 3) {
										echo '<label class="label label-primary">Khách hàng thân thiết</label>';
									} else {
										echo '<label class="label label-danger">Tài khoản bị cấm</label>';
									}
									?>
								</li>
								<li><span>Ngày tạo:</span><?= date('H:i:s d/m/Y', strtotime($resultUser['created_at'])) ?></li>
								<li><span>Ngày cập nhật:</span><?= date('H:i:s d/m/Y', strtotime($resultUser['updated_at'])) ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
				<h4>Danh sách đơn hàng</h4>
						<table class="table">
							<thead>
								<tr>
									<th>STT</th>
									<th>Order ID</th>
									<th>Ngày mua</th>
									<th>Tổng sản phẩm</th>
									<th>Tổng tiền</th>
									<th>Mã giảm giá</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sql = "SELECT `order`.* FROM `order` WHERE user_id = $id";
									$resultOrder = executeResult($sql);
									$index = 0;
									
									foreach ($resultOrder as $item) {
										$order_id = $item['id'];
										$sql = "SELECT SUM(num) as num FROM `order_detail` WHERE `order_id` = $order_id";
										$num = executeResult($sql,true);
										echo '<tr>
										<td>'.(++$index).'</td>
										<td>#'.$item['order_id'].'</td>
										<td>' . date('H:i:s d/m/Y', strtotime($item['order_date'])) . '</td>
										<td>'.$num['num'].'</td>
										<td>'.number_format($item['total_money']).' VNĐ</td>
										<td>';
										if($item['usecoupon'] == 0){
											echo "KHÔNG";
										}else{
											echo "CÓ";
										}
										echo' MÃ GIẢM GIÁ</td>
										<td>'; 
                                        if($item['status'] == 0){
                                            echo '<span id="status" class="label label-warning">Chờ xác nhận</span>';
                                        }elseif($item['status'] == 1){
                                            echo '<span id="status" class="label label-primary">Xác nhận</span>';
                                        }elseif($item['status'] == 2){
                                            echo '<span id="status" class="label label-info">Đang giao</span>';
                                        }elseif($item['status'] == 3){
                                            echo '<span id="status" class="label label-success">Đã giao hàng</span>';
                                        }elseif($item['status'] == 4){
                                            echo '<span id="status" class="label label-danger">Bị hủy</span>';
                                        }
                                        echo'</td>
										<td><a href="view-order.php?order_id='.$item['id'].'" class="btn btn-default">View</a></td>
									</tr>';
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>