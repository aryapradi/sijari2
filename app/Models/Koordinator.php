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

    protected $fillable = ['nama_koordinator','username','password', 'caleg_id','provinsi','kabupaten','kecamatan','desa'];

    public function provisi()
    {   
        return $this->belongsTo(Province::class, 'provinsi');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    //mendefinisikan relasi
    public function caleg()
    {
        return $this->belongsTo(Caleg::class);
    }

}
