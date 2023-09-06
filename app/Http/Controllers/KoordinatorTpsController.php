<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Saksi;
use Illuminate\Http\Request;

class KoordinatorTpsController extends Controller
{

    public function koordinatortps()
    {

        $saksiData = Saksi::all();
        return view('page.KoorTps.table',compact('saksiData'));
    }

    public function jadikan_koorTps(Request $request)
    {
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


        $saksi->dpt_id = $dpt->id; // Gantilah $dptId dengan ID DPT yang sesuai

        $saksi->save();

        // Redirect ke rute yang sesuai
        return redirect()->route('saksi');
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
