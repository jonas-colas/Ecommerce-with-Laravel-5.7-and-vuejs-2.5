@extends('shop.includes.header')

@section('title', $product->title)

@section('main_content')

	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="{{ route('index.landing') }}" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="{{ route('index.shop') }}" class="s-text16">
			Shop
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			{{$product->title}}
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						@foreach($product->image as $image)
						<div class="item-slick3" data-thumb="/storage/product_images/{{$image->images}}">
							<div class="wrap-pic-w">
								<img src="/storage/product_images/{{$image->images}}" alt="IMG-PRODUCT">
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13 block2-name">
					{{$product->title}}
				</h4>

				<span class="m-text17">
					${{$product->price}}
				</span>

				<p class="s-text8 p-t-10">
					{{$product->short_description}}
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<div class=" flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num_product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<input type="hidden" class="hidden" product_title="{{$product->title}}" product_id="{{$product->id}}" product_price="{{$product->price}}" product_featureimage="{{$product->featureimage->featureimage}}">

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
										<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 add-to-cart">
											Add to Cart
										</button>
							</div>

							@if(Auth::user())
								@if($wishlist != '')
									<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
										<!-- Button -->
										<form method="post" action="{{route('destroy.wishlist')}}">
												<input type="hidden" name="product_id" value="{{$product->id}}">
												<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 add-to-wishlist">
													remove from Wishlist
												</button>
										@csrf
										</form>
									</div>
								@else
									<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
										<!-- Button -->
										<form method="post" action="{{route('store.wishlist')}}">
												<input type="hidden" name="product_id" value="{{$product->id}}">
												<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 add-to-wishlist">
													Add to Wishlist
												</button>
										@csrf
										</form>
									</div>
								@endif
							@endif

						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Categories: {{$product->categories[0]->name}}</span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{!! $product->description !!}
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<strong>Screen size</strong>: {{$product->screen_size}} <br>
							<strong>Item dimensions</strong>: {{$product->item_dimensions}} <br>
							<strong>Screen weight</strong>: {{$product->screen_weight}} <br>
							<strong>Model year</strong>: {{$product->model_year}} <br>
							<strong>Resolution</strong>: {{$product->resolutuon}} <br>
							<strong>Total hdmi ports</strong>: {{$product->total_hdmi_ports}} <br>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach($related_products as $product)
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="/storage/product_feature_images/{{$product->featureimage->featureimage}}" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="{{ route('show.shop', ['id' => $product->id])}}" class="block2-name dis-block s-text3 p-b-5">
									{{$product->title}}
								</a>

								<span class="block2-price m-text6 p-r-5">
									${{$product->price}}
								</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>

		</div>
	</section>

<style>
input[type="hidden"] {
	visibility:hidden;
}
</style>
@stop
