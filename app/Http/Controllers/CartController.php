<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller

{

    public function index()
    {
      return view('shop.cart');
    }


    public function store(Request $request)
    {

      $cart = Cart::add($request->product_id, $request->product_title, $request->product_qty, $request->product_price,['image' => $request->product_featureimage]);

      $cart->associate('App\Product');

      return response()->json(['cart' => $cart, 'cart_count' => Cart::instance('default')->count(), 'cart_total' => Cart::subtotal()]);

    }

    public function destroy(Request $request)
    {
        Cart::remove($request->rowId);
        return response()->json(['success' => true, 'cart_count' => Cart::instance('default')->count(), 'cart_sub_total' => Cart::subtotal(), 'cart_tax' => Cart::tax(), 'cart_total' => Cart::total()]);

    }

    public function update(Request $request)
    {
      $cart = Cart::update($request->product_rowid, $request->value);
      return response()->json(['success' => true, 'cart_count' => Cart::instance('default')->count(), 'cart_sub_total' => Cart::subtotal(), 'cart_tax' => Cart::tax(), 'cart_total' => Cart::total(), 'cart' => $cart]);
    }
}
