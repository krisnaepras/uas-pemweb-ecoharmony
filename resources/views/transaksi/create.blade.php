<x-app-layout>
<div class="container">
    <h2>Checkout</h2>
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
            @foreach($detailTransaksi as $detail)
                <tr>
                    <td>{{ $detail->keranjang->produk->nama_produk }}</td>
                    <td>{{ $detail->keranjang->produk->harga_produk }}</td>
                    <td>{{ $detail->keranjang->produk->pivot->jumlah_barang }}</td>
                    <td>{{ $detail->keranjang->produk->pivot->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        <h4>Total: {{ $total }}</h4>
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary mt-3">Buat Pesanan</button>
        </form>
    </div>
</div>
</x-app-layout>