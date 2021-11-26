<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';


if (isset($_GET['id'])) {

    //get id từ form
    $id = getGET('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);

    $sql = "SELECT `order`.* , `user`.thumbnail as thumbnail, SUM(`order_detail`.num) as totalnum 
    FROM `order_detail` RIGHT JOIN `order` ON `order_detail`.order_id = `order`.id
    LEFT JOIN `user` ON `order`.user_id = `user`.id WHERE `order`.id = $id";
    $resultOrder = executeResult($sql, true);

    //detail
    $sql = "SELECT `order_detail`.*,`product`.title as title,`product`.price as cost
    FROM `order_detail` 
    LEFT JOIN `product` ON `order_detail`.product_id = `product`.id
    WHERE order_id = $id";
    $resultOrderDetail = executeResult($sql);
    if ($resultOrder == '' || $resultOrder == null) {
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
                    <h1 class="page-name">Chi tiết đơn hàng</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">order detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="page-wrapper" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="cart shopping">
        <div class="container">
            <div class="dashboard-wrapper user-dashboard">
                <div class="row">
                    <div class="col-md-4">
                        <p style="font-weight:bold"> Thông tin giao hàng </p>
                        <div class="dashboard-wrapper dashboard-user-profile">
                            <div class="media">
                                <div class="pull-left center" href="#!">
                                    <?php
                                    if ($resultOrder['thumbnail'] == null || $resultOrder['thumbnail'] == '') {
                                        $thumbnail = 'https://www.seekpng.com/png/detail/428-4287240_no-avatar-user-circle-icon-png.png';
                                    } else {
                                        $thumbnail = fixUrl($resultOrder['thumbnail'], "../../");
                                    }
                                    ?>
                                    <img class="media-object user-img" src="<?= $thumbnail ?>" alt="Image">

                                </div>
                                <div class="media-body">
                                    <ul class="user-profile-list">
                                        <li><span>Mã đơn hàng:</span><?= $resultOrder['order_id'] ?></li>
                                        <li><span>Trạng thái đơn:</span>
                                            <?php
                                            if ($resultOrder['status'] == 0) {
                                                echo '<span id="status" class="label label-warning">Chờ xác nhận</span>';
                                            } elseif ($resultOrder['status'] == 1) {
                                                echo '<span id="status" class="label label-primary">Xác nhận</span>';
                                            } elseif ($resultOrder['status'] == 2) {
                                                echo '<span id="status" class="label label-info">Đang giao</span>';
                                            } elseif ($resultOrder['status'] == 3) {
                                                echo '<span id="status" class="label label-success">Đã giao hàng</span>';
                                            } elseif ($resultOrder['status'] == 4) {
                                                echo '<span id="status" class="label label-danger">Bị hủy</span>';
                                            }
                                            ?></li>
                                        <li><span>Mã đơn hàng:</span><?= $resultOrder['order_id'] ?></li>
                                        <li><span>Sử dụng mã giảm giá :</span><?php if ($resultOrder['usecoupon'] == 0) {
                                                                                    echo 'KHÔNG';
                                                                                } else {
                                                                                    echo 'CÓ';
                                                                                } ?></li>
                                        <li><span>Họ tên:</span><?= $resultOrder['fullname'] ?></li>
                                        <li><span>Email:</span><?= $resultOrder['email'] ?></li>
                                        <li><span>Số điện thoại:</span><?= $resultOrder['phonenumber'] ?></li>
                                        <li><span>Địa chỉ:</span><?= $resultOrder['address'] ?></li>
                                        <li><span>Ghi chú:</span><?= $resultOrder['note'] ?></li>
                                        <li><span>Ngày đặt hàng:</span><?= date('H:i:s d/m/Y', strtotime($resultOrder['updated_at'])) ?></li>
                                        <li><span>Phương thức thanh toán:</span>
                                            <?php
                                            if ($resultOrder['orders_shipping'] == 0) {
                                                echo '<span id="status" class="label label-main">Internet Banking</span>';
                                            } elseif ($resultOrder['orders_shipping'] == 1) {
                                                echo '<span id="status" class="label label-primary">Thanh toán ATM</span>';
                                            } elseif ($resultOrder['orders_shipping'] == 2) {
                                                echo '<span id="status" class="label label-info">Thanh toán khi nhận hàng</span>';
                                            } elseif ($resultOrder['orders_shipping'] == 3) {
                                                echo '<span id="status" class="btn btn-main pull-right">Chuyển khoản</span>';
                                            }
                                            ?></li>
                                        <li><span>Tổng tiền:</span><?= number_format($resultOrder['total_money']) ?> VNĐ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p style="font-weight:bold;padding-bottom:20px"> Thông tin đơn hàng </p>

                        <div class="block" style="border:solid 1px #dedede">
                            <div class="product-list">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Tên</th>
                                            <th>Size</th>
                                            <th>Color</th>
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
                                                $thumbnailpr = fixUrl($thumbnailPr['thumbnail'], "../");
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
                        <div class="row" style="border:1px solid #dedede;margin-top:10px">
                            <div class="col-md-8">
                                <label>Tổng số lượng sản phẩm : </label>
                                <p><?= $resultOrder['totalnum'] ?></p>
                                <label>GIÁ CUỐI (bao gồm mã giảm giá) : </label>
                                <p><?= number_format($resultOrder['total_money']) ?> VNĐ</p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="float:right">
                                    <form id="changestatus" method="POST">
                                        <input type="text" value="<?= $resultOrder['id'] ?>" name="orderid" hidden>
                                        <input type="text" value="<?= $user['id'] ?>" name="userid" hidden>
                                        <p>Thay đổi trạng thái</p>
                                        <select require="" class="form-control" name="status" id="status">
                                            <?php
                                            if ($resultOrder['status'] == 0) {
                                                echo '
                                            <option value="1">Xác nhận đơn hàng</option>
                                            <option value="4">Hủy đơn hàng</option>
                                            ';
                                            } elseif ($resultOrder['status'] == 1) {
                                                echo '
                                            <option value="0">Chuyển về đang chờ</option>
                                            <option value="2">Đang giao hàng</option>
                                            <option value="3">Đã giao hàng</option>
                                            <option value="4">Hủy đơn hàng</option>
                                            ';
                                            } elseif ($resultOrder['status'] == 2) {
                                                echo '
                                            <option value="0">Chuyển về đang chờ</option>
                                            <option value="3">Đã giao hàng</option>
                                            <option value="4">Hủy đơn hàng</option>
                                            ';
                                            } elseif ($resultOrder['status'] == 3) {
                                                echo '
                                            <option value="0">Chuyển về đang chờ</option>
                                            <option value="2">Đang giao hàng</option>
                                            <option value="4">Hủy đơn hàng</option>
                                            ';
                                            } elseif ($resultOrder['status'] == 4) {
                                                echo '
                                            <option value="0">Chuyển về đang chờ</option>
                                            <option value="1">Xác nhận đơn hàng</option>
                                            ';
                                            }
                                            ?>
                                        </select>
                                        <button class="btn btn-main">Xác nhận</button>
                                    </form>
                                </div>
                            </div>
                            <label style="padding-left:10px;color:red">Lưu ý:</label>
                            <p style="padding-left:15px">Đơn hàng ở trạng thái đang chờ sẽ chỉ xác nhận và hủy</p>
                            <p style="padding-left:15px">Đơn hàng ở trạng thái xác nhận sẽ đầy đủ điều kiện</p>
                            <p style="padding-left:15px">Đơn hàng ở trạng thái đang giao sẽ đang chờ, đã giao và hủy</p>
                            <p style="padding-left:15px">Đơn hàng ở trạng thái đã giao sẽ chỉ đang chờ,đang giao và hủy</p>
                            <p style="padding-left:15px">Đơn hàng ở trạng thái hủy sẽ chỉ xác nhận và đang chờ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ban,unban User js -->
<script src="../../js/changerstatus.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>