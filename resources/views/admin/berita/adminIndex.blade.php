@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6 bg-gray-100 min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Berita</h1>
        </div>

        <table class="min-w-full bg-white shadow-sm rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider" style="width: 200px">Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($beritas as $berita)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <a href="{{ route('admin.berita.show', $berita->id) }}"
                                class="text-blue-500 hover:underline">{{ $berita->judul }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
                                class="inline bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-8 bg-white shadow-sm rounded-lg overflow-hidden">
            <h1 class="text-3xl font-bold mb-2 mt-4 text-center text-gray-800">Tambah Berita/Tips</h1>
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" id="judul" name="judul"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        required>
                </div>
                <div class="mb-4">
                    <label for="sumber" class="block text-sm font-medium text-gray-700">Sumber</label>
                    <input type="text" id="sumber" name="sumber"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        required>
                </div>
                <div class="mb-4">
                    <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                    <textarea id="isi" name="isi" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        required></textarea>
                </div>
                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" id="gambar" name="gambar"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        @style('width:120px')>
                </div>
                <div class="justify-center text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-32">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
