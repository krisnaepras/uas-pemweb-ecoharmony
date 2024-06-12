<x-app-layout>
    <div class="container">
        <div class="row">
            @foreach($beritas as $berita)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($berita->gambar)
                            <div class="w-32 h-32 overflow-hidden mx-auto">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" class="object-cover w-full h-full" alt="{{ $berita->judul }}">
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
