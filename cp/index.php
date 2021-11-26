<?php
$baseUrl = './';
include_once 'layouts/header.php';

$sql = "SELECT COUNT(id) as count FROM `order`";
$resultOrder = executeResult($sql, true);

$sql = "SELECT COUNT(id) as count,SUM(view) as view FROM `product`";
$resultProduct = executeResult($sql, true);

$sql = "SELECT COUNT(id) as count FROM `user`";
$resultUser = executeResult($sql, true);

$sql = "SELECT COUNT(id) as count,SUM(view) as view FROM `post`";
$resultPost = executeResult($sql, true);

$sql = "SELECT token.*,user.thumbnail as thumbnail,user.fullname as fullname FROM token LEFT JOIN user ON user.id = token.user_id ORDER BY created_at DESC LIMIT 5";
$resultLogUser = executeResult($sql);

$sql = "SELECT SUM(total_money) as totalmoney,COUNT(id) as countorder FROM `order` WHERE status = 3";
$resultLogOrder = executeResult($sql, true);
?>

<section class="product-category section" style="padding-top: 0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title text-center">
					<h2>Hệ thống quản lý ecommerce</h2>
					<h2>FONT-END : NGUYỄN QUANG TRƯỜNG & Themefisher | DEVELOPED BY : NGUYỄN QUANG TRƯỜNG</h2>
					<hr>
				</div>
			</div>
			<h4 style="text-align:center;">Thống kê</h4>
			<div class="col-md-3" style="height:100px;">
				<div class="category-box">
					<a href="#!">
						<img src="https://images.unsplash.com/photo-1598812866501-87ad598839e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDV8fHxlbnwwfHx8fA%3D%3D&w=1000&q=80" alt="" style="height:100px;" />
						<div class="content">
							<h3 style="color:#001ced">Đơn hàng</h3>
							<p style="color:white">Có tất cả <?= $resultOrder['count'] ?> đơn hàng</p>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-3" style="height:100px;">
				<div class="category-box">
					<a href="#!">
						<img src="https://images.unsplash.com/photo-1598812866501-87ad598839e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDV8fHxlbnwwfHx8fA%3D%3D&w=1000&q=80" alt="" style="height:100px;" />
						<div class="content">
							<h3 style="color:#96312a">Sản phẩm</h3>
							<p style="color:white">Có tất cả <?= $resultProduct['count'] ?> Sản phẩm</p>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-3" style="height:100px;">
				<div class="category-box">
					<a href="#!">
						<img src="https://images.unsplash.com/photo-1598812866501-87ad598839e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDV8fHxlbnwwfHx8fA%3D%3D&w=1000&q=80" alt="" style="height:100px;" />
						<div class="content">
							<h3 style="color:#b409d6">Người dùng</h3>
							<p style="color:white">Có tất cả <?= $resultUser['count'] ?> người dùng</p>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-3" style="height:100px;">
				<div class="category-box">
					<a href="#!">
						<img src="https://images.unsplash.com/photo-1598812866501-87ad598839e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDV8fHxlbnwwfHx8fA%3D%3D&w=1000&q=80" alt="" style="height:100px;" />
						<div class="content">
							<h3 style="color:#60b837">Bài viết</h3>
							<p style="color:white">Có tất cả <?= $resultPost['count'] ?> bài viết</p>
						</div>
					</a>
				</div>
			</div>
			<hr>
			<div class="col-md-7">
				<div class="title text-center">
					<h4>Lịch sử truy cập</h4>
					<table class="table">
						<thead>
							<tr>
								<th>Ảnh</th>
								<th>Họ tên</th>
								<th>Đăng nhập lúc</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($resultLogUser as $item) {
								echo '
								<tr>
								<td>
								<div class="product-info">
								<img width="80" src="' . fixUrl($item['thumbnail'], "../") . '" alt="">
							  	</div>
								  </td>
									<td>' . $item['fullname'] . '</td>
									<td>' . date('H:i:s d/m/Y', strtotime($item['created_at'])) . '</td>
								  </tr>';
							}
							?>
						</tbody>
					</table>
					<button class="btn btn-main">Xem thêm</button>
				</div>
			</div>
			<div class="col-md-5">
				<div class="title text-center">
					<h4>Tổng số lượt xem</h4>
					<label for="">Tổng số lượt xem sản phẩm : <p><?= $resultProduct['view'] ?></p></label>
					<br>
					<label for="">Tổng số lượt xem bài viết : <p><?= $resultPost['view'] ?></p></label>
					<hr>
					<h4>Thu nhập</h4>
					<label>Tổng đơn hàng đã giao : </label>
					<p><?= $resultLogOrder['countorder'] ?></p>
					<label>Tổng tiền thu nhập : </label>
					<p><?= number_format($resultLogOrder['totalmoney']) ?> VNĐ</p>
					<p>IP Truy cập</p>
                    <?php
                    $filename = "../getip.txt";
                    $fp = fopen($filename, "r");//mở file ở chế độ đọc
                     
                    $contents = fread($fp, filesize($filename));//đọc file
                     
                    echo "<pre>$contents</pre>";//in nội dung của file ra màn hình
                    fclose($fp);//đóng file
                    ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
include_once 'layouts/footer.php';
?>