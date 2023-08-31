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
        $provinsis =  Province::pluck('name', 'id');
        $kabupatens = [];
        $kecamatans = [];
        $desas = [];
    
        return view('page.Koordinator.form', compact('caleg', 'provinsis', 'kabupatens', 'kecamatans', 'desas'));
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
            'province' => 'required|exists:provinces,id',
            'regency' => 'required|exists:regencies,id',
            'district' => 'required|exists:districts,id',
            'village' => 'required|exists:villages,id',
        ]);

        // Simpan data koordinator ke database
        $koordinator = new Koordinator([
            'nama_koordinator'=> $request->nama_koordinator,
            'username' => $request->username,
            'password' => $request->password, // Nilai plaintext
            'caleg_id' => $request->caleg_id,

        ]);

          // Ambil data provinsi, kabupaten, kecamatan, dan desa berdasarkan ID
          $province = Province::find($request->province);
          $regency = Regency::find($request->regency);
          $district = District::find($request->district);
          $village = Village::find($request->village);
          
            // Hubungkan relasi antara koordinator dan lokasi (provinsi, kabupaten, kecamatan, desa)
            $koordinator->province()->associate($province);
            $koordinator->regency()->associate($regency);
            $koordinator->district()->associate($district);
            $koordinator->village()->associate($village);



        return redirect()->route('koordinator', [
            'koordinator' => $koordinator,
        ])->with('success', 'Data Berhasil Ditambah');
    }

    public function getLocations(Request $request)
    {
        $selectedProvinceId = $request->input('province');
        $selectedRegencyId = $request->input('regency');
        $selectedDistrictId = $request->input('district');
    
        $regencies = [];
        $districts = [];
        $villages = [];
    
        if ($selectedProvinceId) {
            $regencies = Regency::where('province_id', $selectedProvinceId)->get();
        }
    
        if ($selectedRegencyId) {
            $districts = District::where('regency_id', $selectedRegencyId)->get();
        }
    
        if ($selectedDistrictId) {
            $villages = Village::where('district_id', $selectedDistrictId)->get();
        }
    
        return response()->json([
            'regencies' => $regencies,
            'districts' => $districts,
            'villages' => $villages
        ]);
    }

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
