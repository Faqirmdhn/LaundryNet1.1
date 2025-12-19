<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Halaman laporan (web)
     */
    public function index()
    {
        $transaksi = Transaksi::with(['pelanggan', 'layanan'])
            ->where('status', 'diambil')
            ->get();

        return view('backend.v_laporan.index', compact('transaksi'));
    }

    /**
     * Export laporan ke PDF
     */
    public function exportPdf()
    {
        $transaksi = Transaksi::with(['pelanggan', 'layanan'])
            ->where('status', 'diambil')
            ->get();

        $pdf = Pdf::loadView('backend.v_laporan.pdf', compact('transaksi'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('laporan-laundry.pdf');
    }
}
