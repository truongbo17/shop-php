<?php
$baseUrl = './';
include_once $baseUrl . 'layouts/header.php';
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
                        <li class="active">Giỏ hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="page-wrapper" style="padding-top:10px;margin-bottom:10px;margin-top:10px;padding-bottom:10px">
    <div class="cart shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="product-list">
                            <form method="post">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="">STT</th>
                                            <th class="">Sản Phẩm</th>
                                            <th class="">Size</th>
                                            <th class="">Color</th>
                                            <th class="">Số lượng</th>
                                            <th class="">Giá</th>
                                            <th class="">Tổng</th>
                                            <th class=""></th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $totalAll = 0;
    $index = 0;
    foreach ($_SESSION['cart'] as $item) {
        $product_id = $item['id'];
        $sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
        $resultGaleryProduct = executeResult($sql, true);
        if ($resultGaleryProduct == null) {
            $resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
        }
        echo '
                                            <tr class="">
                                            
                                            <td class="">' . (++$index) . '</td>
                                            <td class="">
                                                <div class="product-info">
                                                    <img width="80" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="" />
                                                    <a href="';
        $baseUrl;
        echo 'product-detail.php?id=' . $item['id'] . '">' . $item['title'] . ' ( ' . $item['product_code'] . ' )</a>
                                                </div>
                                            </td>
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
                                            <td class="">
                                                <div class="product-quantity">
                                                    <div class="product-quantity-slider">
                                                        <div style="display:flex;">
                                                        <button class="btn btn-light" style="border:solid 1px grey" onclick="addmoreCart(' . $item['id'] . ',-1)">-</button>
                                                        <input type="number" id="num_' . $item['id'] . '" class="form-control" name="num" step="1" value="' . $item['num'] . '" style="max-width:60px" onchange="checkNum(' . $item['id'] . ',this.value)">
                                                      <button class="btn btn-light" style="border:solid 1px grey" onclick="addmoreCart(' . $item['id'] . ',1)">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">
                                                <p>' . number_format($item['price'] * ((100 - $item['discount']) / 100)) . ' VNĐ</p>
                                            </td>
                                            <td class="">
                                                <p>' . number_format($item['num'] * ($item['price'] * ((100 - $item['discount']) / 100))) . ' VNĐ</p>
                                            </td>
                                            <td class=""><button class="btn btn-danger" onclick="updateCart(' . $item['id'] . ',0)">Xóa</button></td>
                                        </tr>
                                            ';
        $totalAll += $item['num'] * ($item['price'] * ((100 - $item['discount']) / 100));
    }

    echo '</tbody>
                                </table>
                                <p class="btn btn-main pull-left">Total : ' . number_format($totalAll) . ' VNĐ</p>
                                <a href="checkout.php" class="btn btn-main pull-right">Checkout</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    ';
}
?>
<script>
    function addmoreCart(id, delta) {
        num = parseInt($('#num_' + id).val())
        num += delta
        console.log(delta)
        if (num < 1) num = 1
        $('#num_' + id).val(num)

        updateCart(id, num)
    }

    function checkNum(id, num) {
        if (num < 1) {
            $('#num_' + id).val(Math.abs($('#num_' + id).val()))
            updateCart(id, $('#num_' + id).val())
        }
    }

    function updateCart(productId, num) {

        $.post(BASE_URL + API_PRODUCT, {
            'action': 'updateCart',
            'id': productId,
            'num': num
        }, function(data) {
            // alert(data)
            location.reload()
        })
    }
</script>
<?php
include_once $baseUrl . 'layouts/footer.php';
?>