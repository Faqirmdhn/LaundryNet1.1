{{-- resources/views/backend/layanan/show.blade.php --}}
@extends('backend.v_layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Layanan</h3>
                <div class="card-tools">
                    <a href="{{ route('backend.layanan.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">ID</th>
                                <td>{{ $layanan->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama Layanan</th>
                                <td>{{ $layanan->nama_layanan }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge badge-{{ $layanan->status == 'active' ? 'success' : 'danger' }}">
                                        {{ $layanan->status }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                <td>{{ $layanan->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate</th>
                                <td>{{ $layanan->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <h5>Deskripsi:</h5>
                        <div class="border p-3">
                            {{ $layanan->deskripsi ?? '-' }}
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('backend.layanan.edit', $layanan->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('backend.layanan.destroy', $layanan->id) }}"
                        method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Yakin hapus?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection