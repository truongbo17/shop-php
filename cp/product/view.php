<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

if (isset($_GET['id'])) {

    //get id từ form
    $id = getGET('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);

    // list category product
    $sql = "SELECT category.name as catename,product_category.* 
    FROM category RIGHT JOIN product_category 
    ON category.id = product_category.category_id
    WHERE product_id = $id";
    $list_cate = executeResult($sql);

    //size
    $sql = "SELECT * FROM size
    WHERE product_id = $id";
    $list_size = executeResult($sql);

    //color
    $sql = "SELECT * FROM color
    WHERE product_id = $id";
    $list_color = executeResult($sql);

    //gallery
    $sql = "SELECT * FROM galery_product
    WHERE product_id = $id";
    $list_galery = executeResult($sql);

    //comment
    $sql = "SELECT comment.*,user.fullname as fullname,user.thumbnail as thumbnail 
    FROM user RIGHT JOIN comment
    ON comment.user_id = user.id
    WHERE product_id = $id";
    $list_comment = executeResult($sql);
    $sql = "SELECT COUNT(comment) as totalcmt FROM comment WHERE product_id = $id";
    $totalcmt = executeResult($sql,true);

    //infomation product
    $sql = "SELECT product.*,product_category.category_id
    FROM product  
    LEFT JOIN product_category 
    ON product.id = product_category.product_id WHERE product.id = $id";
    $resultProduct = executeResult($sql, true);
    if ($resultProduct == '' || $resultProduct == null) {
        echo "<hr>";
        echo "<div style='text-align:center'>";
        echo "<p>Không có thông tin về sản phẩm này !</p>";
        echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
        echo "</div>";
        die;
    }
} else {
    echo "<hr>";
    echo "<div style='text-align:center'>";
    echo "<p>Vui lòng chọn sản phẩm để xem thông tin !</p>";
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
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">Chi tiết sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- product -->
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline dashboard-menu text-center">
                    <li><a class="active" href="#">Chi tiết sản phẩm (<?= $resultProduct['product_code'] ?>)</a></li>
                    <li>
                        <span>
                            <a href="edit.php?id=<?= $resultProduct['id'] ?>">Chỉnh Sửa</a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row mt-20">
            <div class="col-md-5">
                <div class="single-product-slider">
                    <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                        <div class='carousel-outer'>
                            <!-- me art lab slider -->
                            <div class='carousel-inner '>
                                <?php
                                $index = 0;
                                foreach ($list_galery as $item) {
                                    if ($index == 0) {
                                        echo '<div class="item active">';
                                    } else {
                                        echo '<div class="item">';
                                    }
                                    $index++;
                                    echo '
                                            <img src="' . fixUrl($item['thumbnail'], "../") . '" alt="" data-zoom-image="' . fixUrl($item['thumbnail'], "../../") . '" />
                                            </div>
                                            ';
                                }
                                ?>
                            </div>

                            <!-- sag sol -->
                            <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                <i class="tf-ion-ios-arrow-left"></i>
                            </a>
                            <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                <i class="tf-ion-ios-arrow-right"></i>
                            </a>
                        </div>

                        <!-- thumb -->
                        <ol class='carousel-indicators mCustomScrollbar meartlab'>
                            <?php
                            $index = 0;
                            foreach ($list_galery as $item) {
                                echo '
                                    <li data-target="#carousel-custom" data-slide-to="' . ($index++) . '"';
                                if ($index == 0) {
                                    echo 'class="active"';
                                }
                                echo '>
                                        <img src="' . fixUrl($item['thumbnail'], "../") . '" alt="" />
                                    </li>
                                    ';
                            }
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-details">
                    <h2><?= $resultProduct['title'] ?></h2>
                    <div class="product-quantity">
                        <span>Giá gốc:</span>
                        <ul>
                            <li><?= number_format($resultProduct['price']) ?> VNĐ </li>
                        </ul>
                        <span>| Giảm giá:</span>
                        <ul>
                            <li><?= number_format($resultProduct['discount']) ?> % </li>
                        </ul>
                        <span>| Giá cuối:</span>
                        <ul>
                            <li><?= number_format($resultProduct['price'] * ((100 - $resultProduct['discount']) / 100)) ?> VNĐ</li>
                        </ul>
                    </div>
                    <div class="product-quantity">
                        <span>Đường dẫn:</span>
                        <ul>
                            <li><?= $resultProduct['slug'] ?></li>
                        </ul>
                    </div>
                    <div class="product-quantity">
                        <span>Lượt xem :</span>
                        <ul>
                            <li><?= $resultProduct['view'] ?></li>
                        </ul>
                    </div>
                    <div class="product-quantity">
                        <span>Số lượng nhập:</span>
                        <ul>
                            <li><?= $resultProduct['quantity'] ?></li>
                        </ul>
                    </div>
                    <div class="product-quantity">
                        <span>Số lượng bán được:</span>
                        <ul>
                            <li><?= $resultProduct['sold'] ?></li>
                        </ul>
                    </div>
                    <div class="product-quantity">
                        <span>Số lượng tồn:</span>
                        <ul>
                            <li><?= ($resultProduct['quantity'] - $resultProduct['sold']) ?></li>
                        </ul>
                    </div>

                    <div class="color-swatches">
                        <span>Màu sắc:</span>
                        <ul>
                            <?php
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 1) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:blue;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 2) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:green;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 3) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:red;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 4) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:purple;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 5) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:yellow;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 6) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:pink;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 7) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:brown;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 8) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:black;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 9) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:white;border: 1px solid black;"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 10) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:grey;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 11) {
                                    echo '<li>
                                            <a href="#!" class="swatch" style="background-color:orange;border: 1px solid black"></a>
                                          </li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="product-size">
                        <span>Size:</span>
                            <?php
                            foreach ($list_size as $item) {
                                if ($item['sizename'] == 1) {
                                    echo '<p> - X - </p>';
                                }
                                if ($item['sizename'] == 2) {
                                    echo '<p> - M - </p>';
                                }
                                if ($item['sizename'] == 3) {
                                    echo '<p> - L -</p>';
                                }
                                if ($item['sizename'] == 4) {
                                    echo '<p> - XL - </p>';
                                }
                                if ($item['sizename'] == 5) {
                                    echo '<p> - XXL - </p>';
                                }
                            }
                            ?>
                    </div>
                    <div class="product-category">
                        <span>Danh mục :</span>
                        <ul>
                            <?php
                            foreach ($list_cate as $item) {
                                echo '<li>' . $item['catename'] . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <div class="tabCommon mt-20">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Chi tiết</a></li>
                        <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false"><?=$totalcmt['totalcmt']?> Đánh giá </a></li>
                    </ul>
                    <div class="tab-content patternbg">
                        <div id="details" class="tab-pane fade active in">
                            <h4>Chi tiết sản phẩm</h4>
                            <p><?= html_entity_decode($resultProduct['description']) ?></p>
                        </div>
                        <div id="reviews" class="tab-pane fade">
                            <div class="post-comments">
                                <ul class="media-list comments-list m-bot-50 clearlist">
                                    <!-- Comment Item start-->
                                    <?php
                                    foreach ($list_comment as $item) {
                                        echo '
                                            
                                            <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="' . fixUrl($item['thumbnail'], "../../") . '" alt="" width="50" height="50" />
                                            </a>
    
                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">'.$item['fullname'].'</a>
    
                                                    </h4>
                                                    <time datetime="2013-04-06T13:53">'.$item['created_at'].'</time>
                                                    <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>
    
                                                <p>
                                                '.$item['comment'].'
                                                </p>
                                            </div>
    
                                            </li>
                                            
                                            ';
                                    }
                                    ?>
                                    <!-- End Comment Item -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once $baseUrl . 'layouts/footer.php';
?>