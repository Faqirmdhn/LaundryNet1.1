<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['pelanggan', 'layanan'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.v_transaksi.index', [
            'transaksi' => $transaksi,
            'judul' => 'Data Transaksi'
        ]);
    }

    public function create()
    {
        return view('backend.v_transaksi.create', [
            'pelanggan' => Pelanggan::all(),
            'layanan'   => Layanan::where('status', 'active')->get(),
            'judul'     => 'Tambah Transaksi'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'layanan_id'   => 'required|exists:layanan,id',
            'tanggal'      => 'required|date',
            'berat'        => 'required|numeric|min:0.1',
        ]);

        $layanan = Layanan::findOrFail($data['layanan_id']);
        $totalHarga = $layanan->harga * $data['berat'];

        Transaksi::create([
            'pelanggan_id' => $data['pelanggan_id'],
            'layanan_id'   => $data['layanan_id'],
            'tanggal'      => now(), // ← AUTO
            'berat'        => $data['berat'],
            'total_harga'  => $totalHarga,
            'status'       => 'masuk'
        ]);

        return redirect()->route('backend.transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit(Transaksi $transaksi)
    {
        return view('backend.v_transaksi.edit', [
            'transaksi' => $transaksi,
            'pelanggan' => Pelanggan::all(),
            'layanan'   => Layanan::where('status', 'active')->get(),
            'judul'     => 'Edit Transaksi'
        ]);
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $data = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'layanan_id'   => 'required|exists:layanan,id',
            'tanggal'      => 'required|date',
            'berat'        => 'required|numeric|min:0.1',
            'status'       => 'required|in:masuk,proses,selesai,diambil',
        ]);

        $layanan = Layanan::findOrFail($data['layanan_id']);
        $totalHarga = $layanan->harga * $data['berat'];

        $transaksi->update([
            ...$data,
            'total_harga' => $totalHarga
        ]);

        return redirect()->route('backend.transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('backend.transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}
