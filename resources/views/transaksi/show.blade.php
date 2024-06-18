<x-app-layout>
    <div class="container">
        <h1>Transaksi Belum Disetujui</h1>

        @if ($transaksi->isEmpty())
            <p>Tidak ada transaksi yang ditemukan.</p>
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
                    @foreach ($transaksi as $transaksi)
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
</x-app-layout>
