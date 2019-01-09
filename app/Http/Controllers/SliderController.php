<?php

namespace App\Http\Controllers;

use App\Slider;
use Validator;
use DB;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sliders = Slider::get();

      return view('adminpanel.slider-manage', ['sliders' =>  $sliders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('adminpanel.slider-create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'multipleimage' => 'required',
        'multipleimage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'small_title' => 'required',
        'big_title' => 'required'
      ]);

      //if validator passes then store the inputs
      if($validator->passes())
      {
        //store multiple images
        foreach($request->file('multipleimage') as $image)
        {
            $name=$image->getClientOriginalName();
            $image->move('storage/product_sliders/', $name);
            DB::table('sliders')->insert(['images' => $name, 'small_title' => $request->small_title, 'big_title' => $request->big_title]);
        }
        return back()->with('success', 'Your new slider has been successfully inserted');

      }
      return back()->withErrors($validator->errors()->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      DB::table('sliders')->where('id', $request->id)->delete();

      return response()->json(['success' => true]);
    }
}
