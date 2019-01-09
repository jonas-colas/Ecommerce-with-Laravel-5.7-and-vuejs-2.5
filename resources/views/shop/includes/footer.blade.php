
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">

			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">

			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">

			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="{!! asset('images/icons/paypal.png') !!}" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="{!! asset('images/icons/visa.png') !!}" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="{!! asset('images/icons/mastercard.png') !!}" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="{!! asset('images/icons/express.png') !!}" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="{!! asset('images/icons/discover.png') !!}" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
	<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>

<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('vendor/animsition/js/animsition.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('vendor/bootstrap/js/popper.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('vendor/select2/select2.min.js') !!}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('vendor/slick/slick.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('js/shop/slick-custom.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('vendor/countdowntime/countdowntime.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('vendor/lightbox2/js/lightbox.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! asset('vendor/sweetalert/sweetalert.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('js/shop/main.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('js/shop/product-interfaces.js') !!}"></script>
	<script type="text/javascript">
		$('.add-to-cart').each(function(){
			var nameProduct = $( "h4:first" ).text();
			$(this).on('click', function(){
				swal(nameProduct,"is added to cart !", "success");
			});
		});
	</script>

</body>
</html>
