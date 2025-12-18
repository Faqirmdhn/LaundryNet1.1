{{-- resources/views/backend/layanan/create.blade.php --}}
@extends('backend.v_layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Layanan Baru</h3>
                <div class="card-tools">
                    <a href="{{ route('backend.layanan.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('backend.layanan.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nama_layanan">Nama Layanan *</label>
                        <input type="text" class="form-control @error('nama_layanan') is-invalid @enderror"
                            id="nama_layanan" name="nama_layanan"
                            value="{{ old('nama_layanan') }}"
                            placeholder="Masukkan nama layanan" required>
                        @error('nama_layanan')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga (Rp) *</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                            id="harga" name="harga" min="0" step="1000"
                            value="{{ old('harga') }}"
                            placeholder="Masukkan harga" required>
                        @error('harga')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi" name="deskripsi"
                            rows="3" placeholder="Masukkan deskripsi layanan">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select class="form-control @error('status') is-invalid @enderror"
                            id="status" name="status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection