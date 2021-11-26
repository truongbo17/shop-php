<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

$resultEditCategoryPost = [
	'name' => '',
	'slug' => '',
	'id' => ''
];

$sql = "SELECT category_post.*,user.username as username FROM category_post LEFT JOIN user ON category_post.user_id = user.id";
$resultCatePost = executeResult($sql);

//edit
if(isset($_GET['edit'])){
	$id = getGET('edit');
	//fix all sql injection :))
	$id = preg_replace("/[^0-9]/", "", $id);
	
	$sql = "SELECT * FROM category_post WHERE id = '$id'";
	$resultEditCategoryPost = executeResult($sql,true);

	if ($resultEditCategoryPost == '' || $resultEditCategoryPost == null) {
		echo "<hr>";
		echo "<div style='text-align:center'>";
		echo "<p>Không có thông tin về danh mục bài viết này !</p>";
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
					<h1 class="page-name">Danh mục bài viết</h1>
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
			<div class="col-md-5">
				<div class="dashboard-wrapper user-dashboard">
					<label>Chỉnh sửa danh mục bài viết</label>
					<div id="alert">

					</div>
					<form>
						<input type="text" name="user_id" value="<?=$user['id']?>" hidden>
						<input type="text" name="id" value="<?=$resultEditCategoryPost['id']?>" hidden>
						<div class="alertPart" style="display: none;">
							<div class="alert alert-danger alert-common error-text" style="display: none;"></div>
							<div class="alert alert-success alert-common success-text" style="display: none;"></div>
						</div>
						<p>Tên danh mục</p>
						<div class="form-group">
							<input type="text" value="<?=$resultEditCategoryPost['name']?>" placeholder="Tên danh mục" class="form-control" name="catename" id="catename" require="true">
						</div>
						<p>Đường dẫn</p>
						<div class="form-group">
							<input type="text" value="<?=$resultEditCategoryPost['slug']?>" placeholder="Đường dẫn" class="form-control" name="slug" id="slug" require>
						</div>
						<br>
						<button class="btn btn-main">Lưu</button>
					</form>
				</div>
			</div>
			<div class="col-md-7">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>STT</th>
									<th>Người tạo</th>
									<th>Tên</th>
									<th>Đường dẫn</th>
									<th>Update</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$index = 0;
								foreach ($resultCatePost as $item) {
									echo '<tr>
									<td>'.(++$index).'</td>
									<td>'.$item['username'].'</td> 
									<td>'.$item['name'].'</td> 
									<td>'.$item['slug'].'</td> 
                                    <td>'.date('H:i:s d/m/Y', strtotime($item['updated_at'])).'</td>     
									<td><a href="index.php?edit='.$item['id'].'" title="edit"><button class="btn btn-warning">Sửa</button></a></td> 
									<td><button class="btn btn-danger" onclick="deleteCatePost('.$item['id'].')">Xóa</button></td> 
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
<script src="../../js/addcategorypost.js"></script>

<!-- delete cate -->
<script src="../../js/deletecatepost.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>