<?php
$baseUrl= '../';
include_once $baseUrl.'layouts/header.php';

if(isset($_GET['id'])){
	
	//get id từ form
	$id = getGET('id');
	//fix all sql injection :))
	$id = preg_replace("/[^0-9]/","", $id);

	$sql = "SELECT user.*,role.name as role_name FROM user LEFT JOIN role ON user.role_id = role.id WHERE user.id = $id";
	$resultUser = executeResult($sql,true);
	if($resultUser == '' || $resultUser == null){
		echo "<hr>";
		echo "<div style='text-align:center'>";
		echo "<p>Không có thông tin về người dùng này !</p>";
		echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
		echo "</div>";
		die;
	}
}else{
	echo "<hr>";
	echo "<div style='text-align:center'>";
	echo "<p>Vui lòng chọn người dùng để xem thông tin !</p>";
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
						<li><a href="<?=$baseUrl?>index.php">Home</a></li>
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
					<li><a class="active"  href="#">Chi tiết người dùng (<?=$resultUser['username']?>)</a></li>
					<li>
						<span>
							<a href="edit.php?id=<?=$resultUser['id']?>">Chỉnh Sửa</a>
						</span>
					</li>
				</ul>
				<div class="dashboard-wrapper dashboard-user-profile">
					<div class="media">
						<div class="pull-left text-center" href="#!">
							<img class="media-object user-img" src="<?=fixUrl($resultUser['thumbnail'],"../../")?>" alt="Image">
						</div>
						<div class="media-body">
							<ul class="user-profile-list">
								<li><span>Quyền hạn:</span><?=$resultUser['role_name']?></li>
								<li><span>Họ tên:</span><?=$resultUser['fullname']?></li>
								<li><span>Địa chỉ:</span><?=$resultUser['address']?></li>
								<li><span>Email:</span><?=$resultUser['email']?></li>
								<li><span>SĐT:</span><?=$resultUser['phonenumber']?></li>
								<li><span>Ngày sinh:</span><?=date('d-m-Y',strtotime($resultUser['birthday']))?></li>
								<li><span>Tiểu sử:</span><?=$resultUser['story']?></li>
								<li><span>Trạng thái:</span>
									<?php 
									if($resultUser['deleted'] == 0){
										echo '<label class="label label-success">Bình thường</label>';
									}elseif ($resultUser['deleted'] == 2) {
										echo '<label class="label label-warning">Cảnh Báo</label>';
									}elseif ($resultUser['deleted'] == 3){
										echo '<label class="label label-primary">Khách hàng thân thiết</label>';
									}
									else{
										echo '<label class="label label-danger">Tài khoản bị cấm</label>';
									}
									?>
								</li>
								<li><span>Ngày tạo:</span><?=date('H:i:s d/m/Y',strtotime($resultUser['created_at']))?></li>
								<li><span>Ngày cập nhật:</span><?=date('H:i:s d/m/Y',strtotime($resultUser['updated_at']))?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include_once $baseUrl.'layouts/footer.php';
?> 