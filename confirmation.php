<?php
$baseUrl = './';
include_once $baseUrl . 'layouts/header.php';

$order_id = '';

$order_id = getGET('order_id');
$order_id = preg_replace("/[^0-9]/", "", $order_id);
$sql = "SELECT * FROM `order` WHERE order_id = $order_id";
$checkOrder=executeResult($sql,true);
?>
<?php
if ($order_id > 0 && $checkOrder != null) {
    echo '<section class="page-wrapper success-msg" style="padding-top:10px;margin-bottom:10px;margin-top:10px;padding-bottom:10px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <i class="tf-ion-android-checkmark-circle"></i>
                    <h2 class="text-center">Cảm ơn bạn đã đặt hàng tại website của chúng tôi ! </h2>
                    <p>' . $order_id . ' là mã đơn hàng của bạn , bạn có thể kiểm tra trạng thái đơn hàng <a href="http://localhost:81/shop/check-order.php" class="btn btn-main">TẠI ĐÂY</a></p>
                    <hr>
                    <a href="index.php" class="btn btn-main mt-20">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</section>';
} else {
    echo '<section class="page-404" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="index.html">
                </a>
                <h1><img src="https://bizweb.dktcdn.net/100/199/161/themes/523118/assets/empty_cart.png?1563360758413"></h1>
                <h2>KHÔNG CÓ SẢN PHẨM NÀO TRONG GIỎ HÀNG !</h2>
                <a href="index.php" class="btn btn-main"><i class="tf-ion-android-arrow-back"></i> MUA SẮM</a>
                <p class="copyright-text">Quay trở lại mua sắm nào</p>
            </div>
        </div>
    </div>
</section>';
}
?>
<?php
include_once $baseUrl . 'layouts/footer.php';
?>