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

    public function postlogin(Request $request)
    {
      // dd($request);
      (Auth::guard('user')->attempt(['email'=>$request->email, 'password' => $request->password]));
      if(Auth::guard('user')->attempt(['email'=>$request->email, 'password' => $request->password])){
        return redirect('/DataDPT');
      }elseif(Auth::guard('koordinator')->attempt(['username'=>$request->email, 'password' => $request->password])){
        return redirect('/DataKoorTPS');
      }elseif(Auth::guard('saksi')->attempt(['username'=>$request->email,'password' => $request->password])) {
        return redirect('/');
      }
      return redirect('/login');
    }
  
    public function logout()
    {
      if(Auth::guard('user')->check()){
        Auth::guard('user')->logout();
      }elseif(Auth::guard('koordinator')->check()){
        Auth::guard('koordinator')->logout();
      }elseif(Auth::guard('saksi')->check()){
        Auth::guard('saksi')->logout();
      }
      return redirect('/login');
    }
}
