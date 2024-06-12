<x-app-layout>
    <div class="container">
        <h1>{{ $berita->judul }}</h1>
        @if($berita->gambar)
            <div class="w-64 h-64 overflow-hidden mx-auto">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="object-cover w-full h-full">
            </div>
        @endif
        <p>{{ $berita->isi }}</p>
        <p><small>Sumber: {{ $berita->sumber }}</small></p>
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
</x-app-layout>
