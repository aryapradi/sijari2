<?php

namespace App\Http\Controllers;

use App\Models\Caleg;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Koordinator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KoordinatorController extends Controller
{
    public function koordinator()
    {
        $data = Koordinator::with(['villages','districts','regencies','provinces', 'caleg'])->paginate();
        $provinsis = Province::all(); // Mengambil semua data provinsi
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();

       return view('page.Koordinator.table', compact('data','provinsis', 'regencies', 'districts', 'villages'));
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
        $data = new Koordinator();
        $data->nama_koordinator = $request->input('nama_koordinator'); // Isi kolom yang dibutuhkan
        $data->username = $request->input('username');
        $data->password = Hash::make($request->input('password'));

        Koordinator::create($request->all());
        return redirect()->route('koordinator')->with('success', 'Data Berhasil Ditambah');

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

        return redirect()->route('koordinator')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit_koordinator($id)   
    {
        $data = Koordinator::findOrFail($id);
        $caleg = Caleg::all();
        $provinsis = Province::all(); // Mengambil semua data provinsi
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        
        return view('page.Koordinator.edit', compact('data', 'caleg','provinsis', 'regencies', 'districts', 'villages'));
    }

    public function update_koordinator(Request $request, $id)
    {
        // dd($request);
        $data = Koordinator::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('koordinator')->with('success', 'Data updated successfully.');
    }

    public function hapus_koordinator($id)
    {
        $koordinator = Koordinator::findOrFail($id);
        $koordinator->delete();
    
        return redirect()->route('koordinator')
            ->with('success', 'Data Koordinator telah dihapus.');
    }
}
