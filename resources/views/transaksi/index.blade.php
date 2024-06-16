<x-app-layout>
    <div class="container">
        <h2>Riwayat Transaksi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi as $trx)
                    <tr>
                        <td>{{ $trx->id }}</td>
                        <td>{{ $trx->created_at->format('d-m-Y') }}</td>
                        <td>
                            @if($trx->detail_transaksi->isNotEmpty())
                                Rp{{ number_format($trx->detail_transaksi->first()->keranjang->produk->sum('pivot.subtotal'), 2, ',', '.') }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $trx->status_pesanan == 0 ? 'Menunggu' : 'Selesai' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
