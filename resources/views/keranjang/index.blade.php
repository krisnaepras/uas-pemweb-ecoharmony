<x-app-layout>
    <div class="container">
        <h2>Keranjang Belanja</h2>
        @if ($keranjang && $keranjang->produk->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keranjang->produk as $produk)
                        <tr>
                            <td><img src="{{ asset('images/' . $produk->gambar_produk) }}"
                                    alt="{{ $produk->nama_produk }}" style="width: 50px;"></td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->harga_produk }}</td>
                            <td>
                                <form action="{{ route('keranjang.update', $produk->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="jumlah_barang" value="{{ $produk->pivot->jumlah_barang }}"
                                        min="1">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                            <td>{{ $produk->pivot->subtotal }}</td>
                            <td>
                                <form action="{{ route('keranjang.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                <h4>Total: {{ $total }}</h4>
                <form action="{{ route('detail_transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="keranjang_id" value="{{ $keranjang->id }}">
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>

            </div>
        @else
            <p>Keranjang Anda kosong.</p>
        @endif
    </div>
</x-app-layout>
