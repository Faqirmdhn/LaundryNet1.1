<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'pelanggan_id',
        'layanan_id',
        'tanggal',
        'berat',
        'total_harga',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    // RELASI KE LAYANAN
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
}
