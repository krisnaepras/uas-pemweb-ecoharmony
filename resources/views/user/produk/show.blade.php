<x-app-layout>
    <div class="container mx-auto p-12 bg-green-200">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/2">
                    <img src="{{ asset('images/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2 px-6 py-4">
                    <h1 class="text-5xl font-bold font-serif text-green-800 mb-2">{{ $product->nama_produk }}</h1>
                    <p class="text-gray-700 mb-4">Harga: Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</p>
                    <p class="text-gray-700 mb-4">Stok: {{ $product->stok_produk }}</p>
                    <p class="text-gray-700 mb-4">Terjual: {{ $product->terjual }}</p>
                    <p class="text-gray-700 mb-4">Kategori: {{ $product->kategori_produk }}</p>
                    <p class="text-gray-700 mb-4 text-justify">Deskripsi: {{ $product->deskripsi_produk }}</p>
                    <a href="{{ route('user.products.index') }}" class="inline-block bg-green-800 hover:bg-green-200 text-white hover:text-black font-bold py-2 px-4 rounded">Kembali ke Daftar Produk</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>