<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    use HasFactory;

    protected $table = 'partai';

    protected $guarded = ['id'];

    protected $fillable = [
        'nama_partai',
    ];

    //mendefinisikan relasi
    public function caleg(){
        return $this->hasMany(Caleg::class);
    }
}
