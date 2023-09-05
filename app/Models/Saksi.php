<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    use HasFactory;

    protected $table = 'saksi';

    protected $fillable = [
        'dpt_id',
        'username',
        'password',
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
}
