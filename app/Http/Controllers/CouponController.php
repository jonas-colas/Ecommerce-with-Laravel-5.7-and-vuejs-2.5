<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Jobs\UpdateCoupon;
use Validator;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $coupons = Coupon::all();

      return view('adminpanel.coupon-manage', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('adminpanel.coupon-create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //if input file is not empty then request only the following inputs
      $validator = Validator::make($request->all(),[
        'code' => 'required',
        'value' => 'required',
      ]);

      if($validator->passes()) {
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        $coupon->save();

        return back()->with('success', 'Your new coupon has been successfully inserted');

      }

      return back()->withErrors($validator->errors()->all());

    }

    /**
     * Check if the coupon exists.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->value
        ]);

        return back()->with('success', 'Coupon has been applied!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::where('id', $id)->delete();

        return redirect()->back();
    }

    /**
     * forget if its used
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function forget()
    {
      session()->forget('coupon');

      return back()->with('success', 'Coupon has been removed.');
    }
}
