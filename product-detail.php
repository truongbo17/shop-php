<?php
$baseUrl = './';
include_once $baseUrl . 'layouts/header.php';

if (isset($_GET['id'])) {

    //get id từ form
    $id = getGET('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);

    // list category product
    $sql = "SELECT category.name as catename,product_category.* 
    FROM category RIGHT JOIN product_category 
    ON category.id = product_category.category_id
    WHERE product_id = $id";
    $list_cate = executeResult($sql);

    //size
    $sql = "SELECT * FROM size
    WHERE product_id = $id";
    $list_size = executeResult($sql);

    //color
    $sql = "SELECT * FROM color
    WHERE product_id = $id";
    $list_color = executeResult($sql);

    //gallery
    $sql = "SELECT * FROM galery_product
    WHERE product_id = $id";
    $list_galery = executeResult($sql);

    //comment
    $sql = "SELECT comment.*,user.fullname as fullname,user.thumbnail as thumbnail 
    FROM user RIGHT JOIN comment
    ON comment.user_id = user.id
    WHERE product_id = $id";
    $list_comment = executeResult($sql);
    $sql = "SELECT COUNT(comment) as totalcmt FROM comment WHERE product_id = $id";
    $totalcmt = executeResult($sql, true);

    //infomation product
    $sql = "SELECT product.*,product_category.category_id
    FROM product  
    LEFT JOIN product_category 
    ON product.id = product_category.product_id WHERE product.id = $id";
    $resultProduct = executeResult($sql, true);
    if ($resultProduct == '' || $resultProduct == null) {
        echo "<hr>";
        echo "<div style='text-align:center'>";
        echo "<p>Không có thông tin về sản phẩm này !</p>";
        echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
        echo "</div>";
        die;
    }
} else {
    echo "<hr>";
    echo "<div style='text-align:center'>";
    echo "<p>Vui lòng chọn sản phẩm để xem thông tin !</p>";
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
                        <li class="active">Chi tiết sản phẩm - <?= $resultProduct['product_code'] ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- product -->
<section class="single-product" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <hr>
        <div class="row mt-20">
            <div class="col-md-5">
                <div class="single-product-slider">
                    <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                        <div class='carousel-outer'>
                            <!-- me art lab slider -->
                            <div class='carousel-inner '>
                                <?php
                                $index = 0;
                                foreach ($list_galery as $item) {
                                    if ($index == 0) {
                                        echo '<div class="item active">';
                                    } else {
                                        echo '<div class="item">';
                                    }
                                    $index++;
                                    echo '
                                            <img src="' . substr($item['thumbnail'], 3) . '" alt="" data-zoom-image="' . substr($item['thumbnail'], 3) . '" />
                                            </div>
                                            ';
                                }
                                ?>
                            </div>

                            <!-- sag sol -->
                            <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                <i class="tf-ion-ios-arrow-left"></i>
                            </a>
                            <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                <i class="tf-ion-ios-arrow-right"></i>
                            </a>
                        </div>

                        <!-- thumb -->
                        <ol class='carousel-indicators mCustomScrollbar meartlab'>
                            <?php
                            $index = 0;
                            foreach ($list_galery as $item) {
                                echo '
                                    <li data-target="#carousel-custom" data-slide-to="' . ($index++) . '"';
                                if ($index == 0) {
                                    echo 'class="active"';
                                }
                                echo '>
                                        <img src="' . substr($item['thumbnail'], 3) . '" alt="" />
                                    </li>
                                    ';
                            }
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-details">
                    <h2><?= $resultProduct['title'] ?></h2>
                    <div class="product-quantity">
                        <?php
                        if ($resultProduct['discount'] > 0) {
                            echo '<del style="color:red;font-size:12px">' . number_format($resultProduct['price']) . ' VNĐ</del>' . '&nbsp;<p class="product-price">'
                                . number_format($resultProduct['price'] * ((100 - $resultProduct['discount']) / 100)) . ' VNĐ</p>&nbsp;&nbsp;<button class="btn btn-main">Giảm ' . $resultProduct['discount'] . ' %</button>';
                        } else {
                            echo '<p class="product-price">' . number_format($resultProduct['price']) . ' VNĐ</p>';
                        }
                        ?>
                    </div>
                    <div class="product-quantity">
                        <span>Mã Sản Phẩm :</span>
                        <ul>
                            <li><?= $resultProduct['product_code'] ?></li>
                        </ul>
                    </div>
                    <div class="product-quantity">
                        <span>Lượt xem :</span>
                        <ul>
                            <li><?= $resultProduct['view'] ?> <i class="tf-ion-eye"></i></li>
                        </ul>
                    </div>
                    <div class="product-quantity">
                        <span>Trạng thái :</span>
                        <ul>
                            <li>
                                <?php
                                if ((($resultProduct['quantity'] - $resultProduct['sold'])) > 0) {
                                    echo 'Còn Hàng';
                                } else {
                                    echo 'Hết Hàng';
                                }
                                ?></li>
                        </ul>
                    </div>
                    <br>
                    <div class="color-swatches">
                        <span>Màu sắc:</span>
                        <ul>
                            <?php
                            foreach ($list_color as $item) {
                                if ($item['colorname'] == 1) {
                                    echo '<input class="" type="radio" id="color" name="color" value="1">
                                          <li>
                                            <a href="#!" class="swatch" style="background-color:blue;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 2) {
                                    echo '<input class="" type="radio" id="color" name="color" value="2">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:green;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 3) {
                                    echo '<input class="" type="radio" id="color" name="color" value="3">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:red;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 4) {
                                    echo '<input class="" type="radio" id="color" name="color" value="4">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:purple;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 5) {
                                    echo '<input class="" type="radio" id="color" name="color" value="5">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:yellow;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 6) {
                                    echo '<input class="" type="radio" id="color" name="color" value="6">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:pink;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 7) {
                                    echo '<input class="" type="radio" id="color" name="color" value="7">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:brown;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 8) {
                                    echo '<input class="" type="radio" id="color" name="color" value="8">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:black;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 9) {
                                    echo '<input class="" type="radio" id="color" name="color" value="9">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:white;border: 1px solid black;"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 10) {
                                    echo '<input class="" type="radio" id="color" name="color" value="10">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:grey;border: 1px solid black"></a>
                                          </li>';
                                }
                                if ($item['colorname'] == 11) {
                                    echo '<input class="" type="radio" id="color" name="color" value="11">
                                    <li>
                                            <a href="#!" class="swatch" style="background-color:orange;border: 1px solid black"></a>
                                          </li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="product-size">
                        <span>Size</span>
                        <select required="required" class="form-control" name="size">
                            <option>Chọn size</option>
                            <?php
                            foreach ($list_size as $item) {
                                if ($item['sizename'] == 1) {
                                    echo '<option value="1">X</option>';
                                }
                                if ($item['sizename'] == 2) {
                                    echo '<option value="2">M</option>';
                                }
                                if ($item['sizename'] == 3) {
                                    echo '<option value="3">L</option>';
                                }
                                if ($item['sizename'] == 4) {
                                    echo '<option value="4">XL</option>';
                                }
                                if ($item['sizename'] == 5) {
                                    echo '<option value="5">XXL</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="product-quantity">
                        <span>Số lượng :</span>
                        <div class="product-quantity-slider">
                            <div style="display:flex;">
                                <?php
                                if ((($resultProduct['quantity'] - $resultProduct['sold'])) > 0) {
                                    echo '<button class="btn btn-light" style="border:solid 1px grey" onclick="addmoreCart(-1)">-</button>
                                    <input type="number" class="form-control" name="num" step="1" value="1" style="max-width:80px" onchange="checkNum(this.value)">
                                    <button class="btn btn-light" style="border:solid 1px grey" onclick="addmoreCart(1)">+</button>';
                                } else {
                                    echo 'Hết Hàng';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="product-category">
                        <span>Danh mục :</span>
                        <ul>
                            <?php
                            foreach ($list_cate as $item) {
                                echo '<li>' . $item['catename'] . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <button class="btn btn-main mt-20" onclick="addCart(<?= $resultProduct['id'] ?>,$('[name=num]').val())"><i class="tf-ion-android-cart"></i>
                        THÊM VÀO GIỎ HÀNG
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <div class="tabCommon mt-20">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Chi tiết</a></li>
                        <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false"><?= $totalcmt['totalcmt'] ?> Đánh giá </a></li>
                    </ul>
                    <div class="tab-content patternbg">
                        <div id="details" class="tab-pane fade active in">
                            <h4>Chi tiết sản phẩm</h4>
                            <p><?= html_entity_decode($resultProduct['description']) ?></p>
                        </div>
                        <div id="reviews" class="tab-pane fade">
                            <div class="post-comments">
                                <ul class="media-list comments-list m-bot-50 clearlist">
                                    <!-- Comment Item start-->
                                    <?php
                                    foreach ($list_comment as $item) {
                                        echo '
                                            
                                            <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="' . substr($item['thumbnail'], 0) . '" alt="" width="50" height="50" />
                                            </a>
    
                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">' . $item['fullname'] . '</a>
    
                                                    </h4>
                                                    <time datetime="2013-04-06T13:53">' . $item['created_at'] . '</time>
                                                    <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>
    
                                                <p>
                                                ' . $item['comment'] . '
                                                </p>
                                            </div>
    
                                            </li>
                                            
                                            ';
                                    }
                                    ?>
                                    <!-- End Comment Item -->
                                </ul>
                            </div>
                            <div class="post-comments-form">
                                <h3 class="post-sub-heading">Đánh giá sản phẩm này</h3>
                                <form method="post" action="#" id="form" role="form">

                                    <div class="row">

                                        <div class="col-md-12 form-group">
                                            <!-- Name -->
                                            <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required="">
                                        </div>
                                        <!-- Comment -->
                                        <div class="form-group col-md-12">
                                            <textarea name="text" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                                        </div> <!-- Send Button -->
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-small btn-main ">
                                                ĐÁNH GIÁ
                                            </button>
                                        </div>


                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="title text-center">
                <h2>Sản phẩm tương tự</h2>
            </div>
        </div>
        <!-- category -->
        <div class="row">
            <?php
            $sql = "SELECT * FROM product order by view desc";
            $viewProduct = executeResult($sql);
            shuffle($viewProduct);
            //lặp 4 lần ngẫu nhiên
            //substr xóa 3 kí tự ../ để tránh lỗi ảnh
            for ($i = 0; $i < 4; $i++) {
                $product_id = $viewProduct[$i]['id'];
                $sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
                $resultGaleryProduct = executeResult($sql, true);
                if ($resultGaleryProduct == null) {
                    $resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
                }

                echo '
				<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">';
                if ($viewProduct[$i]['discount'] > 0) {
                    echo '<span class="bage">Sale ' . $viewProduct[$i]['discount'] . ' %</span>';
                }
                if (($viewProduct[$i]['quantity'] - $viewProduct[$i]['sold']) == 0) {
                    echo '<span class="bage1">HẾT HÀNG</span>';
                }
                echo '<img class="img-responsive" src="' . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="product-img" loading="lazy" style="height: 350px;width:100%;"/>
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal" onclick="viewProduct(' . $viewProduct[$i]['id'] . ')">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
									<a><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="product-detail.php?id=' . ($viewProduct[$i]['id']) . '"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="product-content">
						<h4><a href="product-detail.php?id=' . ($viewProduct[$i]['id']) . '">' . $viewProduct[$i]['title'] . '</a></h4>
						<p class="price">';
                if ($viewProduct[$i]['discount'] > 0) {
                    echo '<del style="color:red;font-size:12px">' . number_format($viewProduct[$i]['price']) . ' VNĐ</del>' . '&nbsp;'
                        . number_format($viewProduct[$i]['price'] * ((100 - $viewProduct[$i]['discount']) / 100)) . ' VNĐ';
                } else {
                    echo number_format($viewProduct[$i]['price']) . ' VNĐ';
                }
                echo '</p>
					</div>
				</div>
			</div>';
            }
            ?>
        </div>
        <!-- end category -->



        <!-- Modal -->
        <div id="resetAll">
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
                                            <a href="" id="viewPrLink" class="btn btn-main">THÊM GIỎ HÀNG</a>
                                        </div>
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
</section>
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

    function addmoreCart(delta) {
        num = parseInt($('[name=num]').val())
        num += delta
        console.log(delta)
        if (num < 1) num = 1
        $('[name=num]').val(num)
    }

    function checkNum(num) {
        if (num < 1) {
            $('[name=num]').val(Math.abs($('[name=num]').val()))
        }
    }

    function addCart(productId, num) {

        $.post(BASE_URL + API_PRODUCT, {
            'action': 'addToCart',
            'id': productId,
            'num': num,
            'color': $('input[name=color]:checked').val(),
            'size': $('select[name=size]').val()
        }, function(data) {
            alert(data);
            location.reload();
        })
    }
</script>
<?php
include_once $baseUrl . 'layouts/footer.php';
?>