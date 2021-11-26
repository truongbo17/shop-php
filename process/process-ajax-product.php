<?php
session_start();
require_once '../database/dbhelper.php';
require_once '../utils/utility.php';

$action = getPOST('action');

switch ($action) {

    case 'addCategory':
        addCategory();
        break;

    case 'showhideCategory':
        showhideCategory();
        break;

    case 'editProduct':
        editProduct();
        break;

    case 'deletedCmt':
        deletedCmt();
        break;

    case 'deleteCate':
        deleteCate();
        break;

    case 'addProduct':
        addProduct();
        break;

    case 'addCoupon':
        addCoupon();
        break;

    case 'deleteCoupon':
        deleteCoupon();
        break;

    case 'deleteAllCmt':
        deleteAllCmt();
        break;

    case 'statusFeedback':
        statusFeedback();
        break;

    case 'addCategoryPost':
        addCategoryPost();
        break;

    case 'deleteCategoryPost':
        deleteCategoryPost();
        break;

    case 'addPost':
        addPost();
        break;

    case 'deletePost':
        deletePost();
        break;

    case 'changeStutusOrder':
        changeStutusOrder();
        break;

    case 'checkInventory':
        checkInventory();
        break;

    case 'view_product':
        view_product();
        break;

    case 'addToCart':
        addToCart();
        break;

    case 'updateCart':
        updateCart();
        break;

    case 'useCoupon':
        useCoupon();
        break;

    case 'checkOut':
        checkOut();
        break;

    case 'checkOrder':
        checkOrder();
        break;
}

//checkOrder
function checkOrder()
{
    $order_id = getPOST('order_id');
    $order_id = preg_replace("/[^0-9]/", "", $order_id);

    $sql = "SELECT * FROM `order` WHERE order_id = $order_id";
    $checkOrder = executeResult($sql,true);
    if($checkOrder != null){
        if($checkOrder['status'] == 0){
            $status = "Chờ xác nhận";
        }elseif($checkOrder['status'] == 1){
            $status = "Đã xác nhận";
        }elseif($checkOrder['status'] == 2){
            $status = "Đang giao";
        }elseif($checkOrder['status'] == 3){
            $status = "Đã giao";
        }elseif($checkOrder['status'] == 4){
            $status = "Đã bị hủy";
        }
        $res = [
            "status" => 1,
            "msg" => "ĐƠn hàng $order_id : $status"
        ];
        echo json_encode($res);
    }else{
        $res = [
            "status" => 0,
            "msg" => "Không có đơn hàng này trong hệ thống !"
        ];
        echo json_encode($res);
    }
}

//checkout
function checkOut()
{
    $userid = getPOST('userid');
    $userid = preg_replace("/[^0-9]/", "", $userid);

    $fullname = getPOST('fullname');
    $email = getPOST('email');
    $address = getPOST('address');
    $phonenumber = getPOST('phonenumber');
    $note = getPOST('note');
    $order_shipping = getPOST('order_shipping');

    $fullname = fixAllInput($fullname);
    $email = fixAllInput($email);
    $address = fixAllInput($address);
    $phonenumber = fixAllInput($phonenumber);
    $note = fixAllInput($note);
    $order_shipping = fixAllInput($order_shipping);
    if ($fullname != '' && $email != '' && $address != '' && $phonenumber != '' && $note != '' && $order_shipping != '') {
        if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
            return;
        }

        $order_date = date('Y-m-d H:i:s');
        $order_id = rand(100000, 999999);

        $total_money = 0;
        if (isset($_SESSION['totalmoney'])) {
            $total_money = $_SESSION['totalmoney'];
            $usecoupon = 1;
        } else {
            foreach ($_SESSION['cart'] as $item) {
                if ($item['discount'] > 0) {
                    $total_money += $item['num'] * ($item['price'] * ((100 - $item['discount']) / 100));
                } else {
                    $total_money += $item['price'] * $item['num'];
                }
                $usecoupon = 0;
            }
        }

        if ($userid > 0) {
            //insert người dùng
            $sql = "INSERT INTO `order` (`fullname`, `email`, `phonenumber`, `address`, `note`, `order_date`, `status`, `user_id`, `role_id`, `total_money`, `orders_shipping`, `order_id`, `usecoupon`) 
            VALUES ('$fullname', '$email', '$phonenumber', '$address', '$note', '$order_date', '0', '$userid', '2','$total_money','$order_shipping','$order_id','$usecoupon')";
        } else {
            //insert người dùng
            $sql = "INSERT INTO `order` (`fullname`, `email`, `phonenumber`, `address`, `note`, `order_date`, `status`, `role_id`, `total_money`, `orders_shipping`, `order_id`, `usecoupon`) 
          VALUES ('$fullname', '$email', '$phonenumber', '$address', '$note', '$order_date', '0', '3','$total_money','$order_shipping','$order_id','$usecoupon')";
        }
        execute($sql);

        $sql = "SELECT * FROM `order` WHERE `order_date` = '$order_date'";
        $orderItem = executeResult($sql, true);
        $orderId = $orderItem['id']; //tìm order thông qua thời gian

        foreach ($_SESSION['cart'] as $item) {
            $productId = $item['id'];
            $num = $item['num'];
            $color = $item['color'];
            $size = $item['size'];
            if ($item['discount'] > 0) {
                $price = $item['price'] * ((100 - $item['discount']) / 100);
                $total_money = $item['num'] * ($item['price'] * ((100 - $item['discount']) / 100));
            } else {
                $price = $item['price'];
                $total_money = $item['price'] * $item['num'];
            }

            $sql = "INSERT INTO `order_detail` (`order_id`, `product_id`, `price`, `num`,`total_money`,`created_at`,`color`,`size`) VALUES ('$orderId', '$productId', '$price', '$num', '$total_money','$order_date','$color','$size')";
            execute($sql);
        }
        unset($_SESSION['cart']);
        unset($_SESSION['totalmoney']);
        $res = [
            "status" => 1,
            "msg" => $order_id
        ];
        echo json_encode($res);
    } else {
        $res = [
            "status" => 0,
            "msg" => "Vui lòng nhập thông tin đầy đủ"
        ];
        echo json_encode($res);
    }
}


//use coupon
function useCoupon()
{
    if (!isset($_SESSION['totalmoney'])) {
        $coupon = getPOST('coupon');
        $coupon = fixAllInput($coupon);
        $sql = "SELECT * FROM coupon WHERE name = '$coupon'";
        $checkCoupon = executeResult($sql, true);

        if ($checkCoupon != null) {
            $number = $checkCoupon['number'];
            if ($number > 0) {
                $percent = $checkCoupon['percent'];
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                $totalMoney = 0;
                //lay tổng tiền
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    if ($_SESSION['cart'][$i]['discount'] > 0) {
                        $price = $_SESSION['cart'][$i]['num'] * $_SESSION['cart'][$i]['price'] * ((100 - $_SESSION['cart'][$i]['discount']) / 100);
                    } else {
                        $price = $_SESSION['cart'][$i]['num'] * $_SESSION['cart'][$i]['price'];
                    }
                    $totalMoney += $price;
                }

                //trừ phầm trăm mã giảm giá
                $lastprice = $totalMoney * ((100 - $percent) / 100);
                $_SESSION['totalmoney'] = $lastprice;

                $id = $checkCoupon['id'];
                $num = $checkCoupon['number'] - 1;
                $usecoupon = $checkCoupon['usecoupon'] + 1;
                //update
                $sql = "UPDATE coupon SET number = '$num',usecoupon = '$usecoupon' WHERE id = $id";
                execute($sql);
                echo "Bạn được giảm giá $percent% trên đơn hàng này !";
            } else {
                echo "Mã giảm giá đã hết hạn ";
            }
        } else {
            echo "Mã giảm giá không tồn !";
        }
    } else {
        echo "Bạn chỉ được dùng mã giảm giá trên 1 đơn hàng !";
    }
}

//update cart
function updateCart()
{
    $id = getPOST('id');
    $num = getPOST('num');
    $id = preg_replace("/[^0-9]/", "", $id);
    $num = preg_replace("/[^0-9]/", "", $num);
    $sql = "SELECT * FROM `product` WHERE id = $id";
    $checkPr = executeResult($sql, true);
    if ($checkPr != null && $num >= 0) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i]['id'] == $id) {
                $_SESSION['cart'][$i]['num'] = $num;
                if ($num <= 0) {
                    array_splice($_SESSION['cart'], $i, 1);
                }
                break;
            }
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin !";
    }
}


//add cart
function addToCart()
{
    $id = getPOST('id');
    $num = getPOST('num');
    $color = getPOST('color');
    $size = getPOST('size');

    $id = preg_replace("/[^0-9]/", "", $id);
    $num = preg_replace("/[^0-9]/", "", $num);

    $size = preg_replace("/[^0-9]/", "", $size);
    $color = preg_replace("/[^0-9]/", "", $color);
    $checksize = [1, 2, 3, 4, 5];
    $checksizeF = in_array($size, $checksize);
    $checkcolor = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
    $checkcolorF = in_array($color, $checkcolor);

    $sql = "SELECT * FROM `product` WHERE id = $id";
    $checkPr = executeResult($sql, true);
    if ($checkPr != null && $num > 0 && $checksizeF == true && $checkcolorF == true) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $isFind = false;
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i]['id'] == $id) {
                $_SESSION['cart'][$i]['num'] += $num;
                $isFind = true;
                break;
            }
        }
        if (!$isFind) {
            $sql = "SELECT * FROM product WHERE id = $id";
            $product = executeResult($sql, true);
            $product['num'] = $num;
            $product['color'] = $color;
            $product['size'] = $size;
            $_SESSION['cart'][] = $product;
        }
        echo "Thêm sản phẩm vào giỏ hàng thành công";
    } else {
        echo "Vui lòng chọn màu sắc,kích thước và số lượng sản phẩm !";
    }
}



//view_product
function view_product()
{
    //get id từ form
    $id = $_POST['id'];
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);
    $sql = "SELECT * FROM `product` WHERE id = $id";
    $checkPr = executeResult($sql, true);
    $sql = "SELECT * FROM galery_product WHERE product_id = $id";
    $resultGaleryProduct = executeResult($sql, true);
    if ($resultGaleryProduct == null) {
        $resultGaleryProduct['thumbnail'] = 'https://mvsccs.com/public/uploads/all/hq1rH.';
    }
    $checkPr['thumbnail'] = $resultGaleryProduct['thumbnail'];
    if ($checkPr != null) {
        echo json_encode($checkPr);
    } else {
        echo "không có sản phẩm này";
    }
}


//checkInventory
function checkInventory()
{
    //get userid từ form
    $user_id = $_POST['userid'];
    //fix all sql injection :))
    $user_id = preg_replace("/[^0-9]/", "", $user_id);
    $sql = "SELECT * FROM user WHERE id = '$user_id'";
    $checkUser = executeResult($sql, true);
    if ($checkUser != null) {

        //get userid từ form
        $productcode = $_POST['productcode'];
        //fix all sql injection :))
        $productcode = preg_replace("/[^0-9]/", "", $productcode);

        //check order
        $sql = "SELECT title,quantity,sold FROM `product` WHERE product_code = '$productcode'";
        $checkOrder = executeResult($sql, true);

        if ($checkOrder != null) {
            $inventory = $checkOrder['quantity'] - $checkOrder['sold'];
            echo "Số lượng tồn kho của sản phẩm " . $productcode . "-" . $checkOrder['title'] . " là : " . $inventory;
        } else {
            echo "Không có mã sản phẩm này !";
        }
    } else {
        echo "Không đăng nhập thì thay đổi làm sao được ?";
    }
}

//changeStutusOrder
function changeStutusOrder()
{
    //get userid từ form
    $user_id = $_POST['userid'];
    //fix all sql injection :))
    $user_id = preg_replace("/[^0-9]/", "", $user_id);
    $sql = "SELECT * FROM user WHERE id = '$user_id'";
    $checkUser = executeResult($sql, true);
    if ($checkUser != null) {
        //get userid từ form
        $order_id = $_POST['orderid'];
        //fix all sql injection :))
        $order_id = preg_replace("/[^0-9]/", "", $order_id);
        //get userid từ form
        $status = $_POST['status'];
        //fix all sql injection :))
        $status = preg_replace("/[^0-9]/", "", $status);

        //check order
        $sql = "SELECT * FROM `order` WHERE id = '$order_id'";
        $checkOrder = executeResult($sql, true);

        if ($checkOrder != null && $status < 5) {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $updated_at =  date('Y-m-d H:i:s');

            $sql = "UPDATE `order` SET status = '$status',updated_at = '$updated_at' WHERE id = '$order_id'";
            execute($sql);
            echo "Thay đổi trạng thái thành công !";
        } else {
            echo "Không có đơn hàng này !";
        }
    } else {
        echo "Không đăng nhập thì thay đổi làm sao được ?";
    }
}


//deletePost
function deletePost()
{
    $id = getPOST('id') ? (string)(int)getPOST('id') : false;
    $sql = "SELECT * FROM post WHERE id = $id";
    $checkPost = executeResult($sql, true);
    if ($checkPost != null) {
        $sql = "DELETE FROM post WHERE id = $id";
        execute($sql);
        echo "Xóa thành công danh mục !";
    } else {
        echo "Không có bài viết này trong hệ thống !";
    }
}


//addPost
function addPost()
{
    //get userid từ form
    $user_id = $_POST['userid'];
    //fix all sql injection :))
    $user_id = preg_replace("/[^0-9]/", "", $user_id);
    //check product
    $sql = "SELECT * FROM user WHERE id = '$user_id'";
    $checkUser = executeResult($sql, true);
    if ($checkUser != null) {

        $id = getPOST('id');
        //fix all sql injection :))
        $id = preg_replace("/[^0-9]/", "", $id);

        $title = getPOST('title');
        $slug = getPOST('slug');
        $category_id = getPOST('category_id');
        $view = getPOST('view');
        $content = getPOST('description');
        if ($slug == '') {
            $slug = to_slug($title) . '-' . rand();
        }

        if ($title != '' && $category_id != '' && $content != '' && $view != '') {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $title = fixAllInput($title);
            $category_id = preg_replace("/[^0-9]/", "", $category_id);
            $view = preg_replace("/[^0-9]/", "", $view);
            $updated_at = $created_at =  date('Y-m-d H:i:s');

            $sql = "SELECT * FROM category_post WHERE id = '$category_id'";
            $checkCate = executeResult($sql);
            if ($checkCate != null) {
                if ($id > 0) {
                    $sql = "UPDATE post SET title = '$title',slug = '$slug',user_id = '$user_id',content = '$content',updated_at = '$updated_at',category_id = '$category_id',view = '$view' WHERE id = '$id'";
                } else {
                    $sql = "INSERT INTO post (title,slug,user_id,content,created_at,updated_at,category_id,view) VALUES ('$title','$slug','$user_id','$content','$created_at','$updated_at','$category_id','$view')";
                }

                execute($sql);
                echo "success";
            } else {
                echo "Không có danh mục này !";
            }
        } else {
            echo "Vui lòng nhập đầy đủ thông tin !";
        }
    } else {
        echo "Đăng nhập để tiếp tục !";
    }
}


//deleteCategoryPost
function deleteCategoryPost()
{
    $id = getPOST('id') ? (string)(int)getPOST('id') : false;
    $sql = "SELECT * FROM category_post WHERE id = $id";
    $checkCate = executeResult($sql, true);
    if ($checkCate != null) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        //check post có danh mục này hay không
        $sql = "SELECT * FROM post WHERE category_id = '$id'";
        $checkPro = executeResult($sql);
        if ($checkPro == null) {
            $sql = "DELETE FROM category_post WHERE id = $id";
            execute($sql);
            echo "Xóa thành công danh mục !";
        } else {
            echo "Không thể xóa danh mục đang chứa bài viết =))";
        }
    } else {
        echo "Không có danh mục này trong hệ thống !";
    }
}


//addCategoryPost
function addCategoryPost()
{
    $catename = getPOST('catename');
    $slug = getPOST('slug');
    $user_id = getPOST('user_id') ? (string)(int)getPOST('user_id') : false;

    if ($catename != '') {
        $id = getPOST('id');
        //fix all sql injection :))
        $id = preg_replace("/[^0-9]/", "", $id);

        $catename = fixAllInput($catename);
        if ($slug == '') {
            $slug = to_slug($catename) . '-' . rand();
        } else {
            $sql = "SELECT * FROM category WHERE slug = '$slug'";
            $checkSlug = executeResult($sql);
            if ($checkSlug == null) {
                $slug = to_slug($slug) . '-' . rand();
            } else {
                echo "Đường dẫn đã tồn tại !";
                die;
            }
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $created_at = $updated_at = date('Y-m-d H:i:s');

        if ($id > 0) {
            $sql = "UPDATE category_post SET user_id = '$user_id',name = '$catename',slug = '$slug',updated_at = '$updated_at' WHERE id = $id";
        } else {
            $sql = "INSERT INTO category_post(user_id,name,slug,created_at,updated_at) VALUES('$user_id','$catename','$slug','$created_at','$updated_at')";
        }
        execute($sql);
        echo "success";
    } else {
        echo "Vui lòng nhập đầy đủ thông tin !";
    }
}



//statusFeedback
function statusFeedback()
{
    //get id từ form
    $id = getPOST('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);
    $sql = "SELECT * FROM feedback WHERE id = $id";
    $checkFeedback = executeResult($sql, true);
    if ($checkFeedback != null) {
        if ($checkFeedback['status'] == 0) {
            $sql = "UPDATE feedback SET status = 1 WHERE id = $id";
            execute($sql);
            echo "Đánh dấu đã đọc phản hồi này !";
        } else {
            $sql = "UPDATE feedback SET status = 0 WHERE id = $id";
            execute($sql);
            echo "Đánh dấu Chưa đọc phản hồi này !";
        }
    } else {
        echo "Không có phản hồi này này !";
    }
}

//delete cmt
function deleteAllCmt()
{
    //get id từ form
    $id = getPOST('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);
    $sql = "SELECT * FROM comment WHERE id = $id";
    $checkCmt = executeResult($sql);
    if ($checkCmt != null) {
        $sql = "DELETE FROM comment WHERE id = $id";
        execute($sql);
        echo "Xóa đánh giá thành công !";
    } else {
        echo "Không có đánh giá,bình luận này !";
    }
}


//deleteCoupon
function deleteCoupon()
{
    //get id từ form
    $id = getPOST('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);
    $sql = "SELECT * FROM coupon WHERE id = $id";
    $checkCou = executeResult($sql);
    if ($checkCou != null) {
        $sql = "DELETE FROM coupon WHERE id = $id";
        execute($sql);
        echo "Xóa Coupon thành công !";
    } else {
        echo "Không có mã coupon này";
    }
}


//add coupon
function addCoupon()
{
    //get userid từ form
    $user_id = $_POST['user_id'];
    //fix all sql injection :))
    $user_id = preg_replace("/[^0-9]/", "", $user_id);
    //check product
    $sql = "SELECT * FROM user WHERE id = '$user_id'";
    $checkUser = executeResult($sql, true);
    if ($checkUser != null) {
        $couponname = getPOST('couponname');
        $couponnumber = getPOST('couponnumber');
        $percent = getPOST('percent');

        if ($couponname == '') {
            $couponname = strtoupper(uniqid()); //tự tạo ra code 13 ký tự khi không nhập
        }

        if (preg_match("/^[a-zA-Z0-9]*$/", $couponname)) {
            $sql = "SELECT * FROM coupon WHERE name = '$couponname'";
            $checkCoupon = executeResult($sql);
            if ($checkCoupon == null) {
                if (preg_match("/^[0-9]*$/", $couponnumber)) {
                    if (preg_match("/^[0-9]*$/", $percent) && $percent > 0) {

                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $created_at =  date('Y-m-d H:i:s');

                        $sql = "INSERT INTO coupon (name,percent,created_at,number,user_id) VALUES ('$couponname','$percent','$created_at','$couponnumber','$user_id')";
                        execute($sql);
                        echo "success";
                    } else {
                        echo "Phần trăm giảm giá không hợp lệ !";
                    }
                } else {
                    echo "Số lượng không hợp lệ !";
                }
            } else {
                echo "Đã có Coupon này trong hệ thống !";
            }
        } else {
            echo "Coupon phải viết liền không dấu !";
        }
    } else {
        echo "Đăng nhập để tiếp tục !";
    }
}


//add product
function addProduct()
{
    //get userid từ form
    $user_id = getPOST('userid');
    //fix all sql injection :))
    $user_id = preg_replace("/[^0-9]/", "", $user_id);
    //check product
    $sql = "SELECT * FROM user WHERE id = '$user_id'";
    $checkUser = executeResult($sql, true);
    if ($checkUser != null) {

        $product_code = getPOST('product_code');
        $title = getPOST('title');
        $price = getPOST('price');
        $discount = getPOST('discount');
        $slug = getPOST('slug');
        $view = getPOST('view');
        $quantity = getPOST('quantity');
        $sold = getPOST('sold');
        $deleted = getPOST('deleted');
        $description = getPOST('description');

        $size = '';
        if (isset($_POST['size'])) {
            $size = $_POST['size'];
            $size = preg_replace("/[^0-9]/", "", $size);
        }
        $color = '';
        if (isset($_POST['color'])) {
            $color = $_POST['color'];
            $color = preg_replace("/[^0-9]/", "", $color);
        }
        $category_product = '';
        if (isset($_POST['category_product'])) {
            $category_product = $_POST['category_product'];
            $category_product = preg_replace("/[^0-9]/", "", $category_product);
        }

        if ($product_code != '' && $title != '' && $price != '' && $discount != '' && $quantity != '' && $view != '' && $sold != '' && $deleted != '' && $description != '' && $size != '' && $color != '' && $category_product != '') {

            //check prodcut code
            $sql = "SELECT * FROM product WHERE product_code = '$product_code'";
            $checkProCode = executeResult($sql, true);

            if ($checkProCode == null) {

                if (preg_match("/^[0-9]*$/", $product_code)) {

                    if ($slug == '') {
                        $slug = to_slug($title) . rand();
                    }
                    $slug = to_slug($slug);

                    //check slug
                    $sql = "SELECT * FROM product WHERE slug = '$slug'";
                    $checkSlug = executeResult($sql);
                    if ($checkSlug == null) {

                        $title = fixAllInput($title);
                        $description = fixAllInput($description);
                        $price = fixAllInput($price);
                        $discount = fixAllInput($discount);
                        $quantity = fixAllInput($quantity);
                        $sold = fixAllInput($sold);
                        $deleted = fixAllInput($deleted);

                        if (preg_match("/^[0-9]*$/", $price) && preg_match("/^[0-9]*$/", $discount) && preg_match("/^[0-9]*$/", $view) && preg_match("/^[0-9]*$/", $quantity) && preg_match("/^[0-9]*$/", $sold) && preg_match("/^[0-9]*$/", $deleted)) {

                            //insert để get ra id =))
                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $created_at = $updated_at = date('Y-m-d H:i:s');
                            $sql = "INSERT INTO product(user_id,title,slug,description,price,discount,view,quantity,sold,deleted,created_at,updated_at,product_code)
                            VALUES ('$user_id','$title','$slug','$description','$price','$discount','$view','$quantity','$sold','$deleted','$created_at','$updated_at','$product_code')";
                            execute($sql);

                            //get id
                            $sql = "SELECT * FROM product WHERE product_code = '$product_code'";
                            $checkPrId = executeResult($sql, true);
                            $id = $checkPrId['id'];

                            // upload multi images
                            $targetDir = "../images/shop/";
                            $allowTypes = array('jpg', 'png', 'jpeg');

                            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                            $fileNames = array_filter($_FILES['images']['name']);
                            if (!empty($fileNames)) {
                                foreach ($_FILES['images']['name'] as $key => $val) {
                                    // File upload path 
                                    $fileName = basename($_FILES['images']['name'][$key]);
                                    $targetFilePath = $targetDir . $fileName;

                                    $result[] = $targetFilePath; // multiple img

                                    // Check whether file type is valid 
                                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                                    if (in_array($fileType, $allowTypes)) {
                                        // Upload file to server 
                                        if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFilePath)) {
                                            // Image db insert sql 
                                            // $insertValuesSQL .= "'. $fileName .',";
                                        } else {
                                            $errorUpload .= $_FILES['images']['name'][$key] . ' | ';
                                        }
                                    } else {
                                        $errorUploadType .= $_FILES['images']['name'][$key] . ' | ';
                                    }
                                }
                                foreach ($result as $item) {
                                    $insertValuesSQL = $item;
                                    //thêm ảnh mới
                                    $sql = "INSERT INTO galery_product(product_id,thumbnail) VALUES('$id','$insertValuesSQL')";
                                    execute($sql);
                                }

                                // Error message 
                                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                            } else {
                                $statusMsg = 'Please select a file to upload.';
                            }
                            //end upload multi imgaes

                            foreach ($size as $item) {
                                //thêm size mới
                                $sizename = $item;
                                //insert =))
                                $sql = "INSERT INTO size(product_id,sizename) VALUES('$id','$sizename')";
                                execute($sql);
                            }

                            foreach ($color as $item) {
                                //thêm color mới
                                $colorname = $item;
                                //insert =))
                                $sql = "INSERT INTO color(product_id,colorname) VALUES('$id','$colorname')";
                                execute($sql);
                            }

                            foreach ($category_product as $item) {
                                //thêm danh mục mới
                                $category_product = $item;
                                //insert =))
                                $sql = "INSERT INTO product_category(product_id,category_id) VALUES('$id','$category_product')";
                                execute($sql);
                            }
                            echo "success";
                        } else {
                            echo "Giá,%giảm giá,lượt xem,số lượng nhập vào phải là số !";
                        }
                    } else {
                        echo "Đường dẫn đã tồn tại !";
                    }
                } else {
                    echo "Mã sản phẩm phải là số !";
                }
            } else {
                echo "Mã sản phẩm đã tồn tại !";
            }
        } else {
            echo "Vui lòng nhập đầy đủ thông tin !!";
        }
    } else {
        echo "Đéo đăng nhập mà đòi tạo ? hack cmm à :))";
    }
}


//delete cate
function deleteCate()
{
    $id = getPOST('id') ? (string)(int)getPOST('id') : false;
    $sql = "SELECT * FROM category WHERE id = $id";
    $checkCate = executeResult($sql, true);
    if ($checkCate != null) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $updated_at = date('Y-m-d H:i:s');

        //check product có danh mục này hay không
        $sql = "SELECT * FROM product_category WHERE category_id = '$id'";
        $checkPro = executeResult($sql);
        if ($checkPro == null) {

            //check danh mục con
            $sql = "SELECT * FROM category WHERE parent_id = $id";
            $checkParentID = executeResult($sql);
            if ($checkParentID == null) {
                $sql = "DELETE FROM category WHERE id = $id";
                execute($sql);
                echo "Xóa thành công danh mục !";
            } else {
                echo "Danh mục này đang chứa các danh mục con !";
            }
        } else {
            echo "Không thể xóa danh mục đang chứa sản phẩm =))";
        }
    } else {
        echo "Không có danh mục này trong hệ thống !";
    }
}

//delete cmt
function deletedCmt()
{
    //productid
    $productid = getPOST('productid');
    $productid = preg_replace("/[^0-9]/", "", $productid);
    //get id từ form
    $id = getPOST('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);
    $sql = "SELECT * FROM comment WHERE id = $id AND product_id = $productid";
    $checkCmt = executeResult($sql);
    if ($checkCmt != null) {
        $sql = "DELETE FROM comment WHERE id = $id AND product_id = $productid";
        execute($sql);
        echo "Xóa đánh giá thành công !";
    } else {
        echo "Không có đánh giá này trong bài viết";
    }
}


//editProduct
function editProduct()
{
    //get userid từ form
    $user_id = getPOST('userid');
    //fix all sql injection :))
    $user_id = preg_replace("/[^0-9]/", "", $user_id);
    //check product
    $sql = "SELECT * FROM user WHERE id = '$user_id'";
    $checkUser = executeResult($sql, true);
    if ($checkUser != null) {
        //get id từ form
        $id = getPOST('id');
        //fix all sql injection :))
        $id = preg_replace("/[^0-9]/", "", $id);

        //check product
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $checkProduct = executeResult($sql, true);
        if ($checkProduct != null) {

            $product_code = getPOST('product_code');
            $title = getPOST('title');
            $price = getPOST('price');
            $discount = getPOST('discount');
            $slug = getPOST('slug');
            $view = getPOST('view');
            $quantity = getPOST('quantity');
            $sold = getPOST('sold');
            $deleted = getPOST('deleted');
            $description = getPOST('description');

            $size = '';
            if (isset($_POST['size'])) {
                $size = $_POST['size'];
                $size = preg_replace("/[^0-9]/", "", $size);
            }
            $color = '';
            if (isset($_POST['color'])) {
                $color = $_POST['color'];
                $color = preg_replace("/[^0-9]/", "", $color);
            }
            $category_product = '';
            if (isset($_POST['category_product'])) {
                $category_product = $_POST['category_product'];
                $category_product = preg_replace("/[^0-9]/", "", $category_product);
            }

            if ($product_code != '' && $title != '' && $price != '' && $discount != '' && $quantity != '' && $view != '' && $sold != '' && $deleted != '' && $description != '' && $size != '' && $color != '' && $category_product != '') {

                if (preg_match("/^[0-9]*$/", $product_code)) {

                    if ($slug == '') {
                        $slug = to_slug($title) . rand();
                    }
                    $slug = to_slug($slug);

                    //check slug
                    $sql = "SELECT * FROM product WHERE slug = '$slug' AND id NOT LIKE '$id'";
                    $checkSlug = executeResult($sql);
                    if ($checkSlug == null) {

                        $title = fixAllInput($title);
                        $description = fixAllInput($description);
                        $price = fixAllInput($price);
                        $discount = fixAllInput($discount);
                        $quantity = fixAllInput($quantity);
                        $sold = fixAllInput($sold);
                        $deleted = fixAllInput($deleted);

                        if (preg_match("/^[0-9]*$/", $price) && preg_match("/^[0-9]*$/", $discount) && preg_match("/^[0-9]*$/", $view) && preg_match("/^[0-9]*$/", $quantity) && preg_match("/^[0-9]*$/", $sold) && preg_match("/^[0-9]*$/", $deleted)) {


                            // upload multi images
                            $targetDir = "../images/shop/";
                            $allowTypes = array('jpg', 'png', 'jpeg');

                            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                            $fileNames = array_filter($_FILES['images']['name']);
                            if (!empty($fileNames)) {
                                foreach ($_FILES['images']['name'] as $key => $val) {
                                    // File upload path 
                                    $fileName = basename($_FILES['images']['name'][$key]);
                                    $targetFilePath = $targetDir . $fileName;

                                    $result[] = $targetFilePath; // multiple img

                                    // Check whether file type is valid 
                                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                                    if (in_array($fileType, $allowTypes)) {
                                        // Upload file to server 
                                        if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFilePath)) {
                                            // Image db insert sql 
                                            // $insertValuesSQL .= "'. $fileName .',";
                                        } else {
                                            $errorUpload .= $_FILES['images']['name'][$key] . ' | ';
                                        }
                                    } else {
                                        $errorUploadType .= $_FILES['images']['name'][$key] . ' | ';
                                    }
                                }


                                //xóa ảnh cũ
                                $sql = "DELETE FROM galery_product WHERE product_id = '$id'";
                                execute($sql);
                                //lặp qua mảng lưu đường dẫn ảnh
                                foreach ($result as $item) {

                                    $insertValuesSQL = $item;

                                    //thêm ảnh mới
                                    $sql = "INSERT INTO galery_product(product_id,thumbnail) VALUES('$id','$insertValuesSQL')";
                                    execute($sql);
                                }

                                // Error message 
                                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                            } else {
                                $statusMsg = 'Please select a file to upload.';
                            }
                            //end upload multi imgaes


                            //xóa size cũ
                            $sql = "DELETE FROM size WHERE product_id = '$id'";
                            execute($sql);

                            foreach ($size as $item) {
                                //thêm size mới
                                $sizename = $item;
                                $sizename = fixAllInput($sizename);
                                //insert =))
                                $sql = "INSERT INTO size(product_id,sizename) VALUES('$id','$sizename')";
                                execute($sql);
                            }

                            //xóa color cũ
                            $sql = "DELETE FROM color WHERE product_id = '$id'";
                            execute($sql);

                            foreach ($color as $item) {
                                //thêm color mới
                                $colorname = $item;
                                $colorname = fixAllInput($colorname);
                                //insert =))
                                $sql = "INSERT INTO color(product_id,colorname) VALUES('$id','$colorname')";
                                execute($sql);
                            }


                            //xóa danh mục sản phảm cũ
                            $sql = "DELETE FROM product_category WHERE product_id = '$id'";
                            execute($sql);

                            foreach ($category_product as $item) {
                                //thêm danh mục mới
                                $category_product = $item;
                                $category_product = fixAllInput($category_product);
                                //insert =))
                                $sql = "INSERT INTO product_category(product_id,category_id) VALUES('$id','$category_product')";
                                execute($sql);
                            }

                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $updated_at = date('Y-m-d H:i:s');
                            $sql = "UPDATE product SET user_id = '$user_id',title = '$title',slug = '$slug',description = '$description',price = '$price',discount = '$discount',view = '$view',quantity='$quantity',sold='$sold',deleted='$deleted',product_code='$product_code',updated_at='$updated_at'  WHERE id = $id";
                            execute($sql);
                            echo "success";
                        } else {
                            echo "Giá,%giảm giá,lượt xem,số lượng nhập vào phải là số !";
                        }
                    } else {
                        echo "Đường dẫn đã tồn tại !";
                    }
                } else {
                    echo "Mã sản phẩm phải là số !";
                }
            } else {
                echo "Vui lòng nhập đầy đủ thông tin !";
            }
        } else {
            echo "không tồn tại sản phẩm này !";
        }
    } else {
        echo "Đéo đăng nhập mà đòi sửa ? hack cmm à :))";
    }
}


//show hide
function showhideCategory()
{
    $id = getPOST('id') ? (string)(int)getPOST('id') : false;
    $sql = "SELECT * FROM category WHERE id = $id";
    $checkCate = executeResult($sql, true);
    if ($checkCate != null) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $updated_at = date('Y-m-d H:i:s');
        if ($checkCate['deleted'] == 1) {
            $sql = "UPDATE category SET deleted = 0,updated_at = '$updated_at' WHERE id = $id";
        } else {
            $sql = "SELECT * FROM category WHERE parent_id = $id";
            $checkParentID = executeResult($sql);
            if ($checkParentID == null) {
                $sql = "UPDATE category SET deleted = 1,updated_at = '$updated_at' WHERE id = $id";
            } else {
                foreach ($checkParentID as $item) {
                    if ($item['deleted'] == 0) {
                        echo "Không thể ẩn ! Danh mục này đang chứa các danh mục con !";
                        die;
                    } else {
                        $sql = "UPDATE category SET deleted = 1,updated_at = '$updated_at' WHERE id = $id";
                    }
                }
            }
        }
        execute($sql);
        echo "Cập nhật trạng thái danh mục thành công !";
    } else {
        echo "Không có danh mục này trong hệ thống !";
    }
}


//add Category
function addCategory()
{
    $catename = getPOST('catename');
    $slug = getPOST('slug');
    $parent_id = getPOST('parent_id') ? (string)(int)getPOST('parent_id') : false;
    $user_id = getPOST('user_id') ? (string)(int)getPOST('user_id') : false;

    if ($catename != '' &&  $parent_id != '') {
        $id = getPOST('id');
        //fix all sql injection :))
        $id = preg_replace("/[^0-9]/", "", $id);

        if ($parent_id == 999) {
            $parent_id = 0;
        }

        // $sql = "SELECT * FROM category WHERE id = '$parent_id'";
        // echo $sql;die;
        // $checkID = executeResult($sql);
        // if ($checkID != null) {
        $catename = fixAllInput($catename);
        if ($slug == '') {
            $slug = to_slug($catename) . '-' . rand();
        } else {
            $sql = "SELECT * FROM category WHERE slug = '$slug'";
            $checkSlug = executeResult($sql);
            if ($checkSlug == null) {
                $slug = to_slug($slug) . '-' . rand();
            } else {
                echo "Đường dẫn đã tồn tại !";
                die;
            }
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $created_at = $updated_at = date('Y-m-d H:i:s');

        if ($id > 0) {
            $sql = "UPDATE category SET user_id = '$user_id',name = '$catename',slug = '$slug',parent_id = '$parent_id',updated_at = '$updated_at' WHERE id = $id";
        } else {
            $sql = "INSERT INTO category(user_id,name,slug,parent_id,deleted,created_at,updated_at) VALUES('$user_id','$catename','$slug','$parent_id','0','$created_at','$updated_at')";
        }
        execute($sql);
        echo "success";
    } else {
        echo "Vui lòng nhập đầy đủ thông tin !";
    }
}
