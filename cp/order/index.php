<?php
$baseUrl= '../';
include_once $baseUrl.'layouts/header.php';

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
						<table class="table">
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
</section>
<?php
include_once $baseUrl.'layouts/footer.php';
?> 