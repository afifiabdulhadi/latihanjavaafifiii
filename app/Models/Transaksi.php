<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'namapembeli',
        'merekhp',
        'jumlah',
        'total',
        
    ];

    public function spesifikasis()
    {
        return $this->hasMany(Spesifikasi::class);
    }
}



