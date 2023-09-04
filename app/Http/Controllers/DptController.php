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
    public function dpt()
    {
        $data = Dpt::all();
        return view('page.Dpt.table', compact('data'));
    }

    public function export_dpt()
{
    $data = Dpt::all();

    if ($data->isEmpty()) {
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
        $templateFileName = 'template_import_soal.xlsx';

        // Menggunakan storage_path untuk mengakses direktori storage
        $templateFilePath = storage_path('app/public/templates/' . $templateFileName);

        // Mengunduh file template
        return response()->download($templateFilePath, $templateFileName);
    }


    public function deleteAllData()
{
    $dataCount = Dpt::count(); // Count the number of records in the Dpt table

    if ($dataCount === 0) {
        return redirect()->back()->with('error', 'No data to delete.');
    }

    // Perform deletion logic here
    Dpt::truncate(); // This will delete all records from the Dpt table

    return redirect()->back()->with('success', 'All data deleted successfully.');
}


    public function detail_dpt($id)
    {
    $data = Dpt::findOrFail($id);
    return view('page.Dpt.detail', compact('data'));
    }





}
