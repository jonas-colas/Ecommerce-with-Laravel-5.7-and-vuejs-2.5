<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;


class OrdersController extends Controller
{

  /**
   *  show all the orders for the admin
   *
   * @param  \App\Order  $orders
   * @return \Illuminate\Http\Response
   */

    public function index()
    {
      if(request()->ajax()){
        $q = request()->q;
        $orders = Order::with(['products' => function($query) {
          $query->with('featureimage');
        }])->where('random', 'like', '%' .$q. '%')->get();
        return response()->json(['orders' => $orders]);
      }
      $orders = Order::with(['products' => function($query) {
        $query->with('featureimage');
      }])->get();
      return view('adminpanel.orders', ['orders' => $orders, 'type' => 'orders']);
    }



    /**
     * get orders of a certain status (treating, pending...)
     *
     * @param  \App\Order  $product
     * @return \Illuminate\Http\Response
     */

    public function status($status)
    {
      if(request()->ajax()){
        $q = request()->q;
        $orders = Order::with(['products' => function($query) {
          $query->with('featureimage');
        }])->where('random', 'like', '%' .$q. '%')->where('status',request()->status)->get();
        return response()->json(['orders' => $orders]);
      }
      $orders = Order::with('user')->with(['products' => function($query) {
        $query->with('featureimage');
      }])->where('status', request()->status)->get();
      return view('adminpanel.orders', ['orders' => $orders, 'type' => request()->status]);
    }


    /**
     * update status of an order and sending email and a sms for the user
     *
     * @param  \App\Order  $product
     * @return \Illuminate\Http\Response
     */

    public function update($order_id, $updates, $status)
    {

      Order::where('id', $order_id)->update(['status' => $updates]);
      $orders = Order::with(['products' => function($query) {
        $query->with('featureimage');
      }])->where('status', $status)->get();

      $order = Order::where('id', $order_id)->first();

      if($status != 'problem' or $status != 'pending')
      {
        Mail::send(new OrderPlaced($order, $updates));

        //send sms to your client
        //Nexmo::message()->send([
        //    'to'   => '212'.$order->billing_phone,
        //    'from' => 'Abdelmoughit',
        //    'text' => 'We want to inform you that your order is now under status of '.$updates,
        //]);
      }

      return response()->json(['orders' => $orders, 'order' => $order]);
    }


    /**
     * In case of a problem the admin will refund the user
     *
     * @param  \App\Order  $product
     * @return \Illuminate\Http\Response
     */

    public function refund(Request $request,$resource)
    {

      try {
          $refund = Stripe::refunds()->create($resource);

          Order::where('source', $resource)->update(['status' => 'refunded']);

          $orders = Order::with('user')->with(['products' => function($query) {
            $query->with('featureimage');
          }])->where('status', 'problem')->get();

          $order = Order::where('source', $resource)->first();
          $status = 'refund';
          Mail::send(new OrderPlaced($order, $status));

          Nexmo::message()->send([
              'to'   => '212'.$order->billing_phone,
              'from' => 'Abdelmoughit',
              'text' => 'We are terribly sorry to inform you that we refunded your money because we faced a problem in your order. we hope that you will understand',
          ]);

          return response()->json(['orders' => $orders]);

      } catch (CardErrorException $e) {
          return Response::json('Error! ' . $e->getMessage());
      }
    }

}
