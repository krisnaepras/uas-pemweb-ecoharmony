<x-app-layout>
    <div class="container mx-auto p-12 flex justify-center bg-green-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($beritas as $berita)
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                    @if($berita->gambar)
                        <img class="w-full h-48 object-cover justify-center" src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                    @endif
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 text-center font-serif">{{ $berita->judul }}</div>
                        <p class="text-gray-700 text-base">{{ Str::limit($berita->deskripsi, 100) }}</p>
                    </div>
                    <div class="px-6 pt-4 pb-2 flex justify-center mb-10">
                        <a href="{{ route('berita.show', $berita->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
