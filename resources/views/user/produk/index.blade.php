<x-app-layout>
    <div class="container">
        <h1>Produk</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ asset('images/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" style="max-width: 200px">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('user.products.show', $product->id) }}">{{ $product->nama_produk }}</a>
                            </h5>
                            <p class="card-text">Harga: {{ $product->harga_produk }}</p>
                            <p class="card-text">Terjual: {{ $product->terjual }}</p>
                            <form action="{{ route('keranjang.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $product->id }}">
                                <input type="hidden" name="jumlah_barang" value="1">
                                <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
