<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f7fafc;
            color: #2d3748;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #2d3748;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .user-card {
            margin-bottom: 1.5rem;
        }

        .user-card-header {
            background-color: #e2e8f0;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: 500;
        }

        .user-card-body {
            padding: 0.75rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            padding: 0.5rem;
            border: 1px solid #e2e8f0;
            text-align: center;
        }

        th {
            background-color: #edf2f7;
            font-size: 0.875rem;
            font-weight: 500;
        }

        tbody tr:hover {
            background-color: #f1f5f9;
        }

        .text-center {
            text-align: center;
        }

        .text-gray {
            color: #4a5568;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="header">Daftar Transaksi</h1>

        @if ($users->isEmpty())
            <p class="text-center text-gray">Tidak ada pengguna yang ditemukan.</p>
        @else
            @foreach ($users as $user)
                <div class="user-card">
                    <div class="user-card-header">{{ $user->name }}</div>
                    <div class="user-card-body">
                        @if ($user->transaksi->isEmpty())
                            <p class="text-gray">Tidak ada transaksi yang ditemukan untuk pengguna ini.</p>
                        @else
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Total</th>
                                        <th>Pembayaran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->transaksi as $transaksi)
                                        <tr>
                                            <td>{{ $transaksi->id }}</td>
                                            <td>{{ number_format($transaksi->total_harga, 2) }}</td>
                                            <td>{{ $transaksi->pembayaran }}</td>
                                            <td>{{ $transaksi->status_pesanan == 1 ? 'Selesai' : 'Menunggu' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>

</html>
