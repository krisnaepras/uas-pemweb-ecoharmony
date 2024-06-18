<x-app-layout>
    <div class="container mx-auto py-12 bg-green-200">
        <div class="flex justify-between items-center p-8">
            <h1 class="text-4xl font-bold text-green-800 font-serif">Daftar Produk</h1>
            <a href="{{ route('keranjang.index') }}" class="text-gray-800 hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-8">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-64 object-cover" src="{{ asset('images/' . $product->gambar_produk) }}"
                        alt="{{ $product->nama_produk }}">
                    <div class="p-6">
                        <h2 class="font-semibold text-lg mb-2">
                            <a href="{{ route('user.products.show', $product->id) }}"
                                class="text-gray-800 hover:text-indigo-600">{{ $product->nama_produk }}</a>
                        </h2>
                        <p class="text-gray-700 mb-2">Harga: Rp {{ number_format($product->harga_produk, 0, ',', '.') }}
                        </p>
                        <p class="text-gray-700 mb-4">Terjual: {{ $product->terjual }}</p>
                        <form action="{{ route('keranjang.store') }}" method="POST"
                            class="container flex justify-center">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $product->id }}">
                            <input type="hidden" name="jumlah_barang" value="1">
                            <button type="submit"
                                class="bg-green-800 hover:bg-green-200 text-white hover:text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah
                                ke Keranjang</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
