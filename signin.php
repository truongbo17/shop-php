<?php
require_once './database/dbhelper.php';
require_once './utils/utility.php';


//check login
$user = getUserToken();
if ($user != null) {
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>SINGIN | USER TRUONGBO</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hận đời đi bán quần áo, hét lên 4 chữ: quần áo đẹp đây!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="TruongBo">
    <meta name="generator" content="TruongBo - Hận đời đi bán quần áo, hét lên 4 chữ: quần áo đẹp đây!">

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="./plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="./plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="./plugins/slick/slick.css">
    <link rel="stylesheet" href="./plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- jquery add new -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body id="body">

    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <section class="form login">
                            <h2 class="text-center">Đăng kí tài khoản</h2>
                            <form action="#" method="POST" enctype="multipart/form-data" class="text-left clearfix" autocomplete="off">
                                <div class="alertPart" style="display: none;">
                                    <div class="alert alert-danger alert-common error-text"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fullname"  class="form-control" placeholder="Fullname">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="text-center button">
                                    <button type="submit" class="btn btn-main text-center">Sign In</button>
                                </div>
                            </form>
                            <p class="mt-20">Có tài khoản rồi à ?<a href="login.php"> Đăng nhập</a></p>
                            <p><a href="index.php" class="btn btn-main" style="color:white"> Quay lại mua sắm</a></p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="./plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="./plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Count Down Js -->
    <script src="./plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="./plugins/slick/slick.min.js"></script>
    <script src="./plugins/slick/slick-animation.min.js"></script>

    <!-- Main Js File -->
    <script src="./js/config.js"></script>

    <script>
        const form = document.querySelector(".login form"),
            continueBtn = form.querySelector(".button button"),
            errorText = form.querySelector(".error-text");
        alertPart = form.querySelector(".alertPart");

        form.onsubmit = (e) => {
            e.preventDefault();
        }

        continueBtn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", BASE_URL + API_AUTHEN, true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data === "success") {
                            alert("Đăng kí thành công !");
                            location.href = "login.php";
                        } else {
                            errorText.style.display = "block";
                            errorText.textContent = data;
                            alertPart.style.display = "block";
                        }
                    }
                }
            }
            let formData = new FormData(form);
            formData.append('action', 'signinUser');
            xhr.send(formData);
        }
    </script>
</body>

</html>