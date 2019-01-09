<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class wishController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $wish = DB::table('wishes')->where('product_id', $request->product_id)->first();

      if(empty($wish)){

        DB::table('wishes')->insert(['product_id' => $request->product_id, 'user_id' => Auth::user()->id]);

        DB::table('product_wish')->insert(['product_id' => $request->product_id, 'wish_id' => DB::getPdo()->lastInsertId()]);

        return redirect()->back();
      }

      return 'this product is already in your wish';
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('wishes')->where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->delete();

        return redirect()->back();
    }
}
