<x-app-layout>
    <div class="container">
        <h2>Detail Transaksi</h2>
        <h3>Nama Pengguna: {{ $transaksi->user->name }}</h3>
        <h4>Status: {{ $transaksi->status_pesanan == 0 ? 'Diproses' : 'Selesai' }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi->detail_transaksi as $detail)
                    <tr>
                        <td>{{ $detail->produk->nama_produk }}</td>
                        <td>{{ $detail->produk->harga_produk }}</td>
                        <td>{{ $detail->produk->pivot->jumlah_barang }}</td>
                        <td>{{ $detail->produk->pivot->subtotal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('admin.transaksi.konfirmasi', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success">Konfirmasi</button>
        </form>
    </div>
</x-app-layout>
