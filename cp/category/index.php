<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

$resultEditCategory = [
	'name' => '',
	'slug' => '',
	'parent_id' => '',
	'id' => ''
];

$sql = "SELECT category.*,user.username as username FROM category LEFT JOIN user ON category.user_id = user.id";
$resultCate = executeResult($sql);

$resultCategory = data_tree($resultCate);

//edit
if(isset($_GET['edit'])){
	$id = getGET('edit');
	//fix all sql injection :))
	$id = preg_replace("/[^0-9]/", "", $id);
	
	$sql = "SELECT * FROM category WHERE id = '$id'";
	$resultEditCategory = executeResult($sql,true);

	if ($resultEditCategory == '' || $resultEditCategory == null) {
		echo "<hr>";
		echo "<div style='text-align:center'>";
		echo "<p>Không có thông tin về danh mục này !</p>";
		echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
		echo "</div>";
		die;
	}
}

?>

<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Danh mục sản phẩm</h1>
					<ol class="breadcrumb">
						<li><a href="<?= $baseUrl ?>index.php">Home</a></li>
						<li class="active">category product</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper" style="padding-top:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="dashboard-wrapper user-dashboard">
					<label>Chỉnh sửa danh mục</label>
					<p>Khuyến nghị : NÊN THÊM NHIỀU NHẤT 1 DANH MỤC CON(1 Cấp) ĐỂ TRÁNH LỖI HIỂN THỊ</p>
					<div id="alert">

					</div>
					<form>
						<input type="text" name="user_id" value="<?=$user['id']?>" hidden>
						<input type="text" name="id" value="<?=$resultEditCategory['id']?>" hidden>
						<div class="alertPart" style="display: none;">
							<div class="alert alert-danger alert-common error-text" style="display: none;"></div>
							<div class="alert alert-success alert-common success-text" style="display: none;"></div>
						</div>
						<p>Tên danh mục</p>
						<div class="form-group">
							<input type="text" value="<?=$resultEditCategory['name']?>" placeholder="Tên danh mục" class="form-control" name="catename" id="catename" require="true">
						</div>
						<p>Đường dẫn</p>
						<div class="form-group">
							<input type="text" value="<?=$resultEditCategory['slug']?>" placeholder="Đường dẫn" class="form-control" name="slug" id="slug" require>
						</div>
						Loại danh mục
						<select name='parent_id' class="form-control" require>
							<option value="999">Danh mục cha</option>
							<?php 
							foreach ($resultCategory as $item) {
								echo '<option value="'.$item['id'].'">'.str_repeat('--/',$item['level']).$item['name'].'</option>';
							}
							?>
						</select>
						<br>
						<button class="btn btn-main">Lưu</button>
					</form>
				</div>
			</div>
			<div class="col-md-8">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>STT</th>
									<th>Người tạo</th>
									<th>Tên</th>
									<th>Đường dẫn</th>
									<th>Danh mục con</th>
									<th>Trạng thái</th>
									<th>Update</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$index = 0;
								foreach ($resultCategory as $item) {
									echo '<tr>
									<td>'.(++$index).'</td>
									<td>'.$item['username'].'</td> 
									<td>'.$item['name'].'</td> 
									<td>'.$item['slug'].'</td> 
									<td>'.str_repeat('--/',$item['level']).$item['name'].'</td> ';
									if($item['deleted'] == 0){
										echo '<td style="color:green;font-weight:bold">
										<button href="#" onclick="showHide('.$item['id'].')" style="border:0px; background-color: transparent;">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
										<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
										</svg>
										</button>
										</td>';
									}else{
										echo '<td style="color:red;font-weight:bold">
										<button href="#" onclick="showHide('.$item['id'].')" style="border:0px; background-color: transparent;">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
										<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
										</svg>
										</button>
										</td>';
									}
									
									echo'<td>'.date('H:i:s d/m/Y', strtotime($item['updated_at'])).'</td>     
									<td><a href="index.php?edit='.$item['id'].'" title="edit"><button class="btn btn-warning">Sửa</button></a></td> 
									<td><button class="btn btn-danger" onclick="deleteCate('.$item['id'].')">Xóa</button></td> 
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

<!-- add cate js -->
<script src="../../js/addcategory.js"></script>

<!-- show hide cate -->
<script src="../../js/hidecate.js"></script>

<!-- delete cate -->
<script src="../../js/deletecate.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>