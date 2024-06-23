<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    public $timestamps = false;
     
    protected $fillable = [
        'merek',
        'model',
        'no_plat',
        'tarif_sewa',
        'stok',
    ];
}
