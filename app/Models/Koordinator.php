<?php

namespace App\Models;

use App\Models\Caleg;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Koordinator extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = 'koordinator';

    protected $guarded = ['id'];

    protected $fillable = ['nama_koordinator','username','password', 'caleg_id','provinsi','kabupaten','kecamatan','kelurahan','admin_id'];
  
    
        protected $hidden = [
            'password',
            'remember_token',
        ];

        
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
  

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinsi'); // Ganti dengan kolom foreign key yang sesuai
    }

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'kabupaten'); // Ganti dengan kolom foreign key yang sesuai
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'kecamatan'); // Ganti dengan kolom foreign key yang sesuai
    }
    
    public function villages()
    {
        return $this->belongsTo(Village::class, 'kelurahan'); // Ganti dengan kolom foreign key yang sesuai
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function dpt()
    {
        return $this->belongsToMany(Dpt::class);
    }
    

    //mendefinisikan relasi
    public function caleg()
    {
        return $this->belongsTo(Caleg::class);
    }

}
