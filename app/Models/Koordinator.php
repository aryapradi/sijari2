<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    use HasFactory;

    protected $table = 'koordinator';

    protected $guarded = ['id'];

    protected $fillable = ['nama_koordinator', 'caleg_id'];

    //mendefinisikan relasi
    public function caleg()
    {
        return $this->belongsTo(Caleg::class);
    }

}
