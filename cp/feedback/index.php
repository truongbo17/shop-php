<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

$sql = "SELECT feedback.*,user.username as username FROM feedback LEFT JOIN user ON feedback.user_id = user.id ORDER BY created_at DESC";
$resultFeedback = executeResult($sql);
?>

<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Quản lý phản hồi</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">Feedback</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="user-dashboard page-wrapper" style="padding-top:0px">
    <div class="container">
        <div class="dashboard-wrapper user-dashboard">
            <div class="table-responsive">
                <table class="table">
                    <p>Mới nhất xếp trước</p>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Đối tượng</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Chủ đề</th>
                            <th>Nội dung</th>
                            <th>Trạng thái</th>
                            <th>Ngày gửi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        foreach ($resultFeedback as $item) {
                            echo '<tr>
                                <td>' . (++$index) . '</td>
                                <td style="color:red">';
                            if ($item['user_id'] > 0) {
                                echo $item['username'];
                            } else {
                                echo 'Khách vãng lai';
                            }
                            echo '</td>
                                <td>' . $item['fullname'] . '</td>
                                <td>' . $item['email'] . '</td>
                                <td>' . $item['subject'] . '</td>
                                <td>' . $item['message'] . '</td>';
                            if ($item['status'] == 0) {
                                echo '<td><span id="status" class="label label-danger">Chưa đọc</span></td>';
                            } elseif ($item['status'] == 1) {
                                echo '<td><span id="status" class="label label-success">Đã đọc</span></td>';
                            }
                            echo '<td>' . $item['created_at'] . '</td>';
                            if ($item['status'] == 0) {
                                echo '<td><button class="btn btn-success" onclick="statusFeedback(' . $item['id'] . ')">Đánh dấu đã đọc</button></td>';
                            } elseif ($item['status'] == 1) {
                                echo '<td><button class="btn btn-danger" onclick="statusFeedback(' . $item['id'] . ')">Đánh dấu chưa đọc</button></td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- feedback status -->
<script src="../../js/statusfeedback.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>