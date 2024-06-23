<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianMobil extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'Invoice_Peminjaman',
        'nama',
        'model',
        'QTY',
        'tanggal_mulai',
        'tanggal_selesai',
        'lama_sewa',
        'harga_sewa',
        'tanggal_kembali',
        'kelebihan_hari',
        'denda_keterlambatan',
        'total_bayar',
    ];
}
