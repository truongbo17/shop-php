<?php
$baseUrl = './';
include_once 'layouts/header.php';

if ($user == null) {
	$user = [
		'id' => '',
		'fullname' => '',
		'email' => ''
	];
}

?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Contact Us</h1>
					<ol class="breadcrumb">
						<li><a href="<?=$baseUrl?>index.php">Home</a></li>
						<li class="active">contact</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>




<section class="page-wrapper">
	<div class="contact-section">
		<div class="container">
			<div class="row">
				<!-- Contact Form -->
				<div class="contact-form col-md-6 " >
					<form id="addfeedback" method="post">
						<input type="text" value="<?=$user['id']?>" name="userid" hidden>
						<div class="form-group">
							<input type="text" placeholder="Your Name" value="<?=$user['fullname']?>" class="form-control" name="fullname" id="name">
						</div>
						
						<div class="form-group">
							<input type="email" placeholder="Your Email" value="<?=$user['email']?>" class="form-control" name="email" id="email">
						</div>
						
						<div class="form-group">
							<input type="text" placeholder="Subject"  class="form-control" name="subject" id="subject">
						</div>
						
						<div class="form-group">
							<textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>	
						</div>
						
						<div id="cf-submit">
							<input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
						</div>						
						
					</form>
				</div>
				<!-- ./End Contact Form -->
				
				<!-- Contact Details -->
				<div class="contact-details col-md-6 " >
					<div class="google-map">
						<img src="http://hungha.thaibinh.gov.vn/upload/80590/20181203/6802f5c911214817b1d8f3c9de49451echuan-11111.jpg" alt="">
					</div>
					<ul class="contact-short-info" >
						<li>
							<i class="tf-ion-ios-home"></i>
							<span>Địa chỉ : Vĩnh Tuy,Hai Bà Trưng,Hà Nội</span>
						</li>
						<li>
							<i class="tf-ion-android-phone-portrait"></i>
							<span>Phone: 0368869690</span>
						</li>
						<li>
							<i class="tf-ion-android-globe"></i>
							<span>Fax: 0368869690</span>
						</li>
						<li>
							<i class="tf-ion-android-mail"></i>
							<span>Email: truongisgay5@gmail.com</span>
						</li>
					</ul>
				</div>
				<!-- / End Contact Details -->
					
				
			
			</div> <!-- end row -->
		</div> <!-- end container -->
	</div>
</section>
	
<script src="./js/addfeedback.js"></script>
<?php
include_once './layouts/footer.php';
?>