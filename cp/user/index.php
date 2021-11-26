<?php
$baseUrl= '../';
include_once $baseUrl.'layouts/header.php';

$sql = "SELECT user.*,role.name as role_name FROM user LEFT JOIN role ON user.role_id = role.id ORDER BY updated_at DESC";
$resultUser = executeResult($sql);
?>

<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Danh sách người dùng</h1>
					<ol class="breadcrumb">
						<li><a href="<?=$baseUrl?>index.php">Home</a></li>
						<li class="active">manager user</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper" style="padding-top:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="dashboard-wrapper user-dashboard">
					<a href="add.php" class="btn btn-main btn-small btn-round-full">Thêm người dùng</a>
					<div id="alert">

					</div>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>STT</th>
									<th>Ảnh</th>
									<th>Role</th>
									<th>Username</th>
									<th>Họ tên</th>
									<th>Email</th>
									<th>Trạng thái</th>
									<th>Update</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$index = 0;
									foreach ($resultUser as $item) {
										echo '

										<tr>
										<td>'.(++$index).'</td>
										<td>                        
										<div class="product-info">
										<img width="80" src="'.fixUrl($item['thumbnail'],"../../").'" alt="avatar" />
										</div>
										</td>
										<td>'.$item['role_name'].'</td>
										<td>'.$item['username'].'</td>
										<td>'.$item['fullname'].'</td>
										<td>'.$item['email'].'</td>';
										if($item['deleted'] == 0){
											echo '<td><span id="status'.$item['id'].'" class="label label-success">Bình thường</span></td>';
										}elseif ($item['deleted'] == 2) {
											echo '<td><span id="status'.$item['id'].'" class="label label-warning">Cảnh Báo</span></td>';
										}elseif ($item['deleted'] == 3){
											echo '<td><span id="status'.$item['id'].'" class="label label-primary">Khách hàng thân thiết</span></td>';
										}
										else{
											echo '<td><span id="status'.$item['id'].'" class="label label-danger">Tài khoản bị cấm</span></td>';
										}
										echo'
										<td>';
										date_default_timezone_set('Asia/Ho_Chi_Minh');
										echo date('H:i:s d/m/Y',strtotime($item['updated_at'])); 
										echo'</td>
										<td><a href="view.php?id='.$item['id'].'" class="btn btn-default">Chi tiết</a></td>';
										if($item['deleted'] == 1){
											echo '<td id="unban'.$item['id'].'"><button class="btn btn-primary" onclick="unbanUser('.$item['id'].')">Bỏ Cấm</button></td>';
											echo '<td id="unbansecond'.$item['id'].'" hidden><button class="btn btn-danger" onclick="banUser('.$item['id'].')">Cấm</button></td>';
										}else{
											echo '<td id="ban'.$item['id'].'"><button class="btn btn-danger" onclick="banUser('.$item['id'].')">Cấm</button></td>';
											echo '<td id="bansecond'.$item['id'].'" hidden><button class="btn btn-primary" onclick="unbanUser('.$item['id'].')">Bỏ Cấm</button></td>';
										}
										echo'
										</tr>

										 ';
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

<!-- ban,unban User js -->
<script src="../../js/ban-unbanUser.js"></script>

<?php
include_once $baseUrl.'layouts/footer.php';
?> 