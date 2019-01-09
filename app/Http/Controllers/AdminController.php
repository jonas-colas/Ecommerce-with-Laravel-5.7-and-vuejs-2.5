<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Validator;
use Hash;
use Auth;
class AdminController extends Controller
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
      $admins = Admin::where('id', '!=', Auth::user()->id)->get();

      return view('adminpanel.admin-manage', ['admins' =>  $admins]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.admin-create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //if input file is not empty then request only the following inputs
      $validator = Validator::make($request->all(),[
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'job_title' => 'required',
        'password' => 'required|string|min:6|confirmed',
      ]);

      //if validator passes then store the inputs
      if($validator->passes())
      {

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->job_title = $request->job_title;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', 'Your new admin has been successfully inserted');
      }

      return back()->withErrors($validator->errors()->all());
    }

}
