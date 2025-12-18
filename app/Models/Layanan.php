<?php
// app/Models/Layanan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // TAMBAHKAN INI
    protected $table = 'layanan'; // Nama tabel di database

    protected $fillable = [
        'nama_layanan',
        'harga',
        'deskripsi',
        'status'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
