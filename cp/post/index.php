<?php
$baseUrl= '../';
include_once $baseUrl.'layouts/header.php';

$sql = "SELECT post.*,user.username as username FROM post LEFT JOIN user ON user.id = post.user_id";
$resultPost = executeResult($sql);
?>

<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Danh sách bài viết</h1>
					<ol class="breadcrumb">
						<li><a href="<?=$baseUrl?>index.php">Home</a></li>
						<li class="active">manager post</li>
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
					<a href="add.php" class="btn btn-main btn-small btn-round-full">Thêm bài viết</a>
					<div id="alert">

					</div>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tác giả</th>
									<th>Tiêu đề</th>
									<th>Đường dẫn</th>
									<th>Lượt xem</th>
									<th>Update</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$index = 0;
									foreach ($resultPost as $item) {
										echo '

										<tr>
										<td>'.(++$index).'</td>
										<td>'.$item['username'].'</td>
										<td>'.$item['title'].'</td>
										<td>'.$item['slug'].'</td>
                                        <td>'.$item['view'].'</td>
                                        <td>'.$item['updated_at'].'</td>
                                        <td><a href="view.php?id='.$item['id'].'"><button class="btn btn-default">Chi tiết</button></a></td>
                                        <td><button class="btn btn-danger" onclick="deletePost('.$item['id'].')">Xóa</button></td>
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

<!-- delete post User js -->
<script src="../../js/deletepost.js"></script>

<?php
include_once $baseUrl.'layouts/footer.php';
?> 