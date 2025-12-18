@extends('backend.v_layouts.app')

@section('content')

<h3>{{ $judul ?? 'Tambah Pelanggan' }}</h3>

<div class="card p-4 shadow mt-3">
    <form action="{{ route('backend.pelanggan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('backend.pelanggan.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>

@endsection