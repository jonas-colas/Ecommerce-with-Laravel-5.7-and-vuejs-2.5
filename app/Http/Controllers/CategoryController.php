<?php

namespace App\Http\Controllers;

use App\Category;
use Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::paginate('20');

      return view('adminpanel.category-manage', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('adminpanel.category-create');

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
        'category' => 'required'
      ]);

      //if validator passes then store the inputs
      if($validator->passes())
      {
        $category = new Category;
        $category->name = $request->category;
        $category->save();

        return back()->with('success', 'Your category has been successfully inserted');
      }

      return back()->withErrors($validator->errors()->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::find($id);

      return view('adminpanel.category-edit', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //if input file is not empty then request only the following inputs
      $validator = Validator::make($request->all(),[
        'category' => 'required'
      ]);

      //if validator passes then store the inputs
      if($validator->passes())
      {
        //find post by id and updated
        $category = Category::findOrFail($id);
        $category->name = $request->category;
        $category->save();

        return back()->with('success', 'Your category has been successfully updated');
      }

      return back()->withErrors($validator->errors()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Category::where('id', $request->category_id)->delete();
    }
}
