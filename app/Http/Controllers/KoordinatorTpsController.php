<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Saksi;
use App\Models\Koordinator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class KoordinatorTpsController extends Controller
{

    public function koordinatortps(Request $request)
    {
        $search = $request->input('search');
        if(!empty($search)) {
            $saksiData = Saksi::where('nama','like','%' . $search . '%')
            ->orWhere('tps', 'like', '%' . $search . '%')
            ->paginate(5);
        }else{
            $saksiData = Saksi::paginate(5);
        }

        
    public function front_koordinatortps()
    {
        $idkoor = Auth::guard('koordinator')->user()->id;
        $saksiData = Saksi::where('koor_id', $idkoor)->paginate(6);
        return view('frontpage.KoorTps.table',compact('saksiData'));
    }

    public function koordinatortps()
    {
        $saksi = Saksi::first();
        $idadmin = Auth::guard('user')->user();
        if ($saksi == null) {
            $saksiData = Saksi::paginate(6);
        } else {
            $saksiData = Saksi::whereHas('koordinator.admin', function ($query) use ($idadmin) {
                $query->where('id', $idadmin->id);
            })->paginate(6);
        }
        return view('page.KoorTps.table',compact('saksiData'));
    }



    public function jadikan_koorTps(Request $request)
    {
        // dd($request)/\;
        $idkoor = Auth::guard('koordinator')->user()->id;
        $username = $request->username;
        $password = Hash::make($request->input('password'));
        $noTlpn = $request->NoTlpn;
        $dpt = Dpt::findOrFail($request->saksiId);

        // Membuat entri baru dalam tabel saksi dengan data dari DPT
        $saksi = new Saksi();
        $saksi->koor_id = $idkoor;
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
        return redirect('/KoorTPS');
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
        
        return view('frontpage.KoorTps.edit', compact('data'));
    }

    public function update_koortps(Request $request, $id)
    {
        $data = Saksi::findOrFail($id);
        $data->update($request->all());
        return redirect('/KoorTps')->with('success', 'Data updated successfully.');
    }

    public function hapus_koortps($id)
    {
        $data = Saksi::findOrFail($id);
        $data->delete();
    
        return redirect('/KoorTPS')->with('success',  'Data ' . $data->nama. ' Berhasil dihapus');
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
