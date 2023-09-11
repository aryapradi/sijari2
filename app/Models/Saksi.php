<?php

namespace App\Models;

use App\Models\Koordinator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Saksi extends Authenticatable
{
    use HasFactory, Notifiable;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function dpt()
    {
        return $this->belongsToMany(Dpt::class, 'saksi_dpt', 'saksi_id', 'dpt_id');
    }
    public function koordinator()
    {
        return $this->belongsTo(Koordinator::class, 'koor_id');
    }

    
}
