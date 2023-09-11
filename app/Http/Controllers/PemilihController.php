<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Token;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Auth;
class PemilihController extends Controller
{
    public function frontpemilih()
    {
        $pemilih = Pemilih::first();
        $idsaksi = Auth::guard('saksi')->user();
        $idkoor = Auth::guard('koordinator')->user();
        // if (Auth::guard('koordinator')) {
        //     if ($pemilih == null) {
        //         $dataPemilih = Pemilih::paginate(6);
        //     } else {
        //         $dataPemilih = Pemilih::whereHas('saksi', function ($query) use ($idkoor) {
        //             $query->whereHas('koordinator', function ($innerQuery) use ($idkoor) {
        //                 $innerQuery->where('id', $idkoor->id);
        //             });
        //         })->paginate(6);
        //     }
        // } else {
        //     $dataPemilih = Pemilih::where('saksi_id', $idsaksi->id)->paginate(6);
        // } 

        $role = null; // Inisialisasi variabel $role

        if (Auth::guard('koordinator')->check()) {
            $role = 'koordinator';
        } elseif (Auth::guard('saksi')->check()) {
            $role = 'saksi';
        }

        if ($role === 'koordinator') {
            $dataPemilih = Pemilih::whereHas('saksi.koordinator', function ($query) use ($idkoor) {
                $query->where('id', $idkoor->id);
            })->paginate(6);
        } elseif ($role === 'saksi') {
            $idsaksi = Auth::guard('saksi')->user();
            $dataPemilih = Pemilih::where('saksi_id', $idsaksi->id)->paginate(6);
        }

        return view('frontpage.Pemilih.table',compact('dataPemilih'));
    }

    public function pemilih(Request $request)
    {
        $search = $request->input('search');
        $pemilih = Pemilih::first();
        $idadmin = Auth::guard('user')->user();
        if ($pemilih == null) {
            if (!empty($search)) {
                // Menggunakan where untuk mencari data dengan nama atau tps yang cocok
                $dataPemilih = Pemilih::where('nama', 'like', '%' . $search . '%')
                    ->orWhere('tps', 'like', '%' . $search . '%')
                    ->paginate(6);
            } else {
                // Jika tidak ada parameter pencarian, tampilkan semua data
                $dataPemilih = Pemilih::paginate(6);
            }
        } else {
            if (!empty($search)) {
                // Menggunakan where untuk mencari data dengan nama atau tps yang cocok
                $dataPemilih = Pemilih::where('nama', 'like', '%' . $search . '%')->orWhere('tps', 'like', '%' . $search . '%')->whereHas('saksi.koordinator.admin', function ($query) use ($idadmin) {$query->where('id', $idadmin->id);
                })->paginate(6);
            } else {
                // Jika tidak ada parameter pencarian, tampilkan semua data
                $dataPemilih = Pemilih::orWhere('tps', 'like', '%' . $search . '%')->whereHas('saksi.koordinator.admin', function ($query) use ($idadmin) {$query->where('id', $idadmin->id);
                })->paginate(6);
            }
        }

        return view('page.Pemilih.table',compact('dataPemilih'));
    }

    public function jadikan_pemilih(Request $request)
    {
        $idsaksi = Auth::guard('saksi')->user()->id;
        // dd($idsaksi);
        $noTlpn = $request->NoTlpn;
        $dpt = Dpt::find($request->pemilihId);
          $noTlpn = $request->NoTlpn;
          $dpt = Dpt::findOrFail($request->pemilihId);

          $token = Token::first()->token; // Ganti dengan token yang sesuai
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
          $pemilih->saksi_id = $idsaksi;
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

        $pemilih->save();

        // Redirect ke rute yang sesuai
        return redirect()->route('pemilih')->with('success', 'Data Berhasil Ditambah');
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
        $token = Token::first()->token; // Ganti dengan token yang sesuai
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

    public function hapus_pemilih($id)
    {
        $pemilih = Pemilih::findOrFail($id);
        $pemilih->delete();

        return redirect()->route('pemilih')->with('success', 'Data ' .  $pemilih->nama . ' berhasil dihapus');
    }

    public function formUnggahFoto($id)
    {
        $pemilih = Pemilih::findOrFail($id);
        return view('page.Pemilih.unggah_foto', compact('pemilih'));
    }

    public function unggahFoto(Request $request, $id)
    {
        // Validasi unggahan foto
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Cari pemilih berdasarkan ID
        $pemilih = Pemilih::find($id);

        if (!$pemilih) {
            return redirect()->route('pemilih')->with('error', 'Pemilih tidak ditemukan');
        }

        // Simpan nama file gambar ke dalam kolom "foto" pada model Pemilih
        $pemilih->foto = $request->file('foto')->store('foto', 'public');

        // Lakukan validasi tambahan pada foto, misalnya, menggunakan library seperti Intervention Image
        if ($this->validatePhoto($pemilih->foto)) {
            // Jika foto valid, atur status menjadi "Active"
            $pemilih->status = 'Valid';
        } else {
            // Jika foto tidak valid, atur status menjadi "Inactive" atau sesuai kebutuhan
            $pemilih->status = 'Tidak Valid';
        }

        $pemilih->save();

        return redirect()->route('pemilih')->with('success', 'Foto berhasil diunggah');
    }

    public function detailFoto($id)
    {
        $pemilih = Pemilih::findOrFail($id);

        return view('page.Pemilih.detail', compact('pemilih'));
    }

    private function validatePhoto($photoPath)
    {
        // Lakukan validasi tambahan pada foto di sini
        // Misalnya, Anda dapat menggunakan pustaka seperti Intervention Image
        // untuk memeriksa ukuran, format, dll.

        // Contoh validasi sederhana: cek apakah file gambar tersedia
        return Storage::disk('public')->exists($photoPath);
    
        return redirect()->route('listpemilih')->with('success', ' Data Berhasil Di hapus');
    }
}
