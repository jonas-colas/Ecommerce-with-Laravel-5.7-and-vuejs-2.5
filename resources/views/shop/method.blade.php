@extends('shop.includes.header')

@section('title', 'About')

@section('main_content')

<div class="container">
  <div class="header-cart-buttons" style="margin-top:200px; margin-bottom:200px;">
    <div class="header-cart-wrapbtn" class="col-6">
      <!-- Button -->
      <a href="{{ route('checkout.cart' , ['method' => 'visit_shop']) }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
        Visit the shop
      </a>
    </div>

    <div class="header-cart-wrapbtn " class="col-6">
      <!-- Button -->
      <a href="{{ route('checkout.cart' , ['method' => 'pay']) }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 ">
        Pay by credit card
      </a>
    </div>
  </div>
</div>

@stop
