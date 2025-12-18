@extends('backend.v_layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $judul }}</h1>

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('backend.transaksi.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Pelanggan</label>
                <select name="pelanggan_id" class="form-control" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach ($pelanggan as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Layanan</label>
                <select name="layanan_id" class="form-control" required>
                    <option value="">-- Pilih Layanan --</option>
                    @foreach ($layanan as $l)
                    <option value="{{ $l->id }}">
                        {{ $l->nama_layanan }} (Rp {{ number_format($l->harga) }}/Kg)
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Berat (Kg)</label>
                <input type="number" step="0.1" name="berat" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="masuk">Masuk</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="diambil">Diambil</option>
                </select>@extends('backend.v_layouts.app')

                @section('content')
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="mb-0">{{ $judul }}</h5>
                    </div>

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

                        <form action="{{ route('backend.transaksi.store') }}" method="POST">
                            @csrf

                            {{-- Pelanggan --}}
                            <div class="form-group">
                                <label>Pelanggan</label>
                                <select name="pelanggan_id" class="form-control" required>
                                    <option value="">-- Pilih Pelanggan --</option>
                                    @foreach ($pelanggan as $p)
                                    <option value="{{ $p->id }}">
                                        {{ $p->nama }} - {{ $p->no_hp }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Layanan --}}
                            <div class="form-group">
                                <label>Layanan</label>
                                <select name="layanan_id" class="form-control" required>
                                    <option value="">-- Pilih Layanan --</option>
                                    @foreach ($layanan as $l)
                                    <option value="{{ $l->id }}">
                                        {{ $l->nama_layanan }} (Rp {{ number_format($l->harga) }}/kg)
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tanggal --}}
                            <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control"
                                    value="{{ date('Y-m-d') }}"
                                    required>
                            </div>

                            {{-- Berat --}}
                            <div class="form-group">
                                <label>Berat (Kg)</label>
                                <input
                                    type="number"
                                    step="0.1"
                                    name="berat"
                                    class="form-control"
                                    required>
                            </div>

                            {{-- STATUS JANGAN DIINPUT --}}
                            {{-- status otomatis "masuk" dari controller --}}

                            <button type="submit" class="btn btn-primary">
                                Simpan Transaksi
                            </button>
                            <a href="{{ route('backend.transaksi.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                        </form>
                    </div>
                </div>
                @endsection

            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('backend.transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection