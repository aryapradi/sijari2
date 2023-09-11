<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\User;
use App\Models\Caleg;
use App\Models\Partai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Partai::all();
        $caleg = Caleg::all();
        $dpt = Dpt::all();
        $user = User::all();
        // Logika dan data tampilan dashboard di sini
        return view('home',compact('data','caleg','dpt','user')); // Gantilah 'dashboard.index' dengan nama view yang sesuai
    }
}
