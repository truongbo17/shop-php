<?php
$baseUrl= '../';
include_once $baseUrl.'layouts/header.php';

$sql = "SELECT COUNT(id) as number FROM `order`";
$result = executeResult($sql,true);

$number = $result['number']; //tổng số sản phẩm
$totalitem = 2; //tổng số sản phẩm trên 1 trang
$totalpage = ceil($number/$totalitem); //số trang
$current_page = isset($_GET['page']) ? preg_replace("/[^0-9]/", "",$_GET['page']) : 1; //page hiện tại
if($current_page > $totalpage){
	$current_page = $totalpage;
}
elseif($current_page < 1){
	$current_page = 1;
}
$index = ($current_page - 1)*$totalitem; //sản phẩm bắt đầu dựa trên trang

$sql = "SELECT `order`.* FROM `order`";
$resultOrder = executeResult($sql);
?>

<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Danh sách đơn hàng</h1>
					<ol class="breadcrumb">
						<li><a href="<?=$baseUrl?>index.php">Home</a></li>
						<li class="active">manager order</li>
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
					<div id="alert">

					</div>
					<div class="table-responsive">
						<table class="table" id="myTable">
							<thead>
								<tr>
									<th>STT</th>
									<th>Mã đơn hàng</th>
									<th>Họ tên</th>
									<th>Tổng sản phẩm</th>
									<th>Tổng tiền</th>
									<th>Trạng thái</th>
									<th>Thời gian mua hàng</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$index = 0;
								foreach ($resultOrder as $item) {
									$order_id = $item['id'];
									$sql = "SELECT SUM(num) as num FROM `order_detail` WHERE `order_id` = $order_id";
									$num = executeResult($sql,true);
									echo '

									<tr>
									<td>'.(++$index).'</td>
									<td>'.$item['order_id'].'</td>
									<td>'.$item['fullname'].'</td>
									<td>'.$num['num'].'</td>
									<td>'.number_format($item['total_money']).' VNĐ</td>
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
									<td>'.$item['order_date'].'</td>
									<td><a href="view.php?id='.$item['id'].'"><button class="btn btn-default">Chi tiết</button></a></td>
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
	<div class="text-center" style="display:none">
		<ul class="pagination post-pagination">
			<?php 
			$arrayPage = [1,$current_page-1,$current_page,$current_page+1,$totalpage];
			
			if($current_page > 1 && $totalpage > 1){
				echo '
				<li>
				<a href="?page='.($current_page-1).'">Prev</a>
				</li>';
			}
			$isFind = true;
			for ($i=1; $i <= $totalpage; $i++) { 
				if(!in_array($i, $arrayPage)){
					if($i < $current_page && $isFind == true){
						//prev
						echo '
						<li>
						<a href="?page='.($current_page-2).'">...</a>
						</li>';
						$isFind = false;
					}else if ($i > $current_page && $isFind == false) {
						//next
						echo '
						<li>
						<a href="?page='.($current_page+2).'">...</a>
						</li>';
						$isFind = true;
					}
				}else{
					if($i == $current_page){
						echo '
						<li class="active">
						<a href="?page='.$i.'">'.$i.'</a>
						</li>';
					}else{
						echo '
						<li>
						<a href="?page='.$i.'">'.$i.'</a>
						</li>';
					}
				}
			}	
			if($current_page < $totalpage){
				echo '
				<li>
				<a href="?page='.($current_page+1).'">Next</a>
				</li>';
			}
			?>

		</ul>
	</div>
</section>
<script>
	$(document).ready( function () {
		$('#myTable').DataTable(
		{
			scrollY: 400,
			"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
		});
	} );
</script>
<?php
include_once $baseUrl.'layouts/footer.php';
?> 