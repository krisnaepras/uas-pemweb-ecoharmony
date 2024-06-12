<x-app-layout>
    <div class="container">
        <h1>Produk</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ asset('images/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama_produk }}</h5>
                            <p class="card-text">Harga: {{ $product->harga_produk }}</p>
                            <p class="card-text">Terjual: {{ $product->terjual }}</p>
                            <a href="{{ route('user.products.show', $product->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
