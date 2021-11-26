<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>TRUONGBO - THANHTOANONLINE</title>
<link rel="stylesheet" style="text/css" href ="css/bootstrap.min.css">
<link href="css/napthengay.css" rel="stylesheet">
<script src="js/jsmin.js"></script>
<script src="js/bootstrap.js"></script>
<script>
	$(document).ready(function(){
    $(".form-control").tooltip({ placement: 'right'});
});
</script>
</head>
<body>
<div class="container"> 
	<form class="form-horizontal form-napthengay" role="form" method="post" action="transaction.php">
	<div align=center><img src="http://traitimhoada.tk/images/logo.png"></div><br>
	<div class="form-group"><img src="http://account.napthengay.com/cac-loai-the-co-the-nap.png?ver=<?=time()?>" width="420"></div>
<div class="form-group">
    <label for="txtpin" class="col-lg-2 control-label">Loại thẻ</label>
    <div class="col-lg-10">
      <select class="form-control" name="chonmang">
		  <?php 
          $mang_option = file_get_contents("http://api.napthengay.com/v2/AllowedNetworks.php");
          echo $mang_option;
          ?>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label for="txtpin" class="col-lg-2 control-label">Mệnh giá</label>
    <div class="col-lg-10">
      <select class="form-control" name="card_value">
		  <option value="">Chọn đúng mệnh giá</option>
		  <option value="10000">10,000</option>
		  <option value="20000">20,000</option>
		  <option value="50000">50,000</option>
		  <option value="100000">100,000</option>
		  <option value="200000">200,000</option>
		  <option value="500000">500,000</option>
		</select>
		<p style="color:red">Lưu ý: chọn chính xác mệnh giá,Chọn sai mệnh giá sẽ không nhận được tiền</p>
    </div>
  </div>
  <div class="form-group">
    <label for="txtpin" class="col-lg-2 control-label">Tài khoản</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Tài khoản nạp tiền"/>
    </div>
  </div>
  <div class="form-group">
    <label for="txtpin" class="col-lg-2 control-label">Mã thẻ</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="txtpin" name="txtpin" placeholder="Mã thẻ" data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng"/>
    </div>
  </div>
  <div class="form-group">
    <label for="txtseri" class="col-lg-2 control-label">Số seri</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="txtseri" name="txtseri" placeholder="Số seri" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary" name="napthe">Nạp thẻ</button>
    </div>
  </div>
</div>  
</form>
</body>