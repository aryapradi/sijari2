<?php

namespace App\Imports;

use App\Models\Dpt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DptImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dpt([
            'no_kk' => $row[1],
            'nik' => $row[2],
            'nama' => $row[3],
            'tempat_lahir' => $row[4],
            'tangga_lahir' => $row[5],
            'status_perkawinan' => $row[6],
            'jenis_kelamin' => $row[7],
            'jalan' => $row[8],
            'rt' => $row[9],
            'rw' => $row[10],
            'disabilitas' => $row[11],
            'kelurahan' => $row[12],
            'kecamatan' => $row[13],
            'tps' => $row[14],
            // 'NoTlpn' => $row[15],
        ]);
    }

    /**
    * @return int
    */
    public function startRow(): int
    {
        return 4; // Mulai dari baris kedua (abaikan baris nama kolom)
    }
}
