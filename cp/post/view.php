<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

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
                        <li class="active">Chi tiết người dùng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- profile -->
<section id="profile" class="user-dashboard page-wrapper" style="padding-top:10px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline dashboard-menu text-center">
                    <li><a class="active" href="#">Chi tiết bài viết (<?= $resultPost['id'] ?>)</a></li>
                    <li>
                        <span>
                            <a href="edit.php?id=<?= $resultPost['id'] ?>">Chỉnh Sửa</a>
                        </span>
                    </li>
                </ul>
                <div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                        <div class="media-body">
                            <ul class="user-profile-list">
                                <li><span>Tác giả:</span><?= $resultPost['username'] ?></li>
                                <li><span>Tiêu đề:</span><?= $resultPost['title'] ?></li>
                                <li><span>Đường dẫn:</span><?= $resultPost['slug'] ?></li>
                                <li><span>Lượt xem:</span><?= $resultPost['view'] ?></li>
                                <li><span>Danh mục:</span><?= $resultPost['categoryname'] ?></li>
                                <li><span>Ngày tạo:</span><?= date('H:i:s d/m/Y', strtotime($resultPost['created_at'])) ?></li>
                                <li><span>Ngày cập nhật:</span><?= date('H:i:s d/m/Y', strtotime($resultPost['updated_at'])) ?></li>
                                <li><span>Nội dung:</span></li>
                                <html>
                                    <?= $resultPost['content'] ?>
                                </html>
                            </ul>
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