<?php

namespace App\Http\Controllers;

use App\Models\Caleg;
use App\Models\Partai;
use App\Models\Dpt;
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

        return view('home', compact('data','caleg','dpt'));
        
    }
}
