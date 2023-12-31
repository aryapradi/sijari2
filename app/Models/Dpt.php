<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpt extends Model
{
    use HasFactory;

    protected $table = 'dpt'; 
    
    protected $fillable = [
        'no_kk',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'jenis_kelamin',
        'jalan',
        'rt',
        'rw',
        'disabilitas',
        'kota',
        'kelurahan',
        'kecamatan',
        'tps',
        'NoTlpn'
    ];

    // Tambahkan relasi atau method lain yang mungkin diperlukan di sini

    public function koordinator()
    {
        return $this->belongsToMany(Koordinator::class);
    }

    public function saksi()
    {
        return $this->belongsToMany(Saksi::class, 'saksi_dpt', 'dpt_id', 'saksi_id');
    }
}
