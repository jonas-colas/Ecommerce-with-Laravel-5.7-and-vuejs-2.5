@extends('shop.includes.header')

@section('title', 'Checkout')

@section('main_content')

<script src="https://js.stripe.com/v3/"></script>
    <div class="container">
        <h1 class="m-text23 p-t-56 p-b-34">Checkout</h1>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store', ['method' => $method]) }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <h2 class="m-text23 p-t-56 p-b-34">Billing Details</h2><hr>

                    <label for="email" class="s-text18 w-size19 w-full-sm">Email Address</label>
                    <div class="pos-relative bo11 of-hidden">
                        <input type="email" class="s-text7 size16 p-l-23 p-r-50" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                    </div><br>

                    <label for="name" class="s-text18 w-size19 w-full-sm">Name</label>
                    <div class="pos-relative bo11 of-hidden">
                        <input type="text" class="s-text7 size16 p-l-23 p-r-50" id="name" name="name" value="{{ old('name') }}" required>
                    </div><br>

                    <label for="address" class="s-text18 w-size19 w-full-sm">Address</label>
                    <div class="pos-relative bo11 of-hidden">
                        <input type="text" class="s-text7 size16 p-l-23 p-r-50" id="address" name="address" value="{{ old('address') }}" required>
                    </div><br>

                    <div class="half-form">
                        <label for="city" class="s-text18 w-size19 w-full-sm">City</label>
                        <div class="pos-relative bo11 of-hidden">
                            <input type="text" class="s-text7 size16 p-l-23 p-r-50" id="city" name="city" value="{{ old('city') }}" required>
                        </div><br>

                        <label for="province" class="s-text18 w-size19 w-full-sm">Province</label>
                        <div class="pos-relative bo11 of-hidden">
                            <input type="text" class="s-text7 size16 p-l-23 p-r-50" id="province" name="province" value="{{ old('province') }}" required>
                        </div><br>

                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <label for="postalcode" class="s-text18 w-size19 w-full-sm">Postal Code</label>
                        <div class="pos-relative bo11 of-hidden">
                            <input type="text" class="s-text7 size16 p-l-23 p-r-50" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                        </div><br>

                        <label for="phone" class="s-text18 w-size19 w-full-sm">Phone</label>
                        <div class="pos-relative bo11 of-hidden">
                            <input type="number" class="s-text7 size16 p-l-23 p-r-50" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div><br>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    @if($method === 'pay')
                      <h2 class="m-text23 p-t-56 p-b-34">Payment Details</h2><br>

                      <label for="name_on_card" class="s-text18 w-size19 w-full-sm">Name on Card</label>
                      <div class="pos-relative bo11 of-hidden">
                          <input type="text" class="s-text7 size16 p-l-23 p-r-50" id="name_on_card" name="name_on_card" value="">
                      </div><br>

                      <label for="card-element" class="s-text18 w-size19 w-full-sm">Credit or debit card</label>
                      <div class="form-group">
                          <div id="card-element">
                            <!-- a Stripe Element will be inserted here. -->
                          </div>

                          <!-- Used to display form errors -->
                          <div id="card-errors" role="alert"></div>
                      </div>
                      <div class="spacer"></div><br>

                      <div class="size15 trans-0-4">
                        <!-- Button -->
                          <button type="submit" id="complete-order" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 submit">
                            Proceed to Checkout
                          </button>
                      </div>
                    @elseif($method === 'visit_shop')
                      <button type="submit" id="complete-order" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 download">
                        Proceed to Checkout
                      </button>
                    @endif
                </form>
            </div>



            <div class="checkout-table-container">
                <h2 class="m-text23 p-t-56 p-b-34">Your Order</h2><hr>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <li class="header-cart-item product product-{{$item->model->id}}">
    									<div class="header-cart-item-img">
      									<img src="/storage/product_feature_images/{{$item->model->featureimage->featureimage}}" alt="IMG">
    									</div>

    									<div class="header-cart-item-txt">
                        <a href="{{ route('show.shop', ['id' => $item->model->id])}}">
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
                </div> <!-- end checkout-table --><br><hr>

                <div class="flex-w flex-sb-m">
                  <div class="flex-w flex-m w-full-sm">
                    <form action="{{ route('check.coupon') }}" method="post">
                      <div class="size11 bo4 m-r-10">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon_code" placeholder="Coupon Code">
                      </div>

                      <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                        <!-- Button -->
                        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                          Apply coupon
                        </button>
                      </div>
                    @csrf
                    </form>
                  </div>
                </div><hr>

                <!-- Total -->
                @if (session()->has('coupon'))

                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">

                  <h5 class="m-text20 p-b-24">
                    Cart Totals
                  </h5>

                  <!--  -->
                  <div class="flex-w flex-sb-m p-b-12">
                    @if (session()->has('coupon'))
                    <span class="s-text18 w-size19 w-full-sm">
                      Code:
                    </span>

                    <div class="m-text21 w-size20 w-full-sm sub_total">
                      <span class="subtotal">
                        ({{ session()->get('coupon')['name'] }})
                      </span>
                    </div>

                    <form action="{{route('forget.coupon')}}" method="get">
                      <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                        <!-- Button -->
                        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                          Remove coupon
                        </button>
                      </div>
                    @csrf
                    </form>
                    @endif
                  </div><hr>

                  <!--  -->
                  <div class="flex-w flex-sb-m p-b-12">
                    <span class="s-text18 w-size19 w-full-sm">
                    </span>
                    <div class="m-text21 w-size20 w-full-sm sub_total">
                      <span class="subtotal">
                          $ {{ Cart::subtotal() }} (Old subtotal) <br>
                          @if (session()->has('coupon'))
                              - <br>
                            $ {{$discount }} (Discount)<br>
                              <hr>
                          @endif
                      </span>
                    </div>
                  </div>

                  <div class="flex-w flex-sb-m p-b-12">
                    <span class="s-text18 w-size19 w-full-sm">
                      Subtotal:
                    </span>

                    <div class="m-text21 w-size20 w-full-sm sub_total">
                      <span class="subtotal">
                        $ {{ $newSubtotal }} <br>
                      </span>
                    </div>
                  </div>

                  <div class="flex-w flex-sb-m p-b-12">
                    <span class="s-text18 w-size19 w-full-sm">
                      New tax:
                    </span>

                    <div class="m-text21 w-size20 w-full-sm tax_total">
                      <span class="tax">
                      $ {{ $newTax }}
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
                        ${{ $newTotal }}
                      </span>
                    </div>
                  </div>
                </div>
              @else
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
                </div><hr>

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
              </div>
              @endif
            </div>

        </div> <!-- end checkout-section -->
    </div>

<script>
    (function(){
        // Create a Stripe client
        var stripe = Stripe('pk_test_1qNBK7rnrRoqQHUVZaBLwwm5');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
          base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
              color: '#aab7c4'
            }
          },
          invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
          }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {
            style: style,
            hidePostalCode: true
        });

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
          var displayError = document.getElementById('card-errors');
          if (event.error) {
            displayError.textContent = event.error.message;
          } else {
            displayError.textContent = '';
          }
        });

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
          event.preventDefault();

          // Disable the submit button to prevent repeated clicks
          document.getElementById('complete-order').disabled = true;

          var options = {
            name: document.getElementById('name_on_card').value,
            address_line1: document.getElementById('address').value,
            address_city: document.getElementById('city').value,
            address_state: document.getElementById('province').value,
            address_zip: document.getElementById('postalcode').value
          }

          stripe.createToken(card, options).then(function(result) {
            if (result.error) {
              // Inform the user if there was an error
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;

              // Enable the submit button
              document.getElementById('complete-order').disabled = false;
            } else {
              // Send the token to your server
              stripeTokenHandler(result.token);
            }
          });
        });

        function stripeTokenHandler(token) {
          // Insert the token ID into the form so it gets submitted to the server
          var form = document.getElementById('payment-form');
          var hiddenInput = document.createElement('input');
          hiddenInput.setAttribute('type', 'hidden');
          hiddenInput.setAttribute('name', 'stripeToken');
          hiddenInput.setAttribute('value', token.id);
          form.appendChild(hiddenInput);

          // Submit the form
          form.submit();
        }
    })();
</script>
@stop
