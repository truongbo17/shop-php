<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

$sql = "SELECT coupon.*,user.username as username FROM coupon LEFT JOIN user ON coupon.user_id = user.id";
$resultCoupon = executeResult($sql);

?>

<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Danh sách mã giảm giá</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">couon</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="user-dashboard page-wrapper" style="padding-top:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-wrapper user-dashboard">
                    <label>Thêm mã giảm giá,miễn phí vận chuyển</label>
                    <div id="alert">

                    </div>
                    <form method="POST">
                        <input type="text" name="user_id" value="<?= $user['id'] ?>" hidden>
                        <div class="alertPart" style="display: none;">
                            <div class="alert alert-danger alert-common error-text" style="display: none;"></div>
                            <div class="alert alert-success alert-common success-text" style="display: none;"></div>
                        </div>
                        <p>Nhập mã giảm giá (để trống sẽ tự tạo)</p>
                        <div class="form-group">
                            <input type="text" placeholder="MÃ GIẢM GIÁ" class="form-control" name="couponname" id="couponname" require="true">
                        </div>
                        <p>Phần trăm giảm giá</p>
                        <div class="form-group">
                            <input type="number" value="5" class="form-control" name="percent" id="percent" require="true">
                        </div>
                        <p>Số lượng</p>
                        <div class="form-group">
                            <input type="number" value="1" class="form-control" name="couponnumber" id="couponnumber" require="true">
                        </div>
                        <br>
                        <button class="btn btn-main">Lưu</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="dashboard-wrapper user-dashboard">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Người tạo</th>
                                    <th>Mã</th>
                                    <th>Số lượng</th>
                                    <th>% giảm giá</th>
                                    <th>Đã sử dụng</th>
                                    <th>Ngày tạo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 0;
                                foreach ($resultCoupon as $item) {
                                    echo '<tr>
									<td>' . (++$index) . '</td>
                                    <td>' . $item['username'] . '</td> 
									<td>' . $item['name'] . '</td> 
                                    <td>' . $item['number'] . '</td> 
									<td>' . $item['percent'] . '</td> 
                                    <td>' . $item['usecoupon'] . '</td> 
                                    <td>' . date('H:i:s d/m/Y', strtotime($item['created_at'])) . '</td> 
                                    <td><button class="btn btn-danger" onclick="deleteCoupon(' . $item['id'] . ')">XÓA</button></td>
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

<!-- addcoupon js -->
<script src="../../js/addcoupon.js"></script>

<!-- deletecoupon -->
<script src="../../js/deletecoupon.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>