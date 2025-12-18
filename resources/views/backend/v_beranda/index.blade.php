@extends('backend.v_layouts.app')

@section('content')
    <!-- CARD JUDUL -->
    <div class="card shadow mb-4 border-left-primary">
        <div class="card-body">

            <div class="d-flex align-items-center mb-3">
                <div class="mr-3">
                    <i class="fas fa-home fa-2x text-primary"></i>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">{{ $judul }}</h3>
            </div>

            <p class="text-gray-700" style="font-size: 15px;">
                Selamat Datang,
                <b class="text-dark">{{ Auth::user()->nama }}</b> pada LaundryNet.
                Anda memiliki hak akses sebagai
                <b class="text-success">
                    @if (Auth::user()->role == 1)
                        Super Admin
                    @else
                        Admin
                    @endif
                </b>.
                <br>
                <span class="text-muted">Ini adalah halaman utama dari aplikasi LaundryNet.</span>
            </p>
        </div>
    </div>

    <!-- CARD DESKRIPSI -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-success">
            <h6 class="m-0 font-weight-bold text-white">LaundryNet</h6>
        </div>

        <div class="card-body">
            <div class="row py-10 border-bottom">
                <div class="col-md-10">
                    Mulai dari cuci reguler, express, setrika, hingga dryclean dengan proses cepat dan hasil berkualitas.
                </div>
            </div>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="row">

        <!-- Masuk -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                        Laundry Masuk
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $masuk }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Proses -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Dalam Proses
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $proses }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Selesai -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Selesai
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $selesai }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">

                <!-- Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Status Laundry</h6>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>

                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-secondary"></i> Masuk
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Proses
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Selesai
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Diambil
                        </span>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('scripts')
    <script>
        var ctx = document.getElementById("myPieChart");
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Masuk", "Proses", "Selesai", "Diambil"],
                datasets: [{
                    data: [
                        {{ $masuk }},
                        {{ $proses }},
                        {{ $selesai }},
                        {{ $diambil }}
                    ],
                    backgroundColor: [
                        '#6c757d',
                        '#dc3545',
                        '#28a745',
                        '#ffc107'
                    ],
                    hoverBackgroundColor: [
                        '#5a6268',
                        '#c82333',
                        '#218838',
                        '#e0a800'
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            }, //
            options: {
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
@endpush
