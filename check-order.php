<?php
$baseUrl = './';
include_once $baseUrl . 'layouts/header.php';
?>
<section id="menu" class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <ol class="breadcrumb">
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">Theo dõi đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Chỉnh sửa -->
<section class="user-dashboard page-wrapper" style="padding-top:10px">
    <div class="container">
        <ul class="list-inline dashboard-menu text-center">
            <li>
                <span data-toggle="modal" data-target="#product-modal">
                    <a href="index.php">Quay lại</a>
                </span>
            </li>
            <li>
            </li>
        </ul>
        <div id="alert">

        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 resetpass">
                <form id="chechorder" method="POST">
                    <input type="text" value="<?= $user['id'] ?>" name="userid" hidden>
                    <div class="alertPart" style="display: none;">
                        <div class="alert alert-danger alert-common error-text" style="display: none;"></div>
                        <div class="alert alert-success alert-common success-text" style="display: none;"></div>
                    </div>
                    <div class="form-group">
                        <p>Nhập mã đơn hàng để xem trạng thái đơn hàng </p>
                        <input type="text" placeholder="Nhập mã đơn hàng" class="form-control" name="order_id" id="order_id" required>
                    </div>
                    <center><button class="btn btn-main">Check</button></center>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

<script>
    $("#chechorder").submit(function(event) {
        $.post(BASE_URL + API_PRODUCT, {
                'action': 'checkOrder',
                'order_id': $('input[name="order_id"]').val()
            },
            function(data) {
                newdata = JSON.parse(data);
                if (newdata.status == 1) {
                    alert(newdata.msg);
                    location.reload();
                } else {
                    alert(newdata.msg);
                    location.reload();
                }
            });
    });
</script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>