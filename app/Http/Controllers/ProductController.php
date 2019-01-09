<?php

namespace App\Http\Controllers;

use App\Product;
use Validator;
use App\Tag;
use DB;
use Illuminate\Http\Request;
use File;
use Spatie\ImageOptimizer\OptimizerChainFactory;
class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $query = $request->q;

      if($query != ''){

        $products = Product::where('title', 'like', '%' .$query. '%')->get();

      }else{
        $products = Product::get();

      }

      if($request->ajax())
      {

        return response()->json(['products' =>$products]);
      }

      return view('adminpanel.post-manage', ['products' =>  $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.post-create');
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
        'title' => 'required|unique:products',
        'short_description' => 'required',
        'description' => 'required',
        'screen_size' => 'required',
        'item_dimensions' => 'required',
        'screen_weight' => 'required',
        'model_year' => 'required',
        'resolution' => 'required',
        'total_hdmi_ports' => 'required',
        'price' => 'required',
        'featureimage' => 'required',
        'category' => 'required',
        'tags' => 'required',
        'multipleimage' => 'required',
        'multipleimage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);

      //if validator passes then store the inputs
      if($validator->passes())
      {
        $data = $request->all();
        $product = Product::create($data);

        //store category_id and post_id in pivote table category_post
        foreach ($request->input('category') as $id) {
          DB::table('category_product')->insert(['category_id' => $id, 'product_id' =>$product->id]);
        }

        //store tag names
        foreach ($request->input('tags') as $tagname) {
          $tag_name = Tag::where('name', $tagname)->first();
          //test if the giving tag name exsits in table
          if($tag_name != ''){
          //if yes then inset tag_id and post_id in pivote table post_tag
            DB::table('product_tag')->insert(['product_id' =>$product->id, 'tag_id' => $tag_name->id]);
          }else{
            //if not then insert the new tag name in tag table
            $tag = DB::table('tags')->insert(['name' => $tagname]);
            $tag_id = DB::getPdo()->lastInsertId();
            //and then inserted the new created id of the tag in pivote table post_tag
            DB::table('product_tag')->insert(['product_id' =>$product->id, 'tag_id' => $tag_id]);
          }
        }
        //store feature image
        $featureimage = $request->file('featureimage');
        $file_name = $featureimage->getClientOriginalName();
        $path = $featureimage->move('storage/product_feature_images/', $file_name);
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize('storage/product_feature_images/'.$file_name);
        DB::table('featureimages')->insert(['featureimage' => $file_name, 'product_id' =>$product->id ]);

        //store multiple images
        foreach($request->file('multipleimage') as $image)
        {
          $name=$image->getClientOriginalName();
          $image->move('storage/product_images/', $name);
          DB::table('images')->insert(['images' => $name, 'product_id' =>$product->id]);
        }
        return back()->with('success', 'Your new product has been successfully inserted');
      }
      return back()->withErrors($validator->errors()->all());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::where('id',$id)->first();
      if($product){
        $post_tags = Tag::with('products')->whereHas('products', function ($query) use($id) {
                  $query->where('id', $id);
              })->get();
        return view('adminpanel.post-edit', ['product' => $product, 'product_tags' => $post_tags]);
      }
      return redirect()->route('index.product');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //if input file is not empty then request only the following inputs
      $validator = Validator::make($request->all(),[
        'title' => 'required',
        'description' => 'required',
        'screen_size' => 'required',
        'item_dimensions' => 'required',
        'screen_weight' => 'required',
        'model_year' => 'required',
        'resolution' => 'required',
        'total_hdmi_ports' => 'required',
        'price' => 'required',
        'tags' => 'required',
      ]);

      //if validator passes then store the inputs
      if($validator->passes())
      {
        //find post by id and updated
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->item_dimensions = $request->item_dimensions;
        $product->screen_weight = $request->screen_weight;
        $product->model_year = $request->model_year;
        $product->resolution = $request->resolution;
        $product->total_hdmi_ports = $request->total_hdmi_ports;
        $product->price = $request->price;
        $product->save();

        $categoryids = $request->input('categoryid');
        if($categoryids != '') {
          //delete all pivote cateogry post from the pivote and create new ones
          CategoryPost::where('product_id', $product->id)->delete();
          foreach ($categoryids as $id) {
            DB::table('category_post')->insert(['category_id' => $id, 'product_id' => $product->id]);
          }
        }

        $tags = $request->input('tags');
        if($tags != '') {
          //delete all pivote post tag from the pivote and create new ones
          $posts = DB::table('product_tag')->where('product_id', $product->id)->delete();
          foreach ($tags as $name) {
              $tag = DB::table('tags')->insert(['name' => $name]);
              DB::table('product_tag')->insert(['tag_id' => DB::getPdo()->lastInsertId(), 'product_id' => $product->id]);
          }
        }

        if($request->featureimage != '')
        {
          //if the file input is not null then update the featureimage table with new one
          $featureimage = $request->file('featureimage');
          $file_name = $featureimage->getClientOriginalName();
          $featureimage->move('storage/product_feature_images/', $file_name);
          DB::table('featureimages')->where('product_id', $product->id)->update(['featureimage' => $file_name]);
        }

        if ($request->multipleimage != '' )
        {
          //store multiple images
          foreach($request->file('multipleimage') as $image)
          {
              $name=$image->getClientOriginalName();
              $image->move('storage/product_images/', $name);
              DB::table('images')->insert(['images' => $name, 'product_id' =>$product->id]);
          }
        }
        $countimage = DB::table('images')->where('product_id', $id)->get();

        if(empty($countimage)){
          return back()->withErrors('Multiple images is required');
        }
        return back()->with('success', 'Your new product has been successfully updated');
      }
      return back()->withErrors($validator->errors()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //delete post
        DB::table('products')->where('id', $request->product_id)->delete();

        //delete feature image
        $featureimage = DB::table('featureimages')->where('product_id', $request->product_id)->first();
        File::delete(base_path('/public/product_feature_images/'.$featureimage->featureimage));
        DB::table('featureimages')->where('product_id', $request->product_id)->delete();

        //delete multiple images
        $images = DB::table('images')->where('product_id', $request->product_id)->get();
        foreach($images as $image)
        {
          File::delete(base_path('/public/product_images/'.$image->images));
          DB::table('images')->where('id', $image->id)->get();
        }

        return response()->json(['success' => true]);
    }
}
