<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

//category
$sql = "SELECT * FROM category";
$all_product = executeResult($sql);

?>
<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <ol class="breadcrumb">
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">Thêm sản phẩm mới</li>
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
                    <li><a class="" href="<?= $baseUrl ?>index.php">Quay lại</a></li>
                    <li>
                        <span>
                            <a class="active" href="#">Thêm sản phẩm</a>
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
            <input type="number" value="<?= $user['id'] ?>" name="userid" hidden>
            <div class="row mt-20">
                <div class="col-md-5">
                    <hr>
                    <p style="font-weight:bold">Chọn nhiều ảnh(Ảnh đầu tiên sẽ là ảnh đại diện)</p>
                    <div class="input-images"></div>
                    <script>
                        $('.input-images').imageUploader();
                    </script>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <p>Mã sản phẩm</p>
                        <input type="number" name="product_code" class="form-control" placeholder="Mã sản phẩm" maxlength="6" size="6" require>
                    </div>
                    <div class="form-group">
                        <p>Tiêu đề sản phẩm</p>
                        <input require type="text" name="title" class="form-control" placeholder="Tiểu đề">
                    </div>
                    <div class="form-group">
                        <p>Giá</p>
                        <input require type="number" name="price" class="form-control" placeholder="Giá">
                    </div>
                    <div class="form-group">
                        <p>% Giảm giá</p>
                        <input require type="number" name="discount" class="form-control" placeholder="0">
                    </div>
                    <div class="form-group">
                        <p>Đường dẫn</p>
                        <input type="text" name="slug" class="form-control" placeholder="Đường dẫn">
                    </div>
                    <div class="form-group">
                        <p>Lượt xem</p>
                        <input require type="number" name="view" class="form-control" placeholder="Lượt xem">
                    </div>
                    <div class="form-group">
                        <p>Số lượng nhập vào</p>
                        <input require type="number" name="quantity" class="form-control" placeholder="Số lượng nhập">
                    </div>
                    <div class="form-group">
                        <p>Đã bán</p>
                        <input require type="number" name="sold" class="form-control" placeholder="Đã bán">
                    </div>
                    <div class="form-group">
                        <p>Trạng thái</p>
                        <select require class="form-control" name="deleted" id="deleted">
                            <option value="0" selected>Bình thường</option>
                            <option value="1">Cảnh báo</option>
                            <option value="2">Bị ẩn</option>
                            <option value="3">Nổi bật</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Màu</p>
                        <select require class="form-control" style="width:230px;" name="color[]" size="11" multiple>
                            <option value="1"> Xanh Lam</option>
                            <option value="2"> Xanh Lục</option>
                            <option value="3"> Đỏ</option>
                            <option value="4"> Tím</option>
                            <option value="5"> Vàng</option>
                            <option value="6"> Hồng</option>
                            <option value="7"> Nâu</option>
                            <option value="8"> Đen</option>
                            <option value="9"> Trắng</option>
                            <option value="10"> Xám</option>
                            <option value="11"> Cam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Size</p>
                        <select require class="form-control" style="width:230px;" name="size[]" size="5" multiple>
                            <option value="1"> X</option>
                            <option value="2"> M</option>
                            <option value="3"> L</option>
                            <option value="4"> XL</option>
                            <option value="5"> XXL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Danh mục</p>
                        <select require class="form-control" style="width:230px;" name="category_product[]" multiple>
                            <?php
                            foreach ($all_product as $item) {
                                echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group">
                    <p>Chi tiết</p>
                    <textarea id="description" name="description"></textarea>
                </div>
            </div>
            <div class="alertPart" style="display: none;">
                <div class="alert alert-danger alert-common error-text" style="display: none;"></div>
                <div class="alert alert-success alert-common success-text" style="display: none;"></div>
            </div>
            <center><button class="btn btn-main">Lưu</button></center>
        </form>
    </div>
</section>

<!-- edit product js -->
<script src="../../js/addproduct.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>