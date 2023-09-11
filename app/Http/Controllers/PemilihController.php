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

          $noTlpn = $request->NoTlpn;
          $dpt = Dpt::findOrFail($request->pemilihId);

          $token = "W1bYeUWDezeDR5lFYGtPY2wF0iTsesHYIfRQqmUPvvk5wU8g1mJaiwnrypBn6oaL"; // Ganti dengan token yang sesuai
          $phone = $noTlpn;
      
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_HTTPHEADER, [
              "Authorization: $token",
              "url: https://pati.wablas.com",
          ]);
          curl_setopt($curl, CURLOPT_URL,  "https://phone.wablas.com/check-phone-number?phones=". urlencode($phone));
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      
          $result = curl_exec($curl);
          curl_close($curl);
      
          $response = json_decode($result, true);
  
          // dd($result);
      
          if ($response['status'] === 'success' && $response['data'][0]['status'] === 'online') {
              // Nomor valid dan aktif, lanjutkan menyimpan data saksi
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

          return redirect()->route('pemilih')->with('success', 'Nomor WhatsApp valid.');
        } else {
            // Nomor tidak valid atau tidak aktif, kembali dengan pesan kesalahan
            return redirect()->route('pemilih')->with('error','Nomor berikut tidak terdaftar Pada WhatsApp.');
        }
    }

    public function edit_pemilih($id)
    {
        $data = Pemilih::findOrFail($id);
        
        return view('page.Pemilih.edit', compact('data'));
    }

    public function update_pemilih(Request $request, $id)
    {
        $data = Pemilih::findOrFail($id);

        // Pengecekan nomor telepon
        $token = "W1bYeUWDezeDR5lFYGtPY2wF0iTsesHYIfRQqmUPvvk5wU8g1mJaiwnrypBn6oaL"; // Ganti dengan token yang sesuai
        $phone = $request->NoTlpn;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: $token",
            "url: https://pati.wablas.com",
        ]);
        curl_setopt($curl, CURLOPT_URL,  "https://phone.wablas.com/check-phone-number?phones=". urlencode($phone));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($result, true);

        if ($response['status'] === 'success' && $response['data'][0]['status'] === 'online') {
            // Nomor valid dan aktif, lanjutkan memperbarui data saksi
            $data->update($request->all());

            return redirect()->route('pemilih')->with('success', 'No WhatsApp updated successfully.');
        } else {
            // Nomor tidak valid atau tidak aktif, kembali dengan pesan kesalahan
            return redirect()->route('pemilih')->with('error', 'Nomor WhatsApp tidak valid atau tidak aktif.');
        }
    }


    public function hapus_pemilih($id){
        $pemilih = Pemilih::findOrFail($id);
        $pemilih->delete();
    
        return redirect()->route('pemilih');
    }
}
