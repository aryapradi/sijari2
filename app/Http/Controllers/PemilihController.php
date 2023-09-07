<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Pemilih;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    public function pemilih()
    {
        $dataPemilih = Pemilih::all(); // Mengambil semua data dari tabel pemilih
        return view('page.Pemilih.table',compact('dataPemilih'));
    }

    public function jadikan_pemilih(Request $request)
    {
        
        // dd($request);
        $noTlpn = $request->NoTlpn;
        $dpt = Dpt::find($request->pemilihId);
        // Membuat entri baru dalam tabel saksi dengan data dari DPT
        $pemilih = new Pemilih();
        $pemilih->no_kk = $dpt->no_kk;
        $pemilih->nik = $dpt->nik;
        $pemilih->nama = $dpt->nama;
        $pemilih->tempat_lahir = $dpt->tempat_lahir;
        $pemilih->tanggal_lahir = $dpt->tanggal_lahir;
        $pemilih->status_perkawinan = $dpt->status_perkawinan;
        $pemilih->jenis_kelamin = $dpt->jenis_kelamin;
        $pemilih->jalan = $dpt->jalan;
        $pemilih->rt = $dpt->rt;
        $pemilih->rw = $dpt->rw;
        $pemilih->disabilitas = $dpt->disabilitas;
        $pemilih->kota = $dpt->kota;
        $pemilih->kelurahan = $dpt->kelurahan;
        $pemilih->kecamatan = $dpt->kecamatan;
        $pemilih->tps = $dpt->tps;

        $pemilih->dpt_id = $dpt->id; // Gantilah $dptId dengan ID DPT yang sesuai
        $pemilih->NoTlpn = $noTlpn;
        
          $pemilih->save();
  
          // Redirect ke rute yang sesuai
          return redirect()->route('pemilih');
    }

    public function edit_pemilih($id)
    {
        $data = Pemilih::findOrFail($id);
        
        return view('page.Pemilih.edit', compact('data'));
    }

    public function update_pemilih(Request $request, $id)
    {
        $data = Pemilih::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('pemilih')->with('success', 'Data updated successfully.');
    }


    public function hapus_pemilih($id){
        $pemilih = Pemilih::findOrFail($id);
        $pemilih->delete();
    
        return redirect()->route('pemilih');
    }
}
