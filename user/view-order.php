<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

if (isset($_GET['order_id'])) {

    //get id từ form
    $order_id = getGET('order_id');
    //fix all sql injection :))
    $order_id = preg_replace("/[^0-9]/", "", $order_id);
    //detail
    $sql = "SELECT `order_detail`.*,`product`.title as title,`product`.price as cost
    FROM `order_detail` 
    LEFT JOIN `product` ON `order_detail`.product_id = `product`.id
    WHERE order_id = $order_id";
    $resultOrderDetail = executeResult($sql);
    if ($resultOrderDetail == '' || $resultOrderDetail == null) {
        echo "<hr>";
        echo "<div style='text-align:center'>";
        echo "<p>Không có thông tin về order này !</p>";
        echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
        echo "</div>";
        die;
    }
} else {
    echo "<hr>";
    echo "<div style='text-align:center'>";
    echo "<p>Vui lòng chọn order để xem thông tin !</p>";
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
                        <li class="active">Chi tiết đơn hàng</li>
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
                <p style="font-weight:bold;padding-bottom:20px"> Thông tin đơn hàng </p>

                <div class="block" style="border:solid 1px #dedede">
                    <div class="product-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Size</th>
                                    <th>Màu</th>
                                    <th>Giá gốc</th>
                                    <th>Giá hiển thị</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($resultOrderDetail as $item) {
                                    $product_id = $item['product_id'];
                                    $sql = "SELECT * FROM galery_product WHERE product_id = '$product_id'";
                                    $thumbnailPr = executeResult($sql, true);
                                    if ($thumbnailPr == null) {
                                        $thumbnailpr = 'https://cdn1.vectorstock.com/i/thumb-large/46/50/missing-picture-page-for-website-design-or-mobile-vector-27814650.jpg';
                                    } else {
                                        $thumbnailpr = fixUrl($thumbnailPr['thumbnail'], "./");
                                    }
                                    echo '
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img width="80" src="' . $thumbnailpr . '" alt="" />
                                </div>
                            </td>
                            <td>' . $item['title'] . '</td>
                            <td class="">';
                                    if ($item['size'] == 1) {
                                        echo 'X';
                                    }
                                    if ($item['size'] == 2) {
                                        echo 'M';
                                    }
                                    if ($item['size'] == 3) {
                                        echo 'L';
                                    }
                                    if ($item['size'] == 4) {
                                        echo 'XL';
                                    }
                                    if ($item['size'] == 5) {
                                        echo 'XXL';
                                    }
                                    echo '</td>
                                    <td class=""> 
                                            <div class="single-product-details">
                                            <div class="color-swatches">
                                            <ul>';
                                    if ($item['color'] == 1) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:blue;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 2) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:green;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 3) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:red;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 4) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:purple;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 5) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:yellow;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 6) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:pink;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 7) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:brown;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 8) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:black;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 9) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:white;border: 1px solid black;"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 10) {
                                        echo ' <li>
                                                        <a href="#!" class="swatch" style="background-color:grey;border: 1px solid black"></a>
                                                      </li>';
                                    }
                                    if ($item['color'] == 11) {
                                        echo '<li>
                                                        <a href="#!" class="swatch" style="background-color:orange;border: 1px solid black"></a>
                                                      </li>';
                                    }

                                    echo '</ul></div></div></td>
                            <td>' . number_format($item['cost']) . ' VNĐ</td>
                            <td>' . number_format($item['price']) . ' VNĐ</td>
                            <td>' . $item['num'] . '</td>
                        <tr>
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

<?php
include_once $baseUrl . 'layouts/footer.php';
?>