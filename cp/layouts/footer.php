<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="https://www.facebook.com/truonghocgioii">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/truonqbo">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="https://github.com/truongbo17">
							<i class="tf-ion-social-github"></i>
						</a>
					</li>
					<li>
						<a href="mailto:truongisgay5@gmail.com">
							<i class="tf-ion-social-pinterest"></i>
						</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2021, Designed by Themefisher,TRUONGBO &amp; Developed by <a href="https://www.facebook.com/truonghocgioii">Nguyễn Quang Trường</a></p>
			</div>
		</div>
	</div>
</footer>
<script>
	$(document).ready(function() {
    $('#description').summernote({
      placeholder: 'Enter content....',
      tabsize: 2,
      height: 500,
      minHeight: 100,
      maxHeight: 500,
      focus: true,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      popover: {
        image: [
          ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
          ['float', ['floatLeft', 'floatRight', 'floatNone']],
          ['remove', ['removeMedia']]
        ],
        link: [
          ['link', ['linkDialogShow', 'unlink']]
        ],
        table: [
          ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
          ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ],
        air: [
          ['color', ['color']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']]
        ]
      },
      codemirror: {
        theme: 'monokai'
      }
    });
  
});
</script>
<!-- //select mul -->
<script>
	$('option').mousedown(function(e) {
		e.preventDefault();
		//this.selected = !this.selected;
		e.target.selected = !e.target.selected;
		return false;
	});
</script>



<!-- 
    Essential Scripts
    =====================================-->

<!-- Main jQuery -->
<!-- Bootstrap 3.1 -->
<script src="<?= $baseUrl ?>../plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap Touchpin -->
<script src="<?= $baseUrl ?>../plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- Count Down Js -->
<script src="<?= $baseUrl ?>../plugins/syo-timer/build/jquery.syotimer.min.js"></script>


<!-- Main Js File -->
<script src="<?= $baseUrl ?>../js/script.js"></script>

<!-- Config Ajax Js File -->
<script src="<?= $baseUrl ?>../js/config.js"></script>

</body>

</html>