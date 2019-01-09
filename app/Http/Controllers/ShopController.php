<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Slider;
use App\wish;
use DB;
use Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{

  /**
   * Show all the product to the user with filters
   *
   * @param  \App\Shop  $shop
   * @return \Illuminate\Http\Response
   */

    public function index()
    {

      $categories = Category::all();

      $filters = Product::all();

      $sliders = Slider::orderBy('created_at', 'asc')->first();

      $products = Product::with('featureimage')->when(request()->categoryname, function ($query) {
          $query->whereHas('categories', function ($query) {
              $query->whereIn('name', request()->categoryname);
          });
        })->when(request()->resolution, function ($query) {
              return $query->whereIn('resolution', request()->resolution);
        })->when(request()->model_year, function ($query) {
              return $query->whereIn('model_year', request()->model_year);
        })->when(request()->screen_size, function ($query) {
              return $query->whereIn('screen_size', request()->screen_size);
        })->when(request()->q, function ($query) {
              return $query->where('title', 'like' , '%' .request()->q. '%');
        })->when(request()->selected, function ($query) {
            if(request()->selected === 'Price: low to high'){
              return $query->orderBy('price');
            }elseif(request()->selected === 'Price: high to low'){
              return $query->orderBy('price', 'desc');
            }elseif(request()->selected === 'Popularity'){
              return $query->orderBy('rate', 'desc');
            }
        })->get();

      if(request()->ajax()){

        return response()->json(['products' =>$products, 'categories' => $categories, 'filters' => $filters]);
      }

      return view('shop.shop', ['categories' => $categories, 'products' => $products, 'filters' => $filters, 'sliders' => $sliders]);
    }

    /**
     * Show a chosen product to the user
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

      $product = Product::find($id);

      if(!empty($product)){
        $tags = DB::table('product_tag')->where('product_id', $id)->pluck('tag_id');

        //get all posts that have tags in the the collection
        $related_products = Product::with('tags')->whereHas('tags', function ($query) use ($tags){
            $query->whereIn('id', $tags);
        })->where('id', '!=' , $id)->take('8')->get();

        if(Auth::user()){

          $wishlist = DB::table('wishes')->where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        }else{

          $wishlist = '';
        }

        return view('shop.product-detail', ['product' => $product, 'related_products' => $related_products, 'wishlist' => $wishlist]);
      }

      return redirect()->route('index.landing');

    }
}
