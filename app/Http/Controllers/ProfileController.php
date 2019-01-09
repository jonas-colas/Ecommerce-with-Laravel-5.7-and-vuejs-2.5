<?php

namespace App\Http\Controllers;
use Auth;
use App\Order;
use App\Wish;
use App\Product;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
      if($id == Auth::user()->id){

        $wishlists = Wish::with('products')->where('user_id', $id)->get();

        $orders = Order::with(['products' => function($query) {
          $query->with('featureimage');
        }])->where('user_id', $id)->get();

       return view('profile', ['orders' => $orders, 'wishlists' => $wishlists]);
      }

      return redirect()->route('index.landing');

    }
}
