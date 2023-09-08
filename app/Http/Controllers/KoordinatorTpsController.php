<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Saksi;
use App\Models\Koordinator;
use Illuminate\Http\Request;

class KoordinatorTpsController extends Controller
{

    public function koordinatortps()
    {
        $saksiData = Saksi::all(); 
        if($user->role == 1){
            $data = Koordinator::with(['villages','districts','regencies','provinces', 'caleg'])->paginate();
        }else{
            $data = Koordinator::where('admin_id', $user->id)->with(['villages','districts','regencies','provinces', 'caleg'])->paginate();
        };
        // d
        return view('page.KoorTps.table',compact('saksiData'));
    }

    public function jadikan_koorTps(Request $request)
    {
        // dd($request)/\;
        $username = $request->username;
        $password = $request->password;
        $noTlpn = $request->NoTlpn;
        $dpt = Dpt::findOrFail($request->saksiId);

        // Membuat entri baru dalam tabel saksi dengan data dari DPT
        $saksi = new Saksi();
        $saksi->no_kk = $dpt->no_kk;
        $saksi->nik = $dpt->nik;
        $saksi->nama = $dpt->nama;
        $saksi->tempat_lahir = $dpt->tempat_lahir;
        $saksi->tanggal_lahir = $dpt->tanggal_lahir;
        $saksi->status_perkawinan = $dpt->status_perkawinan;
        $saksi->jenis_kelamin = $dpt->jenis_kelamin;
        $saksi->jalan = $dpt->jalan;
        $saksi->rt = $dpt->rt;
        $saksi->rw = $dpt->rw;
        $saksi->disabilitas = $dpt->disabilitas;
        $saksi->kota = $dpt->kota;
        $saksi->kelurahan = $dpt->kelurahan;
        $saksi->kecamatan = $dpt->kecamatan;
        $saksi->tps = $dpt->tps;
 
         // Mengisi kolom username, password, dan NoTlpn

        $saksi->dpt_id = $dpt->id; // Gantilah $dptId dengan ID DPT yang sesuai
        // Memanggil variabel $username, $password, dan $noTlpn
        $saksi->username = $username;
        $saksi->password = $password;
        $saksi->NoTlpn = $noTlpn;
        

        $saksi->save();

        // Redirect ke rute yang sesuai
        return redirect()->route('saksi');
    }

    // public function koortpsmanual()
    // {
    //     return view('page.Koordinator_Tps.form');
    // }

    // public function store_koortpsmanual(Request $request)
    // {
    //     $koortps = $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //         'NoTlpn' => 'required',       
    //         // Anda bisa menambahkan aturan validasi lainnya jika diperlukan
    //     ]);

    //     // dd($koortps);
    
    //     // Buat objek Saksi dengan data yang telah divalidasi.
    //     Saksi::create($koortps);
    
    //     return redirect()->route('saksi')->with('success', ' Data Berhasil Di Tambah ');
    // }

    public function edit_koortps($id)
    {
        $data = Saksi::findOrFail($id);
        
        return view('page.Koordinator_Tps.edit', compact('data'));
    }

    public function update_koortps(Request $request, $id)
    {
        $data = Saksi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('saksi')->with('success', 'Data updated successfully.');
    }

    public function koortps($id){
        $koorTps = Saksi::findOrFail($id);
        $koorTps->delete();
    
        return redirect()->route('saksi');
        
        return view('page.KoorTps.table');
    }

    public function create_koortps()
    {
        return view('page.KoorTps.form');
    }
}
