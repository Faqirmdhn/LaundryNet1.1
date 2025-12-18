<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendLayananController extends Controller
{
    // Menampilkan semua layanan1
    public function indexLayanan1()
    {
        $layanans = Layanan::all();
        return view('backend.v_layanan1.index', compact('layanans'));
    }

    // Form tambah layanan1
    public function createLayanan1()
    {
        return view('backend.v_layanan1.create');
    }

    // Simpan layanan1 baru
    public function storeLayanan1(Request $request)
    {
        $harga = $this->hitungHarga($request->nama_layanan, $request->kg, $request->pengerjaan);

        $layanan = Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'kg' => $request->kg,
            'pengerjaan' => $request->pengerjaan,
            'harga' => $harga,
        ]);

        // Simpan otomatis ke transaksi
        Transaksi::create([
            'pelanggan_id' => Auth::user()->id,
            'layanan1_id' => $layanan->id,
            'nama_layanan' => $request->nama_layanan,
            'kg' => $request->kg,
            'pengerjaan' => $request->pengerjaan,
            'total_harga' => $harga,
            'status' => 'proses',
        ]);

        return redirect()->route('backend.layanan1.index')
            ->with('success', 'Layanan berhasil ditambahkan dan masuk transaksi.');
    }

    // Form edit layanan1
    public function editLayanan1($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('backend.v_layanan1.edit', compact('layanan'));
    }

    // Update layanan1
    public function updateLayanan1(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $harga = $this->hitungHarga($request->nama_layanan, $request->kg, $request->pengerjaan);

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'kg' => $request->kg,
            'pengerjaan' => $request->pengerjaan,
            'harga' => $harga,
        ]);

        // Update transaksi terkait
        $transaksi = Transaksi::where('layanan1_id', $layanan->id)->first();
        if ($transaksi) {
            $transaksi->update([
                'nama_layanan' => $request->nama_layanan,
                'kg' => $request->kg,
                'pengerjaan' => $request->pengerjaan,
                'total_harga' => $harga,
            ]);
        }

        return redirect()->route('backend.layanan1.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    // Hapus layanan1
    public function destroyLayanan1($id)
    {
        // Hapus transaksi terkait
        Transaksi::where('layanan1_id', $id)->delete();
        // Hapus layanan
        Layanan::destroy($id);

        return redirect()->route('backend.layanan1.index')
            ->with('success', 'Layanan dan transaksi terkait berhasil dihapus.');
    }

    // Fungsi hitung harga
    private function hitungHarga($nama_layanan, $kg, $pengerjaan)
    {
        $harga_per_kg = [
            'paket komplit' => 30000,
            'cuci + kering' => 20000,
            'cuci' => 10000,
        ];

        $harga = $harga_per_kg[$nama_layanan] * $kg;

        if ($pengerjaan === 'ekspres') {
            $harga += 10000;
        }

        return $harga;
    }
}
