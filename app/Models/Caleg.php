<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caleg extends Model
{
    use HasFactory;

    protected $table = 'caleg';

    protected $guarded = ['id'];

    protected $fillable = [
        'nama_caleg',
        'partai_id',
        'image',
    ];

    public function partai()
    {
        return $this->belongsTo(Partai::class);
    }
    
    public function koordinator()
    {
        return $this->hasMany(Koordinator::class);
    }
}
