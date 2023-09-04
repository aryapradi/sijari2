<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoordinatorTpsController extends Controller
{

    public function koordinatortps()
    {
        
        return view('page.Koordinator Tps.table');
    }
}
