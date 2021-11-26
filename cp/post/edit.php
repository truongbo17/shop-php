<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

//category
$sql = "SELECT * FROM category_post";
$all_cate_post = executeResult($sql);

if (isset($_GET['id'])) {

    //get id từ form
    $id = getGET('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);

    $sql = "SELECT post.*,user.username as username,category_post.name as categoryname 
    FROM category_post RIGHT JOIN post 
    ON category_post.id = post.category_id 
    LEFT JOIN user 
    ON user.id = post.user_id";
    $resultPost = executeResult($sql, true);
    if ($resultPost == '' || $resultPost == null) {
        echo "<hr>";
        echo "<div style='text-align:center'>";
        echo "<p>Không có thông tin về bài viết này !</p>";
        echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
        echo "</div>";
        die;
    }
} else {
    echo "<hr>";
    echo "<div style='text-align:center'>";
    echo "<p>Vui lòng chọn bài viết để xem thông tin !</p>";
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
                        <li class="active">Thêm bài viết mới</li>
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
                            <a class="active" href="#">Chỉnh sửa bài viết (<?= $resultPost['title'] ?>) </a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <form method="POST" enctype="multipart/form-data">
            <input type="number" value="<?= $user['id'] ?>" name="userid" hidden>
            <input type="number" value="<?= $resultPost['id'] ?>" name="id" hidden>
            <div class="row mt-20">
                <div class="col-md-12">
                    <div class="form-group">
                        <p>Tiêu đề bài viết</p>
                        <input require type="text" name="title" class="form-control" placeholder="Tiểu đề" value="<?= $resultPost['title'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Đường dẫn</p>
                        <input require type="text" name="slug" class="form-control" placeholder="Đường dẫn" value="<?= $resultPost['slug'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Lượt xem</p>
                        <input require type="number" name="view" class="form-control" placeholder="Lượt xem" value="<?= $resultPost['view'] ?>">
                    </div>
                    <div class="form-group">
                        <p>Danh mục</p>
                        <select require class="form-control" name="category_id">
                            <?php
                            foreach ($all_cate_post as $item) {
                                if($resultPost['category_id'] == $item['id']){
                                    echo '<option value="' . $item['id'] . '" selected>' . $item['name'] . '</option>';
                                }else{
                                    echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <p>Chi tiết</p>
                <textarea id="description" name="description"><?= $resultPost['content'] ?></textarea>
            </div>
            <div class="alertPart" style="display: none;">
                <div class="alert alert-danger alert-common error-text" style="display: none;"></div>
                <div class="alert alert-success alert-common success-text" style="display: none;"></div>
            </div>
            <center><button class="btn btn-main">Lưu</button></center>
        </form>
    </div>
</section>

<!-- edit post js -->
<script src="../../js/addpost.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>