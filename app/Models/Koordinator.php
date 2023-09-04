<?php

namespace App\Models;

use App\Models\Caleg;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koordinator extends Model
{
    use HasFactory;

    protected $table = 'koordinator';

    protected $guarded = ['id'];

    protected $fillable = ['nama_koordinator','username','password', 'caleg_id','provinsi','kabupaten','kecamatan','kelurahan','admin_id'];
  
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
