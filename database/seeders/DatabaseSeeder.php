<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents; 
use Illuminate\Database\Seeder;
use App\Models\Pelanggan;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /** 
     * Seed the application's database. 
     */
    public function run(): void
    {
        Pelanggan::create([
            'nama' => 'Sopian Aji',
            'no_hp' => '085123456781',
            'alamat' => 'Jl. Salam',
        ]);

        Pelanggan::create([
            'nama' => 'Husni Faqih',
            'no_hp' => '085123456782',
            'alamat' => 'Jl. Salim',
        ]);

        Pelanggan::create([
            'nama' => 'Rousyati',
            'no_hp' => '085123456783',
            'alamat' => 'Jl. Salaman',
        ]);


        User::create([
            'nama' => 'Ibmu Muzaki',
            'email' => 'ibnu@gmail.com',
            'role' => '1',
            'status' => 1,
            'hp' => '0812345678901',
            'password' => bcrypt('ibnu12345'),
        ]);
        #untuk record berikutnya silahkan, beri nilai berbeda pada nilai: nama, email, hp dengan nilai masing-masing anggota kelompok 
        User::create([
            'nama' => 'Sopian Aji',
            'email' => 'sopian4ji@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '081234567892',
            'password' => bcrypt('P@55word'),
        ]);
    }
}
