<?php

namespace App\Http\Controllers;

use App\Models\Caleg;
use App\Models\Partai;
use App\Models\Koordinator;
use Illuminate\Http\Request;

class CalegController extends Controller
{
    public function caleg()
    {
        $data = Caleg::all();
        $koordinator = Koordinator::all();
        return view('page.Caleg.table', compact('data','koordinator'));
    }
    
    public function create_Caleg()
    {
        $partai = Partai::first();
        return view('page.Caleg.form', compact('partai'));
    }

    public function store_Caleg(Request $request)
    {
        Caleg::create($request->all());
        return redirect()->route('caleg')->with('success', ' Data Berhasil Di Tambah ');
    }

    public function edit_Caleg($id)   
    {
        $data = Caleg::findOrFail($id);
        $partai = Partai::all();
        
        return view('page.Caleg.edit', compact('data', 'partai'));
    }

    public function update_Caleg(Request $request, $id)
    {
        $data = Caleg::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('caleg')->with('success', 'Anda Berhasil Mengubah Pada Data  ' . $data->nama_caleg );
    }

    public function hapus_Caleg($id)
    {
        $data = Caleg::find($id);
        
        if ($data) {
            $namaCaleg = $data->nama_caleg;
            $data->delete();
            return redirect()->route('caleg')->with('success', 'Data ' . $namaCaleg . ' Berhasil dihapus');
        } else {
            return redirect()->route('caleg')->with('error', 'Data Caleg tidak ditemukan.');
        }  
    }
}
