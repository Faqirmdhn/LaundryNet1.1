<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundryNet</title>

    <!-- SB Admin CSS -->
    <link href="{{ asset('backend/sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <a href="{{ route('backend.beranda') }}">Beranda</a> |
        <a href="#">User</a> |
        <a href="#" onclick="event.preventDefault(); document.getElementById('keluar-app').submit();">Keluar</a>
        <p></p>

        <form id="keluar-app" action="{{ route('backend.logout') }}" method="POST" style="display:none;">
            @csrf
        </form>

        <!-- @yieldAwal -->
        @yield('content')
        <!-- @yieldAkhir-->

        <!-- keluarApp -->
        <form id="keluar-app" action="{{ route('backend.logout') }}" method="POST" class="d
none">
            @csrf
        </form>
        <!-- keluarAppEnd -->
</body>

</html>