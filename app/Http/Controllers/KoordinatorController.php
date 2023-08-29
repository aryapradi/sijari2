<?php

namespace App\Http\Controllers;

use App\Models\Caleg;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Koordinator;
use Illuminate\Http\Request;

class KoordinatorController extends Controller
{
    public function koordinator()
    {
        $data = Koordinator::all();
        return view('page.Koordinator.table', compact('data'));
    }
    
    public function create_koordinator()
    {
        $caleg = Caleg::all();
        $provinsis = Province::all();
        $kabupatens = Regency::all(); 
        $kecamatans = District::all();
        $desas = Village::all();
        return view('page.Koordinator.form', compact('caleg','provinsis','kabupatens','kecamatans','desas'));
    }


    public function store_koordinator(Request $request)
    {
        Koordinator::create($request->all());
        // dd($request);
        $request->validate([
            'nama_koordinator' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string|min:8',
            'caleg_id' => 'required',
        ]);

        // Simpan data koordinator ke database
        $koordinator = new Koordinator([
            'nama_koordinator'=> $request->nama_koordinator,
            'username' => $request->username,
            'password' => $request->password, // Nilai plaintext
            'caleg_id' => $request->caleg_id,

        ]);

        return redirect()->route('koordinator', [
            'koordinator' => $koordinator,
        ])->with('success', 'Data Berhasil Ditambah');
    }

    // public function getProvinsiOptions()
    // {
    //     $provinsis = Province::all();
    //     return response()->json($provinsis);
    // }

    // public function getKabupatenOptions($id_provinsi)
    // {
    //     $kabupatens = Regency::where('provinsi_id', $id_provinsi)->get();
    //     return response()->json($kabupatens);
    // }

    // public function getKecamatanOptions($id_kabupaten)
    // {
    //     $kecamatans = District::where('kabupaten_id', $id_kabupaten)->get();
    //     return response()->json($kecamatans);
    // }

    // public function getDesaOptions($id_kecamatan)
    // {
    //     $desas = Village::where('kecamatan_id', $id_kecamatan)->get();
    //     return response()->json($desas);
    // }

    public function edit_koordinator($id)   
    {
        $data = Koordinator::findOrFail($id);
        $caleg = Caleg::all();
        
        return view('', compact('data', 'caleg'));
    }

    public function update_Caleg(Request $request, $id)
    {
        $data = Koordinator::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('koordinator')->with('success', 'Anda Berhasil Mengubah Pada Data  ' . $data->nama_caleg );
    }

    public function hapus_Caleg($id)
    {
        $data = Koordinator::find($id);
        
        if ($data) {
            $namaKoor = $data->nama_koordinator;
            $data->delete();
            return redirect()->route('koordinator')->with('success', 'Data ' . $namaKoor . ' Berhasil dihapus');
        } else {
            return redirect()->route('koordinator')->with('error', 'Data Caleg tidak ditemukan.');
        }  
    }
}
