<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan'; // nama tabel sesuai database
    protected $fillable = ['nama', 'no_hp', 'alamat'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
