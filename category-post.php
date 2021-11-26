<?php
$baseUrl = './';
include_once $baseUrl . 'layouts/header.php';

?>
<section id="menu" class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <ol class="breadcrumb">
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">Danh mục bài viết</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- post -->
<div class="container">
    <div class="row">
        <div class="title text-center">
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
						<a href="post.php?id=' . $item['id'] . '">
							<img class="img-responsive" src="' . substr($item['thumbnail'], 3) . '" loading="lazy" alt="" style="width:100%">
						</a>
					</div>
					<h2 class="post-title"><a href="post.php?id=' . $item['id'] . '">' . $item['title'] . '</a></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY ' . $item['username'] . '
							</li>
							<li>
								<a href="post.php?id=' . $item['id'] . '"><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href="blog-grid.html"> TRAVEL</a>, <a href="blog-grid.html">FASHION</a>
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

<?php
include_once $baseUrl . 'layouts/footer.php';
?>