<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/logo.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--===============================================================================================-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/animate/animate.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/css-hamburgers/hamburgers.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/animsition/css/animsition.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/select2/select2.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/daterangepicker/daterangepicker.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/slick/slick.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/lightbox2/css/lightbox.min.css') !!}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/shop/util.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/shop/main.css') !!}">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						fouhamtrance@gmail.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="{{ route('index.landing') }}" class="logo">
						<img src="{!! asset('images/logo.jpg') !!}" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="{{ route('index.landing') }}">Home</a>
							</li>

							<li>
								<a href="{{ route('index.shop') }}">Shop</a>
							</li>

							<li>
								<a href="{{ route('about.shop') }}">About</a>
							</li>

							<li>
								<a href="{{ route('contact.shop') }}">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					@if(Auth::user())
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}"
										 onclick="event.preventDefault();
																	 document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
								</li>
								|
								<li>
									<a href="{{ route('index.profile', ['id' => Auth::user()->id]) }}" class="header-wrapicon1 dis-block dropdown">
										<img src="{!! asset('images/icons/icon-header-01.png') !!}" class="header-icon1" alt="ICON">
									</a>
								</li>
							</ul>
						</nav>
					@else
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="/register">Register</a>
								</li>
								|
								<li>
									<a href="/login">Login</a>
								</li>
							</ul>
						</nav>
					@endif
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="{!! asset('images/icons/icon-header-02.png') !!}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<div class="count_items">
							<span class="header-icons-noti">{{ Cart::instance('default')->count() }}</span>
						</div>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@foreach (Cart::content() as $item)
								<li class="header-cart-item product product-{{$item->model->id}}">
									<div class="header-cart-item-img">
										<img src="/storage/product_feature_images/{{$item->model->featureimage->featureimage}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											{{ $item->model->title }}
										</a>

										<span class="header-cart-item-info">
											<span class="product_qty">
												{{ $item->qty }} x ${{ $item->model->price }}
											</span>
										</span>
									</div>
								</li>
								@endforeach
								<li class="header-cart-item product new-product">
								</li>
							</ul>

							<div class="header-cart-total">
								<span class="total_price">
									Total: {{ Cart::subtotal() }}
								</span>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('index.cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('method.checkout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="{{ route('index.landing') }}" class="logo-mobile">
				<img src="{!! asset('images/logo.jpg') !!}" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					@if(Auth::user())
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}"
										 onclick="event.preventDefault();
																	 document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
								</li>
								|
								<li>
									<a href="{{ route('index.profile', ['id' => Auth::user()->id]) }}" class="header-wrapicon1 dis-block dropdown">
										<img src="{!! asset('images/icons/icon-header-01.png') !!}" class="header-icon1" alt="ICON">
									</a>
								</li>
							</ul>
						</nav>
					@else
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="/register">Register</a>
								</li>
								|
								<li>
									<a href="/login">Login</a>
								</li>
							</ul>
						</nav>
					@endif

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="{!! asset('images/icons/icon-header-02.png') !!}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<div class="count_items">
							<span class="header-icons-noti">{{ Cart::instance('default')->count() }}</span>
						</div>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@foreach (Cart::content() as $item)
								<li class="header-cart-item product product-{{$item->model->id}}">
									<div class="header-cart-item-img">
										<img src="/storage/product_feature_images/{{$item->model->featureimage->featureimage}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											{{ $item->model->title }}
										</a>

										<span class="header-cart-item-info">
											<span class="product_qty">
												{{ $item->qty }} x ${{ $item->model->price }}
											</span>
										</span>
									</div>
								</li>
								@endforeach
								<li class="header-cart-item product new-product">
								</li>
							</ul>

							<div class="header-cart-total">
								<span class="total_price">
									Total: {{ Cart::subtotal() }}
								</span>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('index.cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('method.checkout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li>
						<a href="{{ route('index.landing') }}">Home</a>
					</li>

					<li>
						<a href="{{ route('index.shop') }}">Shop</a>
					</li>

					<li>
						<a href="{{ route('about.shop') }}">About</a>
					</li>

					<li>
						<a href="{{ route('contact.shop') }}">Contact</a>
					</li>

				</ul>
			</nav>
		</div>
	</header>

  @yield('main_content')

  @include('shop.includes.footer')
