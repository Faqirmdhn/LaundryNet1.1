<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Laundry</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }

        h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>

    <h3>LAPORAN TRANSAKSI LAUNDRY</h3>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Pelanggan</th>
                <th width="25%">Layanan</th>
                <th width="15%">Tanggal</th>
                <th width="15%">Total</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    {{-- Pelanggan --}}
                    <td>
                        {{ $t->pelanggan->nama ?? '-' }}
                    </td>

                    {{-- Layanan (ANTI NULL / KEHAPUS) --}}
                    <td>
                        @if ($t->layanan)
                            {{ $t->layanan->nama_layanan }}
                        @else
                            <em>Layanan tidak tersedia</em>
                        @endif
                    </td>

                    <td>{{ $t->tanggal }}</td>

                    <td>
                        Rp {{ number_format($t->total_harga, 0, ',', '.') }}
                    </td>

                    <td>{{ ucfirst($t->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">
                        Tidak ada data transaksi
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    <p style="font-size:10px;">
        Dicetak pada: {{ date('d-m-Y H:i') }}
    </p>

</body>

</html>
