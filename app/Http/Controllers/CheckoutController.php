<?php

namespace App\Http\Controllers;
use App\Order;
use App\OrderProduct;
use PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Illuminate\Http\Request;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Validator;


class CheckoutController extends Controller
{
    public function index(Request $request)
    {
      if (Cart::instance('default')->count() == 0) {
          return redirect()->route('index.shop');
      }

      if($request->method === 'pay'){
        $method = 'pay';
      }

      else{
        $method = 'visit_shop';
      }

        return view('shop.checkout')->with([
            'discount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTax' => $this->getNumbers()->get('newTax'),
            'newTotal' => $this->getNumbers()->get('newTotal'),
            'method' => $method,
        ]);
        return view('shop.checkout');

    }


    public function method()
    {
      if (Cart::instance('default')->count() == 0) {
          return redirect()->route('index.shop');
      }

          return view('shop.method');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($method, Request $request)
    {

      if(Cart::instance('default')->count() > 0)
      {
      if($method === 'pay'){
          $contents = Cart::content()->map(function ($item) {
              return $item->model->title.', '.$item->qty;
          })->values()->toJson();

          $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postalcode' => 'required',
            'phone' => 'required',
            'name_on_card' => 'required'
          ]);

          if($validator->passes()) {
            try {
                $charge = Stripe::charges()->create([
                    'amount' => $this->getNumbers()->get('newTotal') ,
                    'currency' => 'MAD',
                    'source' => $request->stripeToken,
                    'description' => 'Order',
                    'receipt_email' => $request->email,
                    'metadata' => [
                        'contents' => $contents,
                        'quantity' => Cart::instance('default')->count(),
                    ],
                ]);

                $order = $this->addToOrdersTables($request, $method, $charge['id'], null);

                $status = 'placed';

                Mail::send(new OrderPlaced($order, $status));

                //to send sms to your client
                //Nexmo::message()->send([
                //    'to'   => '212'.$request->phone,
                //    'from' => 'Abdelmoughit',
                //    'text' => 'Thanks for buying from MaTele, your order ID is:'.$order->random,
                //]);

                Cart::instance('default')->destroy();

                session()->forget('coupon');

                return redirect()->route('landingpage.thankyou');

            } catch (CardErrorException $e) {
                $this->addToOrdersTables($request, $e->getMessage());
                return back()->withErrors('Error! ' . $e->getMessage());
            }
        }
          return back()->withErrors($validator->errors()->all());

      }else{

        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'address' => 'required',
          'city' => 'required',
          'province' => 'required',
          'postalcode' => 'required',
          'phone' => 'required',
        ]);

        if($validator->passes()) {

          $order = $this->addToOrdersTables($request, $method , null, null);

          $status = 'placed';

          Mail::send(new OrderPlaced($order, $status));

          //to send sms to your client
          //Nexmo::message()->send([
          //    'to'   => '212'.$request->phone,
          //    'from' => 'Abdelmoughit',
          //    'text' => 'Thanks for buying from MaTele, your order ID is:'.$order->random,
          //]);

          $pdf = PDF::loadView('shop.invoice', ['order' => $order]);
          Cart::instance('default')->destroy();
          session()->forget('coupon');

          return $pdf->download('invoice.pdf');

        }
        return back()->withErrors($validator->errors()->all());
      }
    }

    return redirect()->back();

    }

    protected function addToOrdersTables($request, $method, $charge ,$error)
    {
        // Insert into orders table
        $order = Order::create([
            'random' => md5(time()),
            'status' => 'pending',
            'user_id' => auth()->user()->id,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' => $this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_tax' => $this->getNumbers()->get('newTax'),
            'billing_total' => $this->getNumbers()->get('newTotal'),
            'payment_gateway' => $method,
            'source' => $charge,
            'error' => $error,

        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    function getNumbers()
    {
      $subtotal =str_replace( ',', '', Cart::subtotal() );
      $tax = config('cart.tax') / 100;
      $discount = session()->get('coupon')['discount'] ?? 0;
      $code = session()->get('coupon')['name'] ?? null;
      $newSubtotal = $subtotal - $discount;
      if ($newSubtotal < 0) {
          $newSubtotal = 0;
      }
      $newTax = $newSubtotal * $tax;
      $newTotal = $newSubtotal * (1 + $tax);
      return collect([
          'tax' => $tax,
          'discount' => $discount,
          'code' => $code,
          'newSubtotal' => $newSubtotal,
          'newTax' => $newTax,
          'newTotal' => $newTotal,
      ]);
    }

}
