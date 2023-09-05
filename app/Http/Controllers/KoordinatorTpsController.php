<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoordinatorTpsController extends Controller
{

    public function koordinatortps()
    {
        
        return view('page.KoorTps.table');
    }

    public function create_koortps()
    {
        return view('page.KoorTps.form');
    }
}
