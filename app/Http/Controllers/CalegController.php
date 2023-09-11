<?php


namespace App\Http\Controllers;

use App\Models\Caleg;
use App\Models\Partai;
use App\Models\Koordinator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $image = $request->file('image');
        $image->storeAs('public/caleg', $image->hashName());

        $caleg = Caleg::create([
            'image'         => $image->hashName(),
            'nama_caleg'    => $request->nama_caleg,
            'partai_id'      => $request->partai_id,
        ]);
        $caleg = $request->all();
        if($request->file('image')){
            $caleg['image'] = $request->file('image')->store('image');
        }
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

        if($request->file('image') == "") {
            $data = Caleg::find($id);
            $data->update($request->all());
        } else {
            //hapus old image
            Storage::disk('local')->delete('public/caleg/'.$data->image);
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/caleg', $image->hashName());

            $data->update([
                'image'         => $image->hashName(),
                'nama_caleg'    => $request->nama_caleg,
                'partai_id'      => $request->partai_id,
            ]);

        }

        if($data){
            //redirect dengan pesan sukses
            return redirect()->route('caleg')->with('succes', 'Data Berhasil di Edit');
        }else{
            //redirect dengan pesan error
            return redirect()->route('caleg')->with('error', 'Data Caleg tidak ditemukan.');
        }
    }

    public function hapus_Caleg($id)
    {
        $data = Caleg::find($id);
        
        if ($data) {
            Storage::disk('local')->delete('public/caleg/'.$data->image);
            $namaCaleg = $data->nama_caleg;
            $data->delete();
            return redirect()->route('caleg')->with('success', 'Data ' . $namaCaleg . ' Berhasil dihapus');
        } else {
            return redirect()->route('caleg')->with('error', 'Data Caleg tidak ditemukan.');
        }  
    }
}
