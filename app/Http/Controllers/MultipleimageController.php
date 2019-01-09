<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MultipleimageController extends Controller
{

      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Product  $product
       * @return \Illuminate\Http\Response
       */
      public function destroy(Request $request)
      {
          DB::table('images')->where('id', $request->id)->delete();

          return response()->json(['success' => true]);
      }


}
