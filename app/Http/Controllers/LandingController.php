<?php

namespace App\Http\Controllers;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
      $sliders = Slider::get();
      $latest_post = Product::take('5')->inRandomOrder()->get();
      $featured = Product::where('featured', '1')->orderBy('created_at')->take('8')->inRandomOrder()->get();
      return view('shop.index', ['latest_post' => $latest_post, 'featured' => $featured, 'sliders' => $sliders]);
    }
}
