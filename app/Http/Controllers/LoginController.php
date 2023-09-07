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
      if(Auth::guard('koordinator')->attempt(['username'=>$request->username, 'password' => $request->password])){
        return redirect('/');
      }elseif(Auth::guard('saksi')->attempt(['username'=>$request->username,'password' => $request->password])) {
        return redirect('/');
      }
      return redirect('/login');
    }
}
