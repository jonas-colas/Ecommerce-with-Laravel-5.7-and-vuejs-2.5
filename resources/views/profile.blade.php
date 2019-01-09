@extends('shop.includes.header')

@section('main_content')
<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">
    <!-- Cart item -->
    <div class="container-table-cart pos-relative">
      @if(count($orders) > 0)
        <div class="wrap-table-shopping-cart bgwhite">
          <table class="table-shopping-cart">
            <tr class="table-head">
              <th class="column-1"></th>
              <th class="column-1">Product</th>
              <th class="column-1">Price</th>
              <th class="column-1">Status</th>
              <th class="column-1">Quantity</th>
              <th class="column-1">Order ID</th>
              <th class="column-1">Date</th>
            </tr>
            @foreach ($orders as $order)
              @foreach($order->products as $product)
                <tr class="table-row product-">
                  <td class="column-1">
                    <a href="{{ route('show.shop', ['id' => $product->id]) }}">
                      <div class="cart-img-product b-rad-4 o-f-hidden">
                        <img src="/storage/product_feature_images/{{$product->featureimage->featureimage}}" alt="IMG-PRODUCT">
                      </div>
                    </a>
                  </td>
                  <td class="column-1">{{$product->title}}</td>
                  <td class="column-1">${{$product->price}}</td>
                  <td class="column-1">{{$order->status}}</td>
                  <td class="column-1">{{$product->pivot->quantity}}</td>
                  <td class="column-1">{{$order->random}}</td>
                  <td class="column-1">{{$order->created_at}}</td>
                </tr>
              @endforeach
            @endforeach
          </table>
        </div>
        <hr>
      @endif

      @if(count($wishlists) > 0)
        <div class="wrap-table-shopping-cart bgwhite">
            <table class="table-shopping-cart">
              <h4>WishList</h4>
              <tr class="table-head">
                <th class="column-1"></th>
                <th class="column-1">Product</th>
                <th class="column-1">Price</th>
                <th class="column-1">Date</th>
              </tr>
              @foreach($wishlists as $wishlist)
                @foreach($wishlist->products as $product)
                  <tr class="table-row product-">
                    <td class="column-1">
                      <a href="{{ route('show.shop', ['id' => $product->id]) }}">
                        <div class="cart-img-product b-rad-4 o-f-hidden">
                          <img src="/storage/product_feature_images/{{$product->featureimage->featureimage}}" alt="IMG-PRODUCT">
                        </div>
                      </a>
                    </td>
                    <td class="column-1">{{$product->title}}</td>
                    <td class="column-1">${{$product->price}}</td>
                    <td class="column-1">{{$product->created_at}}</td>
                  </tr>
                @endforeach
              @endforeach
            </table>
        </div>
      @endif
    </div>

  </div>
</section>
@stop
