<?php
$baseUrl = './';
include_once $baseUrl . 'layouts/header.php';

if (isset($_GET['search'])) {
    //get id từ form
    $search = getGET('search');
    $search = addslashes($search);
    $sql = "SELECT * FROM product WHERE title LIKE '%$search%'";
    $searchPr = executeResult($sql);
    if ($searchPr == '' || $searchPr == null) {
        echo "<hr>";
        echo "<div style='text-align:center'>";
        echo "<p>Không có kết quả về tìm kiếm này !</p>";
        echo '<div class="container" style="margin-top:20px">
        <p>Thử tìm kiếm sản phẩm khác :</p>
        <form method="GET" action="search.php?text=timkiem">
        <div class="form-group">
            <input type="search" name="search" class="form-control" placeholder="Search..." style="display:inline-block;width:80%">
        <button class="form-control tf-ion-search
        s" type="submit" style="display:inline-block;width:18%">
        </button>
        </div>
        </form>
        </div>';
        echo "<a href='index.php' class='btn btn-default' style='margin-top:30px'>Trang chủ</a>";
        echo "</div>";
        die;
    }
} else {
    echo "<hr>";
    echo "<div style='text-align:center'>";
    echo "<p>Vui lòng nhập thông tin để tìm kiếm !</p>";
    echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
    echo "</div>";
    die;
}
?>
<section id="menu" class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <ol class="breadcrumb">
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">Kết quả tìm kiếm cho : <?=$search?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <h4 class="widget-title">Sắp xếp theo</h4>
                    <form method="post" action="#">
                        <select class="form-control">
                            <option>Giá thấp đến cao</option>
                            <option>Giá cao đến thấp</option>
                            <option>Sản phẩm mới</option>
                            <option>Sản phẩm cũ</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php
                    foreach ($searchPr as $item) {
                        $prId = $item['id'];
                        $sql = "SELECT * FROM product WHERE id = $prId";
                        $productResult = executeResult($sql, true);
                        $sql = "SELECT * FROM galery_product WHERE product_id = $prId";
                        $resultGaleryProduct = executeResult($sql, true);
                        if ($resultGaleryProduct == null) {
                            $resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
                        }

                        echo '
                        <div class="col-md-4">
                        <div class="product-item">
                        <div class="product-thumb">';
                        if ($productResult['discount'] > 0) {
                            echo '<span class="bage">Sale ' . $productResult['discount'] . ' %</span>';
                        }
                        if (($productResult['quantity'] - $productResult['sold']) == 0) {
                            echo '<span class="bage1">HẾT HÀNG</span>';
                        }
                        echo '<img class="img-responsive" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="product-img" loading="lazy" style="height: 350px;width:100%;"/>
                        <div class="preview-meta">
                        <ul>
                        <li>
                        <span data-toggle="modal" data-target="#product-modal" onclick="viewProduct(' . $productResult['id'] . ')">
                        <i class="tf-ion-ios-search-strong"></i>
                        </span>
                        </li>
                        <li>
                        <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                        </li>
                        <li>
                        <a href="product-detail.php?id=' . ($productResult['id']) . '"><i class="tf-ion-android-cart"></i></a>
                        </li>
                        </ul>
                        </div>
                        </div>
                        <div class="product-content">
                        <h4><a href="product-detail.php?id=' . ($productResult['id']) . '">' . $productResult['title'] . '</a></h4>
                        <p class="price">';
                        if ($productResult['discount'] > 0) {
                            echo '<del style="color:red;font-size:12px">' . number_format($productResult['price']) . ' VNĐ</del>' . '&nbsp;'
                            . number_format($productResult['price'] * ((100 - $productResult['discount']) / 100)) . ' VNĐ';
                        } else {
                            echo number_format($productResult['price']) . ' VNĐ';
                        }
                        echo '</p>
                        </div>
                        </div>
                        </div>';
                    }
                    ?>

                    <!-- Modal -->
                    <div id="">
                        <div class="modal product-modal fade" id="product-modal">
                            <button onclick="resetPr()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tf-ion-close"></i>
                            </button>
                            <div class="modal-dialog " role="document" id="resetPr">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-6 col-xs-12">
                                                <div class="modal-image" id="appendPrimg">

                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="product-short-details">
                                                    <h2 class="product-title" id="appendPrtitle"></h2>
                                                    <p class="product-price" id="appendPrprice"></p>
                                                    <p class="product-short-description" id="appendPrdescription">

                                                    </p>
                                                    <a href="cart.html" class="btn btn-main">THÊM GIỎ HÀNG</a>
                                                    <a href="" id="viewPrLink" class="btn btn-transparent">Chi tiết sản phẩm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->

                </div>
            </div>

        </div>
    </div>
</section>
<script>
    function viewProduct(id) {
        $.post(BASE_URL + API_PRODUCT, {
            'action': 'view_product',
            'id': id
        }, function(data) {
            newdata = JSON.parse(data)
            var discount = newdata['discount'];
            var price = newdata['price'];
            var viewPrLink = newdata['id'];
            var newdis;
            if (discount > 0) {
                newdis = '<label class="btn btn-main"> SALE ' + discount + ' %</label>';
                newprice = '<del style="color:red;font-size:12px">' + price + ' VND</del>' + '&nbsp;' + price * ((100 - discount) / 100);
            } else {
                newdis = '';
                newprice = price;
            }
            var thumbnail = newdata['thumbnail'].substr(3);

            $('#appendPrimg').append(newdis + '<img class="img-responsive" src="' + thumbnail + '" alt="product-img" loading="lazy" />');
            $('#appendPrtitle').append(newdata['title'] + ' MSP : ' + newdata['product_code']);
            $('#appendPrprice').append(newprice + 'VNĐ');
            $('#viewPrLink').attr('href', 'product-detail.php?id=' + viewPrLink);
            $('#appendPrdescription').append('Bạn ưng sản phẩm này ? Mua ngay !!!');
        });
    }

    function resetPr() {
        $('#resetPr').empty();
        $('#resetPr').append(`<div class="modal-content">
          <div class="modal-body">
          <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="modal-image" id="appendPrimg">

          </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="product-short-details">
          <h2 class="product-title" id="appendPrtitle"></h2>
          <p class="product-price" id="appendPrprice"></p>
          <p class="product-short-description" id="appendPrdescription">

          </p>
          <a href="#" class="btn btn-main">Add To Cart</a>
          <a href="#" class="btn btn-transparent">View Product Details</a>
          </div>
          </div>
          </div>
          </div>
          </div>`);
    }
</script>
<?php
include_once $baseUrl . 'layouts/footer.php';
?>