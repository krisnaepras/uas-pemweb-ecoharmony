
<x-app-layout>
    <div class="container mx-auto p-6 font-poppins bg-green-100 min-h-screen">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-green-700">Keranjang Belanja</h2>
            @if ($keranjang && $keranjang->produk->count() > 0)
                <table class="min-w-full bg-white overflow-hidden border:lg border-white mb-6">
                    <thead>
                        <tr class="bg-green-800 text-white rounded">
                            <th class="px-4 py-2 text-center">Gambar</th>
                            <th class="px-4 py-2 text-center">Nama Produk</th>
                            <th class="px-4 py-2 text-center">Harga (Rp)</th>
                            <th class="px-4 py-2 text-center">Jumlah</th>
                            <th class="px-4 py-2 text-center">Subtotal (Rp)</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keranjang->produk as $produk)
                            <tr>
                                <td class="border px-4 py-2 flex justify-center">
                                    <img src="{{ asset('images/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" class="w-16 h-16 object-cover">
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $produk->nama_produk }}</td>
                                <td class="border px-4 py-2 text-center">{{ $produk->harga_produk }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <form action="{{ route('keranjang.update', $produk->id) }}" method="POST" class="flex justify-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="jumlah_barang" value="{{ $produk->pivot->jumlah_barang }}" min="1" class="w-16 p-1 border rounded mr-2 text-center">
                                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-lg">Update</button>
                                    </form>
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $produk->pivot->subtotal }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <form action="{{ route('keranjang.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right mb-6">
                    <h4 class="text-xl font-bold">Total: {{ $total }}</h4>
                </div>
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('user.products.index') }}" class="bg-amber-200 hover:bg-amber-800 hover:text-white text-amber-950 font-bold py-2 px-4 border-green-800 rounded-lg">Kembali ke Produk</a>
                    <form action="{{ route('transaksi.create') }}" method="GET">
                        @csrf
                        <button type="submit" class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">Checkout</button>
                    </form>
                </div>
            @else
                <p class="text-gray-700">Keranjang Anda kosong.</p>
            @endif
        </div>
    </div>
</x-app-layout>