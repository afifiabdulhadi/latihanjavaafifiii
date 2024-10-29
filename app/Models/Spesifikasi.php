<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesifikasi extends Model
{
    use HasFactory;
    protected $fillable =[
        'brand',
        'model',
        'ram',
        'processor',
        'pixelkamera',
        'transaksi_id' // Pastikan kolom ini ada di dalam $fillable

    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
