// database/seeders/LayananSeeder.php
<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run()
    {
        $layanan = [
            [
                'nama_layanan' => 'Cuci Kering',
                'harga' => 10000,
                'deskripsi' => 'Cuci kering biasa',
                'status' => 'active'
            ],
            [
                'nama_layanan' => 'Cuci Basah',
                'harga' => 8000,
                'deskripsi' => 'Cuci basah biasa',
                'status' => 'active'
            ],
            [
                'nama_layanan' => 'Setrika',
                'harga' => 5000,
                'deskripsi' => 'Setrika saja',
                'status' => 'active'
            ],
            [
                'nama_layanan' => 'Cuci + Setrika',
                'harga' => 12000,
                'deskripsi' => 'Cuci dan setrika',
                'status' => 'active'
            ],
        ];

        foreach ($layanan as $item) {
            Layanan::create($item);
        }
    }
}
