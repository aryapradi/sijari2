<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\User;
use App\Models\Caleg;
use App\Models\Partai;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        $data = Partai::all();
        $caleg = Caleg::all();
        $dpt = Dpt::all();
        $user = User::all();

        return view('home', compact('data','caleg','dpt','user'));
        
    }

    public function adminHome()
    {
        return view('adminHome');
    }
}
