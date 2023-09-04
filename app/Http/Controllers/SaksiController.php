<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use Illuminate\Http\Request;

class SaksiController extends Controller
{
    public function saksi(){
        return view('page.Saksi.table');
    }

    public function jadikan_saksi(Request $request)
    {
        $saksi = Dpt::findOrFail($request->saksiId);
        
        dd($saksi->nama);
    }
}
