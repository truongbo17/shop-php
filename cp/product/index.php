<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

$sql = "SELECT product.*,user.username
 FROM product  
 LEFT JOIN user 
 ON product.user_id = user.id ORDER BY updated_at DESC";
$resultProduct = executeResult($sql);
?>

<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Danh sách sản phẩm</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">manager user</li>
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
                    <a href="add.php" class="btn btn-main btn-small btn-round-full">Thêm sản phẩm</a>
                    <div id="alert">

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Mã Sản phẩm</th>
                                    <th>Tên Sản phẩm</th>
                                    <th>Người đăng</th>
                                    <th>Giá(Bao gồm khuyến mãi)</th>
                                    <th>Đã bán</th>
                                    <th>Lượt xem</th>
                                    <th>Trạng thái</th>
                                    <th>Update</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 0;
                                foreach ($resultProduct as $item) {
                                    $product_id = $item['id'];
                                    $sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
                                    $resultGaleryProduct = executeResult($sql, true);
                                    if($resultGaleryProduct == null){
                                        $resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
                                    }
                                    echo '

										<tr>
										<td>' . (++$index) . '</td>
										<td>                        
										<div class="product-info">
										<img width="80" src="' . fixUrl($resultGaleryProduct['thumbnail'], "../") . '" alt="avatar" />
										</div>
										</td>
                                        <td>' . $item['product_code'] . '</td>
                                        <td>' . $item['title'] . '</td>
										<td>' . $item['username'] . '</td>
										<td>' . number_format($item['price'] * ((100 - $item['discount']) / 100)) . ' VNĐ [' . $item['discount'] . '%]</td>
                                        <td>' . $item['sold'] . '</td>
                                        <td>' . $item['view'] . '</td>';
                                    if ($item['deleted'] == 0) {
                                        echo '<td><span id="status' . $item['id'] . '" class="label label-success">Bình thường</span></td>';
                                    } elseif ($item['deleted'] == 1) {
                                        echo '<td><span id="status' . $item['id'] . '" class="label label-warning">Cảnh Báo</span></td>';
                                    } elseif ($item['deleted'] == 2) {
                                        echo '<td><span id="status' . $item['id'] . '" class="label label-danger">Bị ẩn</span></td>';
                                    } else {
                                        echo '<td><span id="status' . $item['id'] . '" class="label label-primary">Sản phẩm nổi bật</span></td>';
                                    }
                                    echo '
										<td>';
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    echo date('H:i:s d/m/Y', strtotime($item['updated_at']));
                                    echo '</td>
										<td><a href="view.php?id=' . $item['id'] . '" class="btn btn-default">Chi tiết</a></td>
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

<?php
include_once $baseUrl . 'layouts/footer.php';
?>