<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function _construct()
    {
      $this->middleware('gues:admin');
    }
    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);
      if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
      {
        return redirect()->intended(route('admin.panel'));
      }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
