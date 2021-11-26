<?php
session_start();

require_once $baseUrl . 'database/dbhelper.php';
require_once $baseUrl . 'utils/utility.php';

$user = getUserToken();
//category
$sql = "SELECT * FROM category";
$resultCate = executeResult($sql);

$resultCategory = data_tree($resultCate);

$sql = "SELECT * FROM category_post";
$resultCatePost = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
      ================================================== -->
      <meta charset="utf-8">
      <title>TRUONGBO | MẶC LÀ ẤM</title>

    <!-- Mobile Specific Metas
      ================================================== -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="QUẦN ÁO ĐẸP NAM NỮ BỐN MÙA">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
      <meta name="author" content="TRUONGBO">
      <meta name="generator" content="TRUONGBO - MẶC LÀ ẤM,CHUYÊN QUẦN ÁO PHỤ KIỆN">

      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="<?= $baseUrl ?>images/favicon.png" />

      <!-- Themefisher Icon font -->
      <link rel="stylesheet" href="<?= $baseUrl ?>plugins/themefisher-font/style.css">
      <!-- bootstrap.min css -->
      <link rel="stylesheet" href="<?= $baseUrl ?>plugins/bootstrap/css/bootstrap.min.css">

      <!-- Animate css -->
      <link rel="stylesheet" href="<?= $baseUrl ?>plugins/animate/animate.css">
      <!-- Slick Carousel -->
      <link rel="stylesheet" href="<?= $baseUrl ?>plugins/slick/slick.css">
      <link rel="stylesheet" href="<?= $baseUrl ?>plugins/slick/slick-theme.css">

      <!-- Main Stylesheet -->
      <link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
      

      <!-- jquery add new -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>

  <body id="body">
    <!-- <script src="js/new.min.js"></script> -->
    <!-- Start Top Header Bar -->
    <section class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="contact-number">
                        <i class="tf-ion-ios-telephone"></i>
                        <span>0368869690</span>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Site Logo -->
                    <div class="logo text-center">
                        <a href="<?= $baseUrl ?>index.php">
                            <!-- replace logo here -->
                            <!-- replace logo here -->
                            <svg width="255px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                        <text id="AVIATO">
                                            <tspan x="58.94" y="325">TRUONGBO</tspan>
                                        </text>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <?php
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }
                    $count = 0;

                    foreach ($_SESSION['cart'] as $item) {
                        $count += $item['num'];
                    }

                    ?>
                    <!-- Cart -->
                    <ul class="top-menu text-right list-inline">
                        <!-- User -->
                        <li class="dropdown cart-nav dropdown-slide" style="padding-bottom: 8px;">
                            <?php
                            if ($user == null) {
                                echo '<a href="' . $baseUrl . 'login.php" class="btn btn-success">Đăng nhập</a>';
                            } else {
                                echo '<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img src="' . $baseUrl . $user['thumbnail'] . '" style="width:10%;border-radius:50%;"></a>
                                <div class="dropdown-menu cart-dropdown">
                                <div class="cart-summary">
                                <span>' . $user['fullname'] . '</span>
                                </div>
                                <ul class="text-center cart-buttons">
                                <li><a href="' . $baseUrl . 'user/index.php" class="btn btn-small">Trang cá nhân</a></li>
                                <li><a href="' . $baseUrl . 'logout.php" class="btn btn-small btn-solid-border">Đăng xuất</a></li>
                                </ul>
                                </div>';
                            }
                            ?>
                        </li>
                        <li class="dropdown cart-nav dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-cart"></i>Cart <span style="position: relative;bottom:10px;border-radius: 3px;color :white;background-color:red;padding-left:5px;padding-right:5px;"><?= $count ?></span></a>
                            <div class="dropdown-menu cart-dropdown">
                                <!-- Cart Item -->
                                <?php
                                $totalAll = 0;
                                foreach ($_SESSION['cart'] as $item) {
                                    $product_id = $item['id'];
                                    $sql = "SELECT * FROM galery_product WHERE product_id = $product_id";
                                    $resultGaleryProduct = executeResult($sql, true);
                                    if ($resultGaleryProduct == null) {
                                        $resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
                                    }
                                    echo '
                                    <div class="media">
                                    <a class="pull-left" href="';
                                    $baseUrl;
                                    echo 'product-detail.php?id=' . $item['id'] . '">
                                    <img class="media-object" src="' . $baseUrl . substr($resultGaleryProduct['thumbnail'], 3) . '" alt="image" />
                                    </a>
                                    <div class="media-body">
                                    <h4 class="media-heading"><a href="';
                                    $baseUrl;
                                    echo $baseUrl . 'product-detail.php?id=' . $item['id'] . '">' . $item['title'] . '</a></h4>
                                    <div class="cart-price">
                                    <span>' . $item['num'] . ' x</span>
                                    <span>' . number_format($item['price'] * ((100 - $item['discount']) / 100)) . ' VNĐ</span>
                                    </div>
                                    <h5><strong>' . number_format($item['num'] * ($item['price'] * ((100 - $item['discount']) / 100))) . ' VNĐ</strong></h5>
                                    </div>
                                    <a href="#!" class="remove"><i class="tf-ion-close"></i></a>
                                    </div>
                                    ';
                                    $totalAll += $item['num'] * ($item['price'] * ((100 - $item['discount']) / 100));
                                }
                                ?>
                                <!-- / Cart Item -->

                                <div class="cart-summary">
                                    <span>Tổng tiền</span>
                                    <span class="total-price">
                                        <?php if ($totalAll > 0) {
                                            echo number_format($totalAll) . ' VNĐ</span>';
                                        } else {
                                            echo 'Không có sản phẩm trong giỏ hàng</span>';
                                        } ?>
                                    </div>
                                    <ul class="text-center cart-buttons">
                                        <li><a href="<?= $baseUrl ?>cart.php" class="btn btn-small">Giỏ hàng</a></li>
                                        <li><a href="<?= $baseUrl ?>checkout.php" class="btn btn-small btn-solid-border">Thanh toán</a></li>
                                    </ul>
                                </div>

                            </li><!-- / Cart -->

                            <!-- Search -->
                            <li class="dropdown search dropdown-slide">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-ios-search-strong"></i> Search</a>
                                <ul class="dropdown-menu search-dropdown">
                                    <li>
                                        <div>
                                            <form method="GET" action="search.php?text=timkiem">
                                                <input type="search" name="search" class="form-control" placeholder="Search..." style="display:inline-block;width:80%">
                                                <button class="form-control tf-ion-search
                                                s" type="submit" style="display:inline-block;width:18%">
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li><!-- / Search -->
                    </div>
                </div>
            </div>
        </section><!-- End Top Header Bar -->
        <!-- Main Menu Section -->
        <section class="menu">
            <nav class="navbar navigation">
                <div class="container">
                    <div class="navbar-header">
                        <h2 class="menu-title">Main Menu</h2>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div><!-- / .navbar-header -->

                    <!-- Navbar Links -->
                    <div id="navbar" class="navbar-collapse collapse text-center">
                        <ul class="nav navbar-nav">

                            <!-- Home -->
                            <li class="dropdown ">
                                <a href="<?= $baseUrl ?>index.php">Home</a>
                            </li><!-- / Home -->


                            <!-- Shop -->
                            <?php
                            foreach ($resultCategory as $item) {
                                if ($item['parent_id'] == 0) {
                                    echo '<li class="dropdown dropdown-slide">
                                    <a href="' . $baseUrl . 'category.php?id=' . $item['id'] . '" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">
                                    ' . $item['name'] . ' <span class="tf-ion-ios-arrow-down"></span></a>';
                                    echo '<ul class="dropdown-menu">';
                                    foreach ($resultCategory as $value) {
                                        if ($value['parent_id'] == $item['id']) {
                                            echo '
                                            <li><a href="' . $baseUrl . 'category.php?id=' . $value['id'] . '">' . $value['name'] . '</a></li>';
                                        }
                                    }
                                    echo '
                                    </ul>
                                    </li>';
                                }
                            }
                            ?>
                            <!-- / shop -->

                            <!-- blog -->
                            <li class="dropdown dropdown-slide">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Bài viết<span class="tf-ion-ios-arrow-down"></span></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    foreach ($resultCatePost as $value) {
                                        echo '<li><a href="' . $baseUrl . 'category-post.php?id=' . $value['id'] . '">' . $value['name'] . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li><!-- / Blog -->

                            <!-- feedback -->
                            <li class="dropdown ">
                                <a href="<?= $baseUrl ?>feedback.php">FEEDBACK</a>
                            </li><!-- / feedback -->

                            <!-- about -->
                            <li class="dropdown ">
                                <a href="<?= $baseUrl ?>about.php">ABOUT</a>
                            </li><!-- / about -->

                            <!-- check -->
                            <li class="dropdown ">
                                <a href="<?= $baseUrl ?>check-order.php">CHECK ORDER</a>
                            </li><!-- / check -->

                            <li class="dropdown " style="background-color: red;">
                                <a href="<?= $baseUrl ?>comming-son.php">SẮP RA MẮT</a>
                            </li><!-- / about -->

                        </ul><!-- / .nav .navbar-nav -->

                    </div>
                    <!--/.navbar-collapse -->
                </div><!-- / .container -->
            </nav>
        </section>