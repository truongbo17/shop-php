<?php
$baseUrl = '../';
include_once $baseUrl . 'layouts/header.php';

//comment
$sql = "SELECT comment.*,user.fullname as fullname,user.thumbnail as thumbnail 
FROM user RIGHT JOIN comment
ON comment.user_id = user.id 
ORDER BY comment.created_at DESC";
$list_comment = executeResult($sql);

$sql = "SELECT COUNT(comment) as totalcmt FROM comment";
$totalcmt = executeResult($sql, true);
?>

<section class="page-header" style="padding-top:0px;margin-bottom:0px;margin-top:0px;padding-bottom:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Danh sách bình luận</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
                        <li class="active">List Comment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="user-dashboard page-wrapper" style="padding-top:0px">
    <div class="container">
        <div class="dashboard-wrapper user-dashboard">
            <ul class="nav nav-tabs">
                <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Tổng : <?= $totalcmt['totalcmt'] ?> Đánh giá,Bình luận </a></li>
            </ul>
            <div class="tab-content patternbg">
                <div id="details" class="tab-pane fade active in">
                    <div class="post-comments">
                        <ul class="media-list comments-list m-bot-50 clearlist">
                            <p>Mới nhất xếp trước</p>
                            <!-- Comment Item start-->
                            <?php
                            foreach ($list_comment as $item) {
                                echo '
                                            <li class="media">
                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="' . fixUrl($item['thumbnail'], "../../") . '" alt="" width="50" height="50" />
                                            </a>
                                            <button class="btn btn-danger" style"float:right" onclick="deleteAllCmt(' . $item['id'] . ')">Xóa</button>
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
                </div>
            </div>
        </div>
    </div>
</section>

<!-- delete cmt js -->
<script src="../../js/deleteallcmt.js"></script>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>