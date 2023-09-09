<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Saksi;

class Pemilih extends Model
{
    use HasFactory;

    protected $table = 'pemilih';

    protected $guarded = ['id'];
    
    protected $fillable = [
        'saksi_id',
        'dpt_id',
        'NoTlpn',
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

    public function saksi()
    {
        return $this->belongsTo(Saksi::class, 'saksi_id');
    }
}
