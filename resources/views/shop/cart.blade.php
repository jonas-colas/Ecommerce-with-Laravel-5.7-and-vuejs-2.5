@extends('shop.includes.header')

@section('title', 'Cart')

@section('main_content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	@if (Cart::count() > 0)
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
						@foreach (Cart::content() as $item)
							<tr class="table-row product-{{$item->model->id}}">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="/storage/product_feature_images/{{$item->model->featureimage->featureimage}}" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2">{{$item->model->title}}</td>
								<td class="column-3">${{$item->model->price}}</td>
								<td class="column-4">
									<div class="flex-w bo5 of-hidden w-size17">
										<button class="btn-num-product-down color1 update-qty flex-c-m size7 bg8 eff2" product_rowid="{{$item->rowId}}">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product-{{$item->rowId}}" id="try" type="number" name="num-product1" value="{{$item->qty}}">

										<button class="btn-num-product-up color1 update-qty flex-c-m size7 bg8 eff2" product_rowid="{{$item->rowId}}">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>
								</td>
								<td class="column-5-{{$item->model->id}}"><span class="subtotal_product-{{$item->model->id}}">${{$item->subtotal}}</span></td>
								<td>
										<button type="submit" rowId="{{$item->rowId}}" product_id="{{$item->model->id}}" class="fa fa-remove"></button>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>



			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">

				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<div class="m-text21 w-size20 w-full-sm sub_total">
						<span class="subtotal">
							${{Cart::subtotal()}}
						</span>
					</div>
				</div>

				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Tax:
					</span>

					<div class="m-text21 w-size20 w-full-sm tax_total">
						<span class="tax">
						${{Cart::tax()}}
						</span>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<div class="m-text21 w-size20 w-full-sm total_total">
						<span class="total">
							${{Cart::total()}}
						</span>
					</div>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<a href="{{ route('method.checkout') }}">
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Proceed to Checkout
						</button>
					</a>
				</div>
			</div>
		</div>
	</section>

	@else
	<div class="empty-cart">
		<h1 style="text-align: center; padding:100px">Please add new products</h1>
	</div>

	@endif

	<div class="empty-cart">
	</div>
@stop
