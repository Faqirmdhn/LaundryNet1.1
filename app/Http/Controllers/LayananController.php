<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::orderBy('created_at', 'desc')->get();
        return view('backend.v_layanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255|unique:layanan,nama_layanan',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        try {
            Layanan::create($request->all());

            return redirect()->route('backend.layanan.index')
                ->with('success', 'Layanan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan layanan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan) // PERBAIKAN DI SINI
    {
        return view('backend.v_layanan.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan) // PERBAIKAN DI SINI
    {
        return view('backend.v_layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan) // PERBAIKAN DI SINI
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255|unique:layanan,nama_layanan,' . $layanan->id,
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        try {
            $layanan->update($request->all());

            return redirect()->route('backend.layanan.index')
                ->with('success', 'Layanan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui layanan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan) // PERBAIKAN DI SINI
    {
        try {
            $layanan->delete();

            return redirect()->route('backend.layanan.index')
                ->with('success', 'Layanan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus layanan: ' . $e->getMessage());
        }
    }
}
