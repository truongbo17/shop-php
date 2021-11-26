<?php
$baseUrl = './';
include_once 'layouts/header.php';

$sql = "SELECT * FROM product WHERE discount > 0 order by updated_at desc";
$trendingProduct = executeResult($sql);
shuffle($trendingProduct);


$sql = "SELECT product.* FROM product LEFT JOIN product_category ON product.id = product_category.product_id WHERE product_category.category_id = 1 order by updated_at desc";
$trendingProductNam = executeResult($sql);
$trendingProductNam1 = executeResult($sql);
shuffle($trendingProductNam);


$sql = "SELECT product.* FROM product LEFT JOIN product_category ON product.id = product_category.product_id WHERE product_category.category_id = 2 order by updated_at desc";
$trendingProductNu = executeResult($sql);
shuffle($trendingProductNu);

$sql = "SELECT * FROM product order by updated_at desc";
$newProduct =  executeResult($sql);
shuffle($newProduct);

$sql = "SELECT * FROM product order by view desc";
$viewProduct = executeResult($sql);
shuffle($viewProduct);

$ipaddress = getip();
$key = "\r\n";
$file = 'getip.txt';
$fp = fopen($file, 'a');
fwrite($fp, $ipaddress);
fwrite($fp, $key);
fclose($fp)
?>
<script type="text/javascript">
function hide_float_right() {
    var content = document.getElementById('float_content_right');
    var hide = document.getElementById('hide_float_right');
    if (content.style.display == "none")
    {content.style.display = "block"; hide.innerHTML = '<a href="javascript:hide_float_right()"> <?php echo getip();?> [X]</a>'; }
        else { content.style.display = "none"; hide.innerHTML = '<a href="javascript:hide_float_right()"><?php echo getip();?> </a>';
    }
    }
	function myF(){
      onl.style.display = "block";
      
    }
    function un(){
        onl.style.display = "none";
    }
</script>
	
<style>
.float-ck { position: fixed; bottom: 30px; z-index: 9000}
* html .float-ck {position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
#float_content_right {border: 3px solid #01AEF0;}
#hide_float_right {text-align:right; font-size: 11px;}
#hide_float_right a {background: #01AEF0; padding: 2px 4px; color: #FFF;}
</style>
<body onload="myF()">
    <div class="float-ck" style="right: 0px" >
<div id="hide_float_right">
<a href="javascript:hide_float_right()">IP : <?php echo getip();?></a></div>
<div id="float_content_right">
</div>
</div>
    <div id="onl" style="position: fixed; bottom: 160px; top:80px;left:450px;z-index:100;">
        <div style="backgroud-color:black; width:1000px; height=200px;">
            <a href="javascript:un()" style="color:black; font-weight:bold;font-size: 26px;"> [X]</a>
            <img src="https://i.imgur.com/h5M0zPq.png" width="450" height="450" />
        </div>
    </div>	
</body>

<div class="container">
	<div class="row" style="width:100%">
		<div class="col-md-7">
			<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:300px">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" style="height:300px">
					<div class="item active">
						<img src="https://nhakhoadainam.vn/wp-content/uploads/2020/01/khuyen-mai-tet.jpg" alt="Los Angeles" style="width:100%;">
					</div>

					<div class="item">
						<img src="https://www.wheystore.vn/upload/news_optimize/main/upl_3_ng__y_v__ng__t__ng_b___ng_khai_tr____ng_1595910155_image_1595910155.jpg" alt="Chicago" style="width:100%;">
					</div>

					<div class="item">
						<img src="https://speedhost.vn/images/thumbnails/894/536/blog/1/banner-tet-speedhost.jpg" alt="New york" style="width:100%;">
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="tf-ion-android-arrow-back"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="tf-ion-android-arrow-forward"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-6" id="thoitrang">
					<div class="category-box" style="margin-bottom:0px;min-height:150px">
						<a href="#!">
							<img src="images/shop/category/category-1.jpg" alt="" />
							<div class="content">
								<h3>Thời trang nam</h3>
								<p>Tất cả các mẫu quần áo mới nhất</p>
							</div>
						</a>
					</div>
					<div class="category-box" style="margin-bottom:20px;min-height:150px">
						<a href="#!">
							<img src="images/shop/category/category-2.jpg" alt="" />
							<div class="content">
								<h3>Thời trang nữ</h3>
								<p>Xuân Hạ Thu Đông </p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-6" id="macladep">
					<div class="category-box category-box-2" style="margin-bottom:20px;min-height:300px">
						<a href="#!">
							<img src="images/shop/category/category-3.jpg" alt="" />
							<div class="content">
								<h3>Thời trang</h3>
								<p>MẶC LÀ ĐẸP ! Thế nhé =))</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="products section bg-gray" style="padding-top: 0px;">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<a href="category.php?id=1">
					<h2>Sản phẩm theo xu hướng</h2>
				</a>
			</div>
		</div>
		<div class="row">
			<?php
			//lặp 4 lần ngẫu nhiên
			//substr xóa 3 kí tự ../ để tránh lỗi ảnh
			for ($i = 0; $i < 4; $i++) {
				$product_id = $trendingProduct[$i]['id'];
				$sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
				$resultGaleryProduct = executeResult($sql, true);
				if ($resultGaleryProduct == null) {
					$resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
				}

				echo '
				<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">';
				if ($trendingProduct[$i]['discount'] > 0) {
					echo '<span class="bage">Sale ' . $trendingProduct[$i]['discount'] . ' %</span>';
				}
				if (($trendingProduct[$i]['quantity'] - $trendingProduct[$i]['sold']) == 0) {
					echo '<span class="bage1">HẾT HÀNG</span>';
				}
				echo '<img class="img-responsive" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="product-img" loading="lazy" style="object-fit: cover;
				width: 100%;
				height: 350px;"/>
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal" onclick="viewProduct(' . $trendingProduct[$i]['id'] . ')">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="product-detail.php?id=' . ($trendingProduct[$i]['id']) . '"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="product-content">
						<h4><a href="product-detail.php?id=' . ($trendingProduct[$i]['id']) . '">' . $trendingProduct[$i]['title'] . '</a></h4>
						<p class="price">';
				if ($trendingProduct[$i]['discount'] > 0) {
					echo '<del style="color:red;font-size:12px">' . number_format($trendingProduct[$i]['price']) . ' VNĐ</del>' . '&nbsp;'
						. number_format($trendingProduct[$i]['price'] * ((100 - $trendingProduct[$i]['discount']) / 100)) . ' VNĐ';
				} else {
					echo number_format($trendingProduct[$i]['price']) . ' VNĐ';
				}
				echo '</p>
					</div>
				</div>
			</div>';
			}
			?>
		</div>

		<div class="row">
			<div class="title text-center">
				<a href="category.php?id=1">
					<h2>Thời trang nam</h2>
				</a>
			</div>
		</div>
		<!-- category -->
		<div class="row">
			<?php
			//lặp 4 lần ngẫu nhiên
			//substr xóa 3 kí tự ../ để tránh lỗi ảnh
			for ($i = 0; $i < 4; $i++) {
				$product_id = $trendingProductNam[$i]['id'];
				$sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
				$resultGaleryProduct = executeResult($sql, true);
				if ($resultGaleryProduct == null) {
					$resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
				}
				echo '
				<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">';
				if ($trendingProductNam[$i]['discount'] > 0) {
					echo '<span class="bage">Sale ' . $trendingProductNam[$i]['discount'] . ' %</span>';
				}
				if (($trendingProductNam[$i]['quantity'] - $trendingProductNam[$i]['sold']) == 0) {
					echo '<span class="bage1">HẾT HÀNG</span>';
				}
				echo '<img class="img-responsive" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="product-img" loading="lazy" style="height: 350px;width:100%;"/>
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal" onclick="viewProduct(' . $trendingProductNam[$i]['id'] . ')">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="product-detail.php?id=' . ($trendingProduct[$i]['id']) . '"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="product-content">
						<h4><a href="product-detail.php?id=' . ($trendingProductNam[$i]['id']) . '">' . $trendingProductNam[$i]['title'] . '</a></h4>
						<p class="price">';
				if ($trendingProductNam[$i]['discount'] > 0) {
					echo '<del style="color:red;font-size:12px">' . number_format($trendingProductNam[$i]['price']) . ' VNĐ</del>' . '&nbsp;'
						. number_format($trendingProductNam[$i]['price'] * ((100 - $trendingProductNam[$i]['discount']) / 100)) . ' VNĐ';
				} else {
					echo number_format($trendingProductNam[$i]['price']) . ' VNĐ';
				}
				echo '</p>
					</div>
				</div>
			</div>';
			}
			?>
		</div>
		<!-- end category -->

		<div class="row">
			<div class="title text-center">
				<a href="category.php?id=2">
					<h2>Thời trang nữ</h2>
				</a>
			</div>
		</div>
		<!-- category -->
		<div class="row">
			<?php
			//lặp 4 lần ngẫu nhiên
			//substr xóa 3 kí tự ../ để tránh lỗi ảnh
			for ($i = 0; $i < 4; $i++) {
				$product_id = $trendingProductNu[$i]['id'];
				$sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
				$resultGaleryProduct = executeResult($sql, true);
				if ($resultGaleryProduct == null) {
					$resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
				}

				echo '
				<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">';
				if ($trendingProductNu[$i]['discount'] > 0) {
					echo '<span class="bage">Sale ' . $trendingProductNu[$i]['discount'] . ' %</span>';
				}
				if (($trendingProductNu[$i]['quantity'] - $trendingProductNu[$i]['sold']) == 0) {
					echo '<span class="bage1">HẾT HÀNG</span>';
				}
				echo '<img class="img-responsive" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="product-img" loading="lazy" style="height: 350px;width:100%;"/>
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal" onclick="viewProduct(' . $trendingProductNu[$i]['id'] . ')">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="product-detail.php?id=' . ($trendingProduct[$i]['id']) . '"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="product-content">
						<h4><a href="product-detail.php?id=' . ($trendingProductNu[$i]['id']) . '">' . $trendingProductNu[$i]['title'] . '</a></h4>
						<p class="price">';
				if ($trendingProductNu[$i]['discount'] > 0) {
					echo '<del style="color:red;font-size:12px">' . number_format($trendingProductNu[$i]['price']) . ' VNĐ</del>' . '&nbsp;'
						. number_format($trendingProductNu[$i]['price'] * ((100 - $trendingProductNu[$i]['discount']) / 100)) . ' VNĐ';
				} else {
					echo number_format($trendingProductNu[$i]['price']) . ' VNĐ';
				}
				echo '</p>
					</div>
				</div>
			</div>';
			}
			?>
		</div>
		<!-- end category -->

		<div class="row">
			<div class="title text-center">
				<a href="category.php?id=36">
					<h2>Thời trang trẻ em</h2>
				</a>
			</div>
		</div>
		<!-- category -->
		<div class="row">
			<?php

			$sql = "SELECT product.* FROM product LEFT JOIN product_category ON product.id = product_category.product_id WHERE product_category.category_id = 36 order by updated_at desc";
			$trendingProductTre = executeResult($sql);
			shuffle($trendingProductTre);
			//lặp 4 lần ngẫu nhiên
			//substr xóa 3 kí tự ../ để tránh lỗi ảnh
			for ($i = 0; $i < 4; $i++) {
				$product_id = $trendingProductTre[$i]['id'];
				$sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
				$resultGaleryProduct = executeResult($sql, true);
				if ($resultGaleryProduct == null) {
					$resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
				}

				echo '
				<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">';
				if ($trendingProductTre[$i]['discount'] > 0) {
					echo '<span class="bage">Sale ' . $trendingProductTre[$i]['discount'] . ' %</span>';
				}
				if (($trendingProductTre[$i]['quantity'] - $trendingProductTre[$i]['sold']) == 0) {
					echo '<span class="bage1">HẾT HÀNG</span>';
				}
				echo '<img class="img-responsive" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="product-img" loading="lazy" style="height: 350px;width:100%;"/>
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal" onclick="viewProduct(' . $trendingProductTre[$i]['id'] . ')">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="product-detail.php?id=' . ($trendingProduct[$i]['id']) . '"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="product-content">
						<h4><a href="product-detail.php?id=' . ($trendingProductTre[$i]['id']) . '">' . $trendingProductTre[$i]['title'] . '</a></h4>
						<p class="price">';
				if ($trendingProductTre[$i]['discount'] > 0) {
					echo '<del style="color:red;font-size:12px">' . number_format($trendingProductTre[$i]['price']) . ' VNĐ</del>' . '&nbsp;'
						. number_format($trendingProductTre[$i]['price'] * ((100 - $trendingProductTre[$i]['discount']) / 100)) . ' VNĐ';
				} else {
					echo number_format($trendingProductTre[$i]['price']) . ' VNĐ';
				}
				echo '</p>
					</div>
				</div>
			</div>';
			}
			?>
		</div>
		<!-- end category -->



		<div class="row">
			<div class="title text-center">
				<a href="category.php?id=1">
					<h2>Sản phẩm mới về</h2>
				</a>
			</div>
		</div>
		<!-- category -->
		<div class="row">
			<?php
			//lặp 4 lần ngẫu nhiên
			//substr xóa 3 kí tự ../ để tránh lỗi ảnh
			for ($i = 0; $i < 4; $i++) {
				$product_id = $newProduct[$i]['id'];
				$sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
				$resultGaleryProduct = executeResult($sql, true);
				if ($resultGaleryProduct == null) {
					$resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
				}

				echo '
				<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">';
				if ($newProduct[$i]['discount'] > 0) {
					echo '<span class="bage">Sale ' . $newProduct[$i]['discount'] . ' %</span>';
				}
				if (($newProduct[$i]['quantity'] - $newProduct[$i]['sold']) == 0) {
					echo '<span class="bage1">HẾT HÀNG</span>';
				}
				echo '<img class="img-responsive" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="product-img" loading="lazy" style="height: 350px;width:100%;"/>
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal" onclick="viewProduct(' . $newProduct[$i]['id'] . ')">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="product-detail.php?id=' . ($trendingProduct[$i]['id']) . '"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="product-content">
						<h4><a href="product-detail.php?id=' . ($newProduct[$i]['id']) . '">' . $newProduct[$i]['title'] . '</a></h4>
						<p class="price">';
				if ($newProduct[$i]['discount'] > 0) {
					echo '<del style="color:red;font-size:12px">' . number_format($newProduct[$i]['price']) . ' VNĐ</del>' . '&nbsp;'
						. number_format($newProduct[$i]['price'] * ((100 - $newProduct[$i]['discount']) / 100)) . ' VNĐ';
				} else {
					echo number_format($newProduct[$i]['price']) . ' VNĐ';
				}
				echo '</p>
					</div>
				</div>
			</div>';
			}
			?>
		</div>
		<!-- end category -->

		<div class="row">
			<div class="title text-center">
				<a href="category.php?id=2">
					<h2>Sản phẩm được xem nhiều</h2>
				</a>
			</div>
		</div>
		<!-- category -->
		<div class="row">
			<?php
			//lặp 4 lần ngẫu nhiên
			//substr xóa 3 kí tự ../ để tránh lỗi ảnh
			for ($i = 0; $i < 4; $i++) {
				$product_id = $viewProduct[$i]['id'];
				$sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
				$resultGaleryProduct = executeResult($sql, true);
				if ($resultGaleryProduct == null) {
					$resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
				}

				echo '
				<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">';
				if ($viewProduct[$i]['discount'] > 0) {
					echo '<span class="bage">Sale ' . $viewProduct[$i]['discount'] . ' %</span>';
				}
				if (($viewProduct[$i]['quantity'] - $viewProduct[$i]['sold']) == 0) {
					echo '<span class="bage1">HẾT HÀNG</span>';
				}
				echo '<img class="img-responsive" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="product-img" loading="lazy" style="height: 350px;width:100%;"/>
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal" onclick="viewProduct(' . $viewProduct[$i]['id'] . ')">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="product-detail.php?id=' . ($trendingProduct[$i]['id']) . '"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="product-content">
						<h4><a href="product-detail.php?id=' . ($viewProduct[$i]['id']) . '">' . $viewProduct[$i]['title'] . '</a></h4>
						<p class="price">';
				if ($viewProduct[$i]['discount'] > 0) {
					echo '<del style="color:red;font-size:12px">' . number_format($viewProduct[$i]['price']) . ' VNĐ</del>' . '&nbsp;'
						. number_format($viewProduct[$i]['price'] * ((100 - $viewProduct[$i]['discount']) / 100)) . ' VNĐ';
				} else {
					echo number_format($viewProduct[$i]['price']) . ' VNĐ';
				}
				echo '</p>
					</div>
				</div>
			</div>';
			}
			?>
		</div>
		<!-- end category -->



		<!-- Modal -->
		<div id="">
			<div class="modal product-modal fade" id="product-modal">
				<button onclick="resetPr()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="tf-ion-close"></i>
				</button>
				<div class="modal-dialog " role="document" id="resetPr">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-sm-6 col-xs-12">
									<div class="modal-image" id="appendPrimg">

									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="product-short-details">
										<h2 class="product-title" id="appendPrtitle"></h2>
										<p class="product-price" id="appendPrprice"></p>
										<p class="product-short-description" id="appendPrdescription">

										</p>
										<a href="cart.html" class="btn btn-main">THÊM GIỎ HÀNG</a>
										<a href="" id="viewPrLink" class="btn btn-transparent">Chi tiết sản phẩm</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.modal -->
	</div>
</section>
<hr>


<!-- post -->
<div class="container">
	<div class="row">
		<div class="title text-center">
			<h2>Bài viết mới</h2>
		</div>
	</div>
	<div class="row">
		<?php
		$sql = "SELECT post.*,user.username as username FROM post LEFT JOIN user ON post.user_id = user.id ORDER BY updated_at DESC LIMIT 3";
		$postResult = executeResult($sql);
		foreach ($postResult as $item) {
			echo '
				<div class="col-md-4">
				<div class="post">
					<div class="post-thumb">
						<a href="post.php?id='.$item['id'].'">
							<img class="img-responsive" src="' . substr($item['thumbnail'], 3) . '" loading="lazy" alt="" style="width:100%">
						</a>
					</div>
					<h2 class="post-title"><a href="post.php?id='.$item['id'].'">' . $item['title'] . '</a></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY ' . $item['username'] . '
							</li>
							<li>
								<a href="post.php?id='.$item['id'].'"><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href="blog-grid.html"> TRAVEL</a>, <a href="blog-grid.html">FASHION</a>
							</li>
							<li>
								<a href="#!"><i class="tf-ion-chatbubbles"></i> ' . $item['view'] . ' VIEWS</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
				';
		}
		?>
	</div>
</div>
<script>
	function viewProduct(id) {
		$.post(BASE_URL + API_PRODUCT, {
			'action': 'view_product',
			'id': id
		}, function(data) {
			newdata = JSON.parse(data)
			var discount = newdata['discount'];
			var price = newdata['price'];
			var viewPrLink = newdata['id'];
			var newdis;
			if (discount > 0) {
				newdis = '<label class="btn btn-main"> SALE ' + discount + ' %</label>';
				newprice = '<del style="color:red;font-size:12px">' + price + ' VND</del>' + '&nbsp;' + price * ((100 - discount) / 100);
			} else {
				newdis = '';
				newprice = price;
			}
			var thumbnail = newdata['thumbnail'].substr(3);

			$('#appendPrimg').append(newdis + '<img class="img-responsive" src="' + thumbnail + '" alt="product-img" loading="lazy" />');
			$('#appendPrtitle').append(newdata['title'] + ' MSP : ' + newdata['product_code']);
			$('#appendPrprice').append(newprice + 'VNĐ');
			$('#viewPrLink').attr('href', 'product-detail.php?id=' + viewPrLink);
			$('#appendPrdescription').append('Bạn ưng sản phẩm này ? Mua ngay !!!');
		});
	}

	function resetPr() {
		$('#resetPr').empty();
		$('#resetPr').append(`<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-sm-6 col-xs-12">
									<div class="modal-image" id="appendPrimg">

									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="product-short-details">
										<h2 class="product-title" id="appendPrtitle"></h2>
										<p class="product-price" id="appendPrprice"></p>
										<p class="product-short-description" id="appendPrdescription">

										</p>
										<a href="#" class="btn btn-main">Add To Cart</a>
										<a href="#" class="btn btn-transparent">View Product Details</a>
									</div>
								</div>
							</div>
						</div>
					</div>`);
	}

	function addCart(productId, num) {
		$.post(BASE_URL + API_PRODUCT, {
			'action': 'addToCart',
			'id': productId,
			'num': num,
			'color': $('input[name=color]:checked').val(),
			'size': $('select[name=size]').val()
		}, function(data) {
			location.reload()
		})
	}
</script>
<!-- end post -->
<?php
include_once './layouts/footer.php';
?>