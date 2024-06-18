<x-app-layout>
    <div class="container mx-auto py-12 bg-green-200">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4">
                <h1 class="text-3xl font-bold mb-4 text-center text-green-800 font-serif">{{ $berita->judul }}</h1>

                @if($berita->gambar)
                    <div class="w-full h-64 mb-4">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="object-cover w-full h-full rounded-lg shadow">
                    </div>
                @endif

                <p class="text-gray-700 text-lg leading-relaxed mb-4 text-justify">{{ $berita->isi }}</p>
                <p class="text-gray-600"><small>Sumber: {{ $berita->sumber }}</small></p>
                <p class="text-gray-600"><small>Tanggal: {{ $berita->created_at }}</small></p>
            </div>

            <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end">
                <a href="{{route('berita.index')}}" class="bg-green-800 hover:bg-green-400 text-white font-bold py-2 px-4 rounded-lg">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>