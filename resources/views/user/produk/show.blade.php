<x-app-layout>
    <div class="container">
        <h1>{{ $product->nama_produk }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p>Harga: {{ $product->harga_produk }}</p>
                <p>Stok: {{ $product->stok_produk }}</p>
                <p>Kategori: {{ $product->kategori_produk }}</p>
                <p>Deskripsi: {{ $product->deskripsi_produk }}</p>
                <p>Terjual: {{ $product->terjual }}</p>
            </div>
        </div>
        <a href="{{ route('user.products.index') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Produk</a>
    </div>
</x-app-layout>
