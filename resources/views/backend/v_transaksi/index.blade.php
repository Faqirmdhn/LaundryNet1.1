@extends('backend.v_layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ $judul }}</h1>

    <a href="{{ route('backend.transaksi.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Transaksi
    </a>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Layanan</th>
                            <th>Berat (Kg)</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->pelanggan->nama }}</td>
                                <td>{{ $t->layanan->nama_layanan }}</td>
                                <td>{{ $t->berat }} Kg</td>
                                <td>Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
                                <td>
                                    @php
                                        $badgeClass = match ($t->status) {
                                            'masuk' => 'secondary',
                                            'proses' => 'danger', // MERAH
                                            'selesai' => 'success', // HIJAU
                                            'diambil' => 'warning', // KUNING
                                            default => 'dark',
                                        };
                                    @endphp
                                    <span class="badge badge-info">{{ ucfirst($t->status) }}</span>
                                </td>
                                <td>{{ $t->tanggal }}</td>
                                <td>
                                    <a href="{{ route('backend.transaksi.edit', $t->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('backend.transaksi.destroy', $t->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus transaksi?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
