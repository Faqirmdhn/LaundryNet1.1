@extends('backend.v_layouts.app')

@section('content')
    <div class="card-header py-3 bg-primary">
        <h6 class="m-0 font-weight-bold text-white">Hai Ini Laporan</h6>
    </div>
    <div class="card shadow mb-4 border-left-primary">
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">Data </h3>
                <div class="card-tools">
                    <a href="{{ route('backend.laporan.pdf') }}" class="btn btn-success btn-sm">
                        Cetak Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
