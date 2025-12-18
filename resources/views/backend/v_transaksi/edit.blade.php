@extends('backend.v_layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $judul }}</h1>

<div class="card shadow">
    <div class="card-body">

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('backend.transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- PELANGGAN --}}
            <div class="form-group">
                <label>Pelanggan</label>
                <select name="pelanggan_id" class="form-control" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach ($pelanggan as $p)
                    <option value="{{ $p->id }}"
                        {{ $transaksi->pelanggan_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- LAYANAN --}}
            <div class="form-group">
                <label>Layanan</label>
                <select name="layanan_id" class="form-control" required>
                    <option value="">-- Pilih Layanan --</option>
                    @foreach ($layanan as $l)
                    <option value="{{ $l->id }}"
                        {{ $transaksi->layanan_id == $l->id ? 'selected' : '' }}>
                        {{ $l->nama_layanan }} - Rp {{ number_format($l->harga) }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- BERAT --}}
            <div class="form-group">
                <label>Berat (Kg)</label>
                <input type="number" step="0.1" name="berat"
                    class="form-control"
                    value="{{ old('berat', $transaksi->berat) }}"
                    required>
            </div>

            {{-- TANGGAL --}}
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal', $transaksi->tanggal) }}"
                    required>
            </div>

            {{-- STATUS --}}
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    @php
                    $statusList = ['masuk', 'proses', 'selesai', 'diambil'];
                    @endphp

                    @foreach ($statusList as $status)
                    <option value="{{ $status }}"
                        {{ $transaksi->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>

            <a href="{{ route('backend.transaksi.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>
@endsection