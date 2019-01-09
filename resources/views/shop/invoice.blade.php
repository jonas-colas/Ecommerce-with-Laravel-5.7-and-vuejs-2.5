<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice for {{Auth::user()->name}}</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('css/shop/pdf.css') !!}">
  </head>

  <body>

    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{Auth::user()->name}}</h2>
          <div class="address">{{$order->billing_address}}</div>
          <div class="email">>{{$order->billing_email}}</div>
        </div>
        <div id="invoice">
          <h1>INVOICE 3-2-1</h1>
          <div class="date">Date of Invoice: {{$order->created_at}}</div>
          <div class="date">Due Date: 30/06/2014</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desc">Title</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->products as $product)
          <tr>
            <td class="desc">{{$product->title}}</td>
            <td class="unit">${{$product->price}}</td>
            <td class="qty">{{$product->pivot->quantity}}</td>
            <td class="total">$({{$product->pivot->quantity}} * {{$product->price}})</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>${{$order->billing_subtotal}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 20%</td>
            <td>${{$order->billing_tax}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>${{$order->billing_total}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>

  </body>
</html>
