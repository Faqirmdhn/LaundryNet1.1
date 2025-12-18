<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundryNet</title>

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('backend/sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,900" rel="stylesheet">

    <!-- DataTables CSS (TAMBAH INI) -->
    <link href="{{ asset('backend/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">LaundryNet</div>
            </a>

            <hr class="sidebar-divider my-0">

            <!-- Beranda -->
            <li class="nav-item {{ request()->routeIs('backend.beranda') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('backend.beranda') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Beranda</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Pelanggan -->
            <li class="nav-item {{ request()->routeIs('backend.pelanggan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('backend.pelanggan.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Pelanggan</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Layanan -->
            <li class="nav-item {{ request()->routeIs('backend.layanan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('backend.layanan.index') }}">
                    <i class="fas fa-check-square"></i>
                    <span>Layanan</span>
                </a>
            </li>

            <!-- transaksi -->
            <li class="nav-item {{ request()->routeIs('backend.transaksi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('backend.transaksi.index') }}">
                    <i class="fas fa-receipt"></i>
                    <span>Transaksi</span>
                </a>
            </li>


        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Content -->
            <div id="content">

                <!-- Top Navbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

                    <!-- Right Menu -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('backend/sbadmin/img/admin.jpeg') }}"
                                    style="width: 40px; height: 40px;">
                            </a>
                            <!-- Dropdown menu untuk logout -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form method="POST" action="{{ route('backend.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="cursor: pointer;">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>


                </nav>
                <!-- End Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>
            <!-- End Content -->

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Wrapper -->

    <!-- JS -->
    <script src="{{ asset('backend/sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/sbadmin/js/sb-admin-2.min.js') }}"></script>

    <!-- DataTables JS (TAMBAH INI) -->
    <script src="{{ asset('backend/sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Chart.js (TAMBAH INI) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- DataTables Script -->
    <script>
        $(document).ready(function() {
            if ($('#dataTable').length) {
                $('#dataTable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "pageLength": 10,
                    "language": {
                        "paginate": {
                            "previous": "<i class='fas fa-chevron-left'></i>",
                            "next": "<i class='fas fa-chevron-right'></i>"
                        },
                        "search": "_INPUT_",
                        "searchPlaceholder": "Search...",
                        "lengthMenu": "Show _MENU_ entries",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries"
                    }
                });
            }
        });
    </script>

    <!-- Additional Scripts Section (untuk custom script per page) -->
    @stack('scripts')

</body>

</html>
