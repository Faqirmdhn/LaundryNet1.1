<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class BerandaController extends Controller
{
    public function berandaBackend()
    {
        $masuk   = Transaksi::where('status', 'masuk')->count();
        $proses  = Transaksi::where('status', 'proses')->count();
        $selesai = Transaksi::where('status', 'selesai')->count();
        $diambil = Transaksi::where('status', 'diambil')->count();

        return view('backend.v_beranda.index', [
            'judul'   => 'Halaman Beranda',
            'masuk'   => $masuk,
            'proses'  => $proses,
            'selesai' => $selesai,
            'diambil' => $diambil,
        ]);
    }
}
