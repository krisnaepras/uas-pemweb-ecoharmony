<x-app-layout>
    <div class="container">
        <h1>Buat Transaksi Baru</h1>

        @if ($keranjang)
            <div class="card mb-4">
                <div class="card-header">Detail Keranjang</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keranjang->produk as $produk)
                                <tr>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->pivot->jumlah_barang }}</td>
                                    <td>{{ number_format($produk->pivot->subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-right">Total Harga</th>
                                <th>{{ number_format($total_harga, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @else
            <p>Keranjang kosong.</p>
        @endif

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pembayaran">Metode Pembayaran</label>
                <select id="pembayaran" name="pembayaran" class="form-control" required>
                    <option value="cash">Cash</option>
                    @if ($wallet && $wallet->poin >= $total_harga)
                        <option value="poin">Poin</option>
                    @endif
                </select>
                @if ($wallet)
                    <p>Saldo Poin: {{ $wallet->poin }}</p>
                @endif
            </div>
            @if ($errors->has('pembayaran'))
                <div class="alert alert-danger">
                    {{ $errors->first('pembayaran') }}
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
        </form>
    </div>

</x-app-layout>
