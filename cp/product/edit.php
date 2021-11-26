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
    $totalcmt = executeResult($sql, true);

    //category
    $sql = "SELECT product_category.category_id as productcate,category.name as categoryname FROM product_category 
    LEFT JOIN category 
    ON product_category.category_id = category.id
    WHERE product_id = $id";
    $list_product = executeResult($sql);

    //category
    $sql = "SELECT * FROM category";
    $all_product = executeResult($sql);

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
                        <li class="active">Chỉnh sửa sản phẩm</li>
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
                    <li><a class="" href="#">Chi tiết sản phẩm</a></li>
                    <li>
                        <span>
                            <a class="active" href="#">Chỉnh Sửa (<?= $resultProduct['product_code'] ?>)</a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <p style="font-weight:bold">Lưu ý : </p>
        <p>Có thể chọn nhiều danh mục,kể cả cha hay con</p>
        <p>11 màu: xanh lam => 1,xanh lục=>2, đỏ=>3, tím=>4, vàng=>5, hồng=>6, nâu=>7, đen=>8, trắng=>9,xám=>10,cam=>11</p>
        <p>5 size:1->X,2->M,3->L,4->XL,5->XXL</p>
        <p>Giảm giá không được quá 99% </p>
        <p>Các trường nhập là số không được âm</p>
        <form method="POST" enctype="multipart/form-data">
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
                    <hr>
                    <p style="font-weight:bold">Cập nhật ảnh mới(Sẽ xóa toàn bộ ảnh cũ đi)</p>
                    <div class="input-images"></div>
                    <script>
                        $('.input-images').imageUploader();
                    </script>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="number" value="<?= $resultProduct['id'] ?>" name="id" hidden>
                        <input type="number" value="<?= $user['id'] ?>" name="userid" hidden>
                        <p>Mã sản phẩm</p>
                        <input require type="number" name="product_code" class="form-control" placeholder="Mã sản phẩm" value="<?= $resultProduct['product_code'] ?>" maxlength="6" size="6">
                    </div>
                    <div class="form-group">
                        <p>Tiêu đề sản phẩm</p>
                        <input require type="text" name="title" class="form-control" placeholder="Tiểu đề" value="<?= $resultProduct['title'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Giá</p>
                        <input require type="number" name="price" class="form-control" placeholder="Giá" value="<?= $resultProduct['price'] ?>">
                    </div>
                    <div class="form-group">
                        <p>% Giảm giá</p>
                        <input require type="number" name="discount" class="form-control" placeholder="0" value="<?= $resultProduct['discount'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Đường dẫn</p>
                        <input type="text" name="slug" class="form-control" placeholder="Đường dẫn" value="<?= $resultProduct['slug'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Lượt xem</p>
                        <input require type="number" name="view" class="form-control" placeholder="Lượt xem" value="<?= $resultProduct['view'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Số lượng nhập vào</p>
                        <input require type="number" name="quantity" class="form-control" placeholder="Số lượng nhập" value="<?= $resultProduct['quantity'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Đã bán</p>
                        <input require type="number" name="sold" class="form-control" placeholder="Đã bán" value="<?= $resultProduct['sold'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Trạng thái</p>
                        <select require class="form-control" name="deleted" id="deleted">
                            <?php
                            if ($resultProduct['deleted'] == 0) {
                                echo '<option value="0" selected>Bình thường</option>
                                    <option value="1">Cảnh báo</option>
                                    <option value="2">Bị ẩn</option>
                                    <option value="3">Nổi bật</option>';
                            }
                            if ($resultProduct['deleted'] == 1) {
                                echo '<option value="0" selected>Bình thường</option>
                                    <option value="1" selected>Cảnh báo</option>
                                    <option value="2">Bị ẩn</option>
                                    <option value="3">Nổi bật</option>';
                            }
                            if ($resultProduct['deleted'] == 2) {
                                echo '<option value="0" selected>Bình thường</option>
                                    <option value="1">Cảnh báo</option>
                                    <option value="2" selected>Bị ẩn</option>
                                    <option value="3">Nổi bật</option>';
                            }
                            if ($resultProduct['deleted'] == 3) {
                                echo '<option value="0" selected>Bình thường</option>
                                    <option value="1">Cảnh báo</option>
                                    <option value="2">Bị ẩn</option>
                                    <option value="3" selected>Nổi bật</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Màu</p>
                        <select require class="form-control" style="width:230px;" name="color[]" multiple>
                            <?php
                            echo '<option value="1"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 1) {
                                    echo 'selected';
                                }
                            }
                            echo '>Xanh Lam</option>';

                            echo '<option value="2"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 2) {
                                    echo 'selected';
                                }
                            }
                            echo '>Xanh Lục</option>';

                            echo '<option value="3"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 3) {
                                    echo 'selected';
                                }
                            }
                            echo '>Đỏ</option>';

                            echo '<option value="4"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 4) {
                                    echo 'selected';
                                }
                            }
                            echo '>Tím</option>';

                            echo '<option value="5"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 5) {
                                    echo 'selected';
                                }
                            }
                            echo '>Vàng</option>';

                            echo '<option value="6"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 6) {
                                    echo 'selected';
                                }
                            }
                            echo '>Hồng</option>';

                            echo '<option value="7"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 7) {
                                    echo 'selected';
                                }
                            }
                            echo '>Nâu</option>';

                            echo '<option value="8"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 8) {
                                    echo 'selected';
                                }
                            }
                            echo '>Đen</option>';

                            echo '<option value="9"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 9) {
                                    echo 'selected';
                                }
                            }
                            echo '>Trắng</option>';

                            echo '<option value="10"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 10) {
                                    echo 'selected';
                                }
                            }
                            echo '>Xám</option>';

                            echo '<option value="11"';
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 11) {
                                    echo 'selected';
                                }
                            }
                            echo '>Cam</option>';
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Size</p>
                        <select require class="form-control" style="width:230px;" name="size[]" size="5" multiple>
                            <?php
                            echo '<option value="1"';
                            foreach ($list_size as $item) {
                                if ($item['sizename'] == 1) {
                                    echo 'selected';
                                }
                            }
                            echo '>X</option>';
                            echo '<option value="2"';
                            foreach ($list_size as $item) {
                                if ($item['sizename'] == 2) {
                                    echo 'selected';
                                }
                            }
                            echo '>M</option>';
                            echo '<option value="3"';
                            foreach ($list_size as $item) {
                                if ($item['sizename'] == 3) {
                                    echo 'selected';
                                }
                            }
                            echo '>L</option>';
                            echo '<option value="4"';
                            foreach ($list_size as $item) {
                                if ($item['sizename'] == 4) {
                                    echo 'selectd';
                                }
                            }
                            echo '>XL</option>';
                            echo '<option value="5"';
                            foreach ($list_size as $item) {
                                if ($item['sizename'] == 5) {
                                    echo 'selected';
                                }
                            }
                            echo '>XXL</option>';
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Danh mục</p>
                        <select require class="form-control" style="width:230px;" name="category_product[]" multiple>
                            <?php
                            foreach ($all_product as $item) {
                                echo '<option value="' . $item['id'] . '"';
                                foreach ($list_product as $value) {
                                    if ($value['productcate'] == $item['id']) {
                                        echo " selected";
                                    }
                                }
                                $name = $item['name'];
                                echo ">$name</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group">
                    <p>Chi tiết</p>
                    <textarea id="description" name="description"><?= $resultProduct['description'] ?></textarea>
                </div>
            </div>
            <div class="alertPart" style="display: none;">
                <div class="alert alert-danger alert-common error-text" style="display: none;"></div>
                <div class="alert alert-success alert-common success-text" style="display: none;"></div>
            </div>
            <center><button class="btn btn-main">Lưu</button></center>
        </form>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <div class="tabCommon mt-20">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#reviews" aria-expanded="false"><?= $totalcmt['totalcmt'] ?> Đánh giá </a></li>
                    </ul>
                    <div class="tab-content patternbg">
                        <div id="details" class="tab-pane fade active in">
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
                                            <button class="btn btn-danger" style"float:right" onclick="deleteCmt(' . $item['id'] . ',' . $resultProduct['id'] . ')">Xóa</button>
                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">' . $item['fullname'] . '</a>
                                                    </h4>
                                                    <time datetime="2013-04-06T13:53">' . $item['created_at'] . '</time>
                                                    <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>
                                                <p>
                                                ' . $item['comment'] . '
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

<!-- edit product js -->
<script src="../../js/editproduct.js"></script>

<!-- delete cmt js -->
<script src="../../js/deletecmt.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>