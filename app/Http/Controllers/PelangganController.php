<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    // Tampil semua pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::all(); // ambil semua data pelanggan
        return view('backend.v_pelanggan.index', compact('pelanggan'))
               ->with('judul', 'Data Pelanggan');
    }

    // Form tambah pelanggan
    public function create()
    {
        return view('backend.v_pelanggan.create')->with('judul', 'Tambah Pelanggan');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('backend.pelanggan.index')
                         ->with('success', 'Data pelanggan berhasil disimpan.');
    }

    // Form edit
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('backend.v_pelanggan.edit', compact('pelanggan'))
               ->with('judul', 'Edit Pelanggan');
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('backend.pelanggan.index')
                         ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('backend.pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus.');
    }
}
