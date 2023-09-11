<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Exports\DptExport;
use App\Imports\DptImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DptController extends Controller
{
    public function dpt(Request $request)
    {
        $search = $request->input('search');

        if (!empty($search)) {
            $dpt = Dpt::where('nama', 'like', '%' . $search . '%')
                ->orWhere('tps', 'like', '%' . $search . '%')
                ->paginate(10);
        } else {
            $dpt = Dpt::paginate(5);
        }
        // $startIndex = ($dpt->currentPage() - 1) * $dpt->perPage() + 1;
        $startIndex = ($dpt->currentPage() - 1) * $dpt->perPage(); // Menghitung nomor awal
 // Menghitung nomor awal
        $totalData = Dpt::count(); // Menghitung total data

        return view('page.Dpt.table', compact('dpt','startIndex', 'totalData')); // Mengirimkan total data ke tampilan
    }

    public function front_listdpt()
    {
        $dpt = Dpt::paginate(6);
        return view('frontpage.Dpt.table', compact('dpt'));
    }

    public function export_dpt()
    {
        $dpt = Dpt::all();

        if ($dpt->isEmpty()) {
            Session::flash('error', 'Tidak ada data yang dapat diexport.');
            return redirect()->back();
        }

        return Excel::download(new DptExport, 'datadpt.xlsx');
    }

    public function import_dpt(Request $request)
    {
        $file = $request->file('file');

        if (!$file) {
            Session::flash('error', 'Tidak ada file yang diunggah.');
            return redirect()->back();
        }

        $namaFile = $file->getClientOriginalName();
        $file->move('datadptt', $namaFile);

        $filePath = public_path('datadptt/' . $namaFile);

        try {
            Excel::import(new DptImport, $filePath, null, \Maatwebsite\Excel\Excel::XLSX, [
                'headingRow' => 4 // Menandakan bahwa baris ke-3 berisi nama-nama kolom
            ]);
        } catch (\Throwable $e) {
            Session::flash('error', 'Terjadi kesalahan saat mengimpor file. Pastikan format file Excel sesuai dengan template.');
            return redirect()->back();
        }

        Session::flash('success', 'Data DPT Telah Di Import');

        return redirect('DataDPT');
    }

    public function download_Template()
    {
        $templateFileName = 'template_data_dpt.xlsx';

        // Menggunakan storage_path untuk mengakses direktori storage
        $templateFilePath = storage_path('app/public/templates/' . $templateFileName);

        // Mengunduh file template
        return response()->download($templateFilePath, $templateFileName);
    }

    public function deleteAllData()
    {
        $dptCount = Dpt::count();

        if ($dptCount === 0) {
            return redirect()->back()->with('error', 'No data to delete.');
        }

        Dpt::truncate();

        return redirect()->back()->with('success', 'All data deleted successfully.');
    }

    public function detail_dpt($id)
    {
        $dpt = Dpt::findOrFail($id);
        return view('page.Dpt.detail', compact('dpt'));
    }
}
