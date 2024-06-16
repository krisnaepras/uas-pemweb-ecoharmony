<x-app-layout>
    <div class="container">
        <h2>Checkout</h2>
        @if ($keranjang && $keranjang->produk->count() > 0)
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
                    @foreach ($keranjang->produk as $produk)
                        <tr>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->harga_produk }}</td>
                            <td>{{ $produk->pivot->jumlah_barang }}</td>
                            <td>{{ $produk->pivot->subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                <h4>Total: {{ $total }}</h4>
                <form action="{{ route('detail_transaksi.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="pembayaran">Metode Pembayaran</label>
                        <select name="pembayaran" id="pembayaran" class="form-control">
                            <option value="cash">Cash</option>
                            @if (Auth::user()->wallet->poin >= $total)
                                <option value="poin">Poin</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Buat Pesanan</button>
                </form>
            </div>
        @else
            <p>Keranjang Anda kosong.</p>
        @endif
    </div>
</x-app-layout>
