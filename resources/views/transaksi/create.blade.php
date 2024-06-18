<x-app-layout>
    <div class="container mx-auto p-12 bg-green-200">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-800 font-serif">Buat Transaksi Baru</h1>

        @if ($keranjang)
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
                <div class="px-6 py-4 bg-green-600 border-b border-gray-300">
                    <h2 class="text-xl text-white font-bold">Detail Keranjang</h2>
                </div>
                <div class="p-8">
                    <div class="-mx-4 -my-2 overflow-x-auto">
                        <div class="py-2 align-middle inline-block min-w-full">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-green-200">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">
                                                Produk</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">
                                                Jumlah</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">
                                                Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($keranjang->produk as $produk)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    {{ $produk->nama_produk }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    {{ $produk->pivot->jumlah_barang }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    {{ number_format($produk->pivot->subtotal, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="bg-green-200">
                                        <tr>
                                            <th colspan="2"
                                                class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">
                                                Total Harga</th>
                                            <th class="px-6 py-3 text-start text-xs font-medium text-black">
                                                {{ number_format($total_harga, 2) }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                <p class="text-gray-700">Keranjang kosong.</p>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="p-4">
                    <label for="pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                    <div class="relative">
                        <select id="pembayaran" name="pembayaran"
                            class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="cash">Cash</option>
                            @if ($wallet && $wallet->poin >= $total_harga)
                                <option value="poin">Poin</option>
                            @endif
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
                    </div>
                    @if ($wallet)
                        <p class="mt-2 text-sm text-gray-500">Saldo Poin: {{ $wallet->poin }}</p>
                    @endif
                </div>
                @error('pembayaran')
                    <div class="text-red-500 mb-4">
                        {{ $message }}
                    </div>
                @enderror
                <div class="container flex justify-center">
                    <button type="submit"
                        class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Buat
                        Transaksi</button>
                </div>
            </form>
        </div>

        <div class="container flex justify-center">
            <a href="{{ route('user.products.index') }}"
                class="inline-block bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Kembali ke
                Daftar Produk</a>
        </div>
    </div>
</x-app-layout>
