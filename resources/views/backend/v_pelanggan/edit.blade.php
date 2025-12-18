@extends('backend.v_layouts.app')

@section('content')

<h3>{{ $judul ?? 'Edit Pelanggan' }}</h3>

<div class="card shadow mb-4 mt-4">
    <div class="card-body">

        <form action="{{ route('backend.pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control"
                    value="{{ old('nama', $pelanggan->nama) }}" required>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control"
                    value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Perbarui</button>

            <a href="{{ route('backend.pelanggan.index') }}" class="btn btn-secondary mt-3">
                Batal
            </a>
        </form>

    </div>
</div>

@endsection