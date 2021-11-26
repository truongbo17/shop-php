<?php
$baseUrl = './';
include_once $baseUrl . 'layouts/header.php';

if (isset($_GET['id'])) {
    //get id từ form
    $id = getGET('id');
    //fix all sql injection :))
    $id = preg_replace("/[^0-9]/", "", $id);
    $sql = "SELECT * FROM `post` WHERE id = $id";
    $post = executeResult($sql, true);
    if ($post == '' || $post == null) {
        echo "<hr>";
        echo "<div style='text-align:center'>";
        echo "<p>Không có thông tin về bài viết này !</p>";
        echo "<a href='index.php' class='btn btn-default'>Trang chủ</a>";
        echo "</div>";
        die;
    }
} else {
    echo "<hr>";
    echo "<div style='text-align:center'>";
    echo "<p>Vui lòng chọn bài viết để xem thông tin !</p>";
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
                        <li class="active">Chi tiết bài viết</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post post-single">
                    <div class="post-thumb">
                        <img class="img-responsive" src="images/blog/blog-post-1.jpg" alt="">
                    </div>
                    <h2 class="post-title"><?= $post['title'] ?></h2>
                    <div class="post-meta">
                        <ul>
                            <li>
                                <i class="tf-ion-ios-calendar"></i> 20, MAR 2017
                            </li>
                            <li>
                                <i class="tf-ion-android-person"></i> POSTED BY ADMIN
                            </li>
                            <li>
                                <a href="#!"><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href="#!"> TRAVEL</a>, <a href="#!">FASHION</a>
                            </li>
                            <li>
                                <a href="#!"><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a>
                            </li>
                        </ul>
                    </div>
                    <div class="post-content post-excerpt">
                        <html>
                        <?= $post['content'] ?>

                        </html>
                    </div>
                    <div class="post-social-share">
                        <h3 class="post-sub-heading">Chia sẻ bài viết</h3>
                        <div class="social-media-icons">
                            <ul>
                                <li><a class="facebook" href="https://facebook.com/truonghocgioii"><i class="tf-ion-social-facebook"></i></a></li>
                                <li><a class="twitter" href="https://facebook.com/truonghocgioii"><i class="tf-ion-social-twitter"></i></a></li>
                                <li><a class="dribbble" href="https://facebook.com/truonghocgioii"><i class="tf-ion-social-dribbble-outline"></i></a></li>
                                <li><a class="instagram" href="https://facebook.com/truonghocgioii"><i class="tf-ion-social-instagram"></i></a></li>
                                <li><a class="googleplus" href="https://facebook.com/truonghocgioii"><i class="tf-ion-social-googleplus"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="post-comments">
                        <h3 class="post-sub-heading">10 Comments</h3>
                        <ul class="media-list comments-list m-bot-50 clearlist">
                            <!-- Comment Item start-->
                            <li class="media">
                                <!-- third level Comment start -->
                                <div class="media">

                                    <a class="pull-left" href="#!">
                                        <img class="media-object comment-avatar" src="https://cafebiz.cafebizcdn.vn/zoom/700_438/2019/photo1568425154466-1568425154695-crop-1568425163594659826294.jpg" alt="" width="50" height="50">
                                    </a>

                                    <div class="media-body">

                                        <div class="comment-info">
                                            <div class="comment-author">
                                                <a href="#!">truongbo</a>
                                            </div>
                                            <time>July 02, 2015, at 11:34</time>
                                            <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
                                        </div>

                                        <p>
                                            Bài viết rất hay,tôi đã xúc động.
                                        </p>


                                    </div>

                                </div>
                                <!-- third level Comment end -->

                    </div>

                </div>
                <!-- second level Comment end -->

            </div>

            </li>
            <!-- End Comment Item -->
            </ul>
        </div>

        <div class="post-comments-form">
            <h3 class="post-sub-heading">Để lại bình luận của bạn</h3>
            <form method="post" action="#" id="form" role="form">

                <div class="row">

                    <div class="col-md-6 form-group">
                        <!-- Name -->
                        <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required="">
                    </div>

                    <div class="col-md-6 form-group">
                        <!-- Email -->
                        <input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required="">
                    </div>


                    <div class="form-group col-md-12">
                        <!-- Website -->
                        <input type="text" name="website" id="website" class=" form-control" placeholder="Website" maxlength="100">
                    </div>

                    <!-- Comment -->
                    <div class="form-group col-md-12">
                        <textarea name="text" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                    </div>

                    <!-- Send Button -->
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-small btn-main ">
                            Send comment
                        </button>
                    </div>


                </div>

            </form>
        </div>


    </div>

    </div>
    </div>
    </div>
</section>

<?php
include_once $baseUrl . 'layouts/footer.php';
?>