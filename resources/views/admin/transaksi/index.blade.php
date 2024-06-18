<x-app-layout>
    <div class="container">
        <h1>Daftar Pengguna</h1>

        @if ($users->isEmpty())
            <p>Tidak ada pengguna yang ditemukan.</p>
        @else
            @foreach ($users as $user)
                <div class="card mb-4">
                    <div class="card-header">{{ $user->name }}</div>
                    <div class="card-body">
                        @if ($user->transaksi->isEmpty())
                            <p>Tidak ada transaksi yang ditemukan untuk pengguna ini.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Total Harga</th>
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
</x-app-layout>
