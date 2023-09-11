<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
      return view('auth.login');
    }
    public function admin_login()
    {
      return view('auth.admin_login');
    }

    public function postlogin(Request $request)
    {
      // dd($request);
      // dd(Auth::guard('saksi')->attempt(['username'=>$request->email, 'password' => $request->password]));
      if(Auth::guard('user')->attempt(['email'=>$request->email, 'password' => $request->password])){
        return redirect('/DataDPT');
      }elseif(Auth::guard('koordinator')->attempt(['username'=>$request->email, 'password' => $request->password])){
        return redirect('/ListDPT');
      }elseif(Auth::guard('saksi')->attempt(['username'=>$request->email,'password' => $request->password])) {
        return redirect('/ListPemilih');
      }
      return redirect('/login');
    }

    public function logout()
    {
      if(Auth::guard('user')->check()){
        Auth::guard('user')->logout();
        return redirect('/admin_login');
      }elseif(Auth::guard('koordinator')->check()){
        Auth::guard('koordinator')->logout();
        return redirect('/login');
      }elseif(Auth::guard('saksi')->check()){
        Auth::guard('saksi')->logout();
        return redirect('/login');
      }
      
    }
}
