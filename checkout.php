<script>
    $('#coupon').submit(function(e) {
        $.post(BASE_URL + API_PRODUCT, {
            'action': 'useCoupon',
            'coupon': $('input[name=coupon]').val()
        }, function(data) {
            alert(data)
            location.reload()
        })
    })
    $('#checkoutForm').submit(function(e) {
        $.post(BASE_URL + API_PRODUCT, {
            'action': 'checkOut',
            'userid': $('input[name=userid]').val(),
            'fullname': $('input[name=fullname]').val(),
            'email': $('input[name=email]').val(),
            'address': $('input[name=address]').val(),
            'phonenumber': $('input[name=phonenumber]').val(),
            'note': $('textarea[name=note]').val(),
            'order_shipping': $('select[name=order_shipping]').val()
        }, function(data) {
            var newdata = JSON.parse(data);
            if (newdata.status == 1) {
                location.href = 'confirmation.php?order_id=' + newdata.msg;
            } else {
                alert(newdata.status);
            }
        })
    })
    </script><?php
    $baseUrl = './';
    include_once $baseUrl . 'layouts/header.php';

    if ($user == null) {
        $user = [
            'id' => '',
            'fullname' => '',
            'email' => '',
            'address' => '',
            'phonenumber' => ''
        ];
    }
    ?>
    <?php
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $count = 0;

    foreach ($_SESSION['cart'] as $item) {
        $count += $item['num'];
    }
    if ($count < 1) {
        echo '<section class="page-404" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <h1><img src="https://bizweb.dktcdn.net/100/199/161/themes/523118/assets/empty_cart.png?1563360758413"></h1>
        <h2>KHÔNG CÓ SẢN PHẨM NÀO TRONG GIỎ HÀNG !</h2>
        <a href="index.php" class="btn btn-main"><i class="tf-ion-android-arrow-back"></i> MUA SẮM</a>
        <p class="copyright-text">Quay trở lại mua sắm nào</p>
        </div>
        </div>
        </div>
        </section>';
    } else {
        echo '

        <section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="content">
        <ol class="breadcrumb">
        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
        <li class="active">Thanh toán</li>
        </ol>
        </div>
        </div>
        </div>
        </div>
        </section>

        <div class="page-wrapper" style="padding-top:10px;margin-bottom:10px;margin-top:10px;padding-bottom:10px">
        <div class="checkout shopping">
        <div class="container">
        <div class="row">
        <div class="col-md-8">
        <div class="block billing-details">
        <h4 class="widget-title">Thông tin thanh toán</h4>
        <form class="checkout-form" id="checkoutForm" method="POST">
        <input type="text" value="' . $user['id'] . '" name="userid" hidden>
        <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" value="' . $user['fullname'] . '" require="true">
        </div>
        <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="' . $user['email'] . '" require="true">
        </div>
        <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="' . $user['address'] . '" require="true">
        </div>
        <div class="form-group">
        <div class="form-group">
        <label for="phonenumer">Phone Number</label>
        <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="' . $user['phonenumber'] . '" require="true">
        </div>
        </div>
        <div class="form-group">
        <p style="font-size:12px";>Ghi chú</p>
        <div class="form-group">
        <textarea class="form-control" name="note" id="note" rows="4" require="true"></textarea>
        </div>
        </div>
        <div class="form-group">
        <span for="order_shipping">PHƯƠNG THỨC THANH TOÁN</span>
        <select name="order_shipping" class="form-control" id="order_shipping" require="true">
        <option value="0">INTERNET BANKING</option>
        <option value="1">THANH TOÁN ATM</option>
        <option value="2">THANH TOÁN KHI NHẬN HÀNG</option>
        <option value="3">CHUYỂN KHOẢN</option>
        </select>
        </div>

        </div>
        <div class="block">
        <div class="checkout-product-details">
        <div class="payment">
        <div class="card-details">
        <button type="submit" value="Submit" class="btn btn-main mt-20">Xác nhận thanh toán</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        <a href="momo"><button class="btn btn-main mt-20">THANH TOÁN ONLINE</button></a>
        <div class="col-md-4">
        <div class="product-checkout-details">
        <div class="block">
        <h4 class="widget-title">Sản Phẩm</h4>';
        $totalAll = 0;
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $index = 0;
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['id'];
            $sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
            $resultGaleryProduct = executeResult($sql, true);
            if ($resultGaleryProduct == null) {
                $resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
            }
            echo '
            <div class="media product-card">
            <a class="pull-left" href="product-detail.php?id=' . $item['id'] . '">
            <img class="media-object" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="Image" />
            </a>
            <div class="media-body">
            <h4 class="media-heading"><a href="product-detail.php?id=' . $item['id'] . '">' . $item['title'] . '</a></h4>
            <p class="price">' . $item['num'] . ' x ' . number_format($item['price'] * ((100 - $item['discount']) / 100)) . ' đ</p>
            <span class="remove">MSP : ' . $item['product_code'] . '</span>
            </div>
            </div>
            ';
            $totalAll += $item['num'] * ($item['price'] * ((100 - $item['discount']) / 100));
        }
        echo '
        <div class="discount-code">
        <p>Bạn có mã giảm giá ? <a data-toggle="modal" data-target="#coupon-modal" href="#!"><button class="btn btn-main">NHẬP CODE</button></a></p>
        </div>
        <ul class="summary-prices">
        <li>
        <span>Tạm tính:</span>
        <span class="price">';
        echo number_format($totalAll);
        echo ' VNĐ</span>
        </li>
        <li>
        <span>Shipping:</span>
        <span>FREE SHIP</span>
        </li>';

        if (isset($_SESSION['totalmoney'])) {
            echo ' <li>
            <span>- % Mã khuyến mãi</span>
            </li>';
        }
        echo '
        </ul>
        <div class="summary-total">
        <span>Tổng tiền</span>
        <span>';
        if (isset($_SESSION['totalmoney'])) {
            echo  number_format($_SESSION['totalmoney']);
        } else {
            echo  number_format($totalAll);
        }
        echo ' VNĐ</span>
        </div>
        <hr>
        <span>THÔNG TIN CHUYỂN KHOẢN</span>
        <div class="verified-icon">
        <img src="images/shop/verified.png">
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body">
        <form id="coupon" method="POST">
        <div class="form-group">
        <input class="form-control" name="coupon" type="text" placeholder="Nhập mã giảm giá của bạn">
        </div>
        <button type="submit" class="btn btn-main">Xác nhận</button>
        </form>
        </div>
        </div>
        </div>
        </div>

        ';
    }
    ?>
    <script>
        $('#coupon').submit(function(e) {
            $.post(BASE_URL + API_PRODUCT, {
                'action': 'useCoupon',
                'coupon': $('input[name=coupon]').val()
            }, function(data) {
                alert(data)
                location.reload()
            })
        })
        $('#checkoutForm').submit(function(e) {
            $.post(BASE_URL + API_PRODUCT, {
                'action': 'checkOut',
                'userid': $('input[name=userid]').val(),
                'fullname': $('input[name=fullname]').val(),
                'email': $('input[name=email]').val(),
                'address': $('input[name=address]').val(),
                'phonenumber': $('input[name=phonenumber]').val(),
                'note': $('textarea[name=note]').val(),
                'order_shipping': $('select[name=order_shipping]').val()
            }, function(data) {
                var newdata = JSON.parse(data);
                if (newdata.status == 1) {
                    window.location.assign('confirmation.php?order_id=' + newdata.msg);
                } else {
                    alert(newdata.msg);
                }
            })
        })
    </script>
    <?php
    include_once $baseUrl . 'layouts/footer.php';
?>