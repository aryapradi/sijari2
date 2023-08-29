<?php

namespace App\Http\Controllers;

use App\Models\Partai;
use Illuminate\Http\Request;

class PartaiController extends Controller
{
    public function partai()
    {
        $data = Partai::all();
        return view('page.Partai.table', compact('data'));
    }

    public function create_partai()
    {
        return view('page.Partai.form');
    }
    
    public function store_partai(Request $request)
    {
        Partai::create($request->all());
        return redirect()->route('partai')->with('success','Data Berhasil Di Tambah');;
    }

    public function edit_partai($id)
    {
        $data = Partai::find($id);
        // dd($data->id);
        return view('page.Partai.edit', compact('data'));
    }
    
    public function update_partai(Request $request, $id)
    {
        // $data = Partai::find($id);
        // $data->update($request->all());
        // return redirect()->route('partai')->with('success','Data Berhasil Di Ubah');


         $data = Partai::find($id); // Data sebelum pengeditan// Menympan salinan data lama sebelum diperbarui
         $dataLama = clone $data;
         $data->update($request->all());

         return redirect()->route('partai')->with('success', 'Partai ' . $dataLama->nama_partai . ' berhasil diubah.  Menjadi: ' . $data->nama_partai);

    }
    
    public function hapus_partai($id)
    {
        $data = Partai::find($id);
        
        if ($data !== null) {
         $data->delete();
           return redirect()->route('partai')->with('success', ' Data '.  $data->nama_partai . ' Berhasil Di hapus');
        } else {
           return redirect()->route('partai')->with('error', 'Data partai tidak ditemukan.');
        }  
    }
    
    
}
