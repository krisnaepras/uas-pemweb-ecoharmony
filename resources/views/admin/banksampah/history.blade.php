@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6 bg-gray-100 min-h-screen">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Konfirmasi Bank Sampah</h1>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    {{ session('success') }}
                </div>
            @endif
            <div class="overflow-x-auto">
                @if ($setoran->isEmpty())
                    <div class="text-center text-gray-500">
                        Tidak ada setor sampah yang perlu dikonfirmasi.
                    </div>
                @else
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-3 px-4 text-center text-xs font-medium uppercase tracking-wider">ID</th>
                                <th class="py-3 px-4 text-center text-xs font-medium uppercase tracking-wider">User</th>
                                <th class="py-3 px-4 text-center text-xs font-medium uppercase tracking-wider">Jenis Sampah</th>
                                <th class="py-3 px-4 text-center text-xs font-medium uppercase tracking-wider">Berat Sampah</th>
                                <th class="py-3 px-4 text-center text-xs font-medium uppercase tracking-wider">Total Poin</th>
                                <th class="py-3 px-4 text-center text-xs font-medium uppercase tracking-wider">Tanggal Setor</th>
                                <th class="py-3 px-4 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($setoran as $banksampah)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-3 px-4 text-center">{{ $banksampah->id }}</td>
                                    <td class="py-3 px-4 text-center">{{ optional($banksampah->user)->name ?? 'User Tidak Ditemukan' }}</td>
                                    <td class="py-3 px-4 text-center">{{ optional($banksampah->jenisSampah)->jenis_sampah ?? 'Jenis Sampah Tidak Ditemukan' }}</td>
                                    <td class="py-3 px-4 text-center">{{ $banksampah->berat_sampah }}</td>
                                    <td class="py-3 px-4 text-center">{{ $banksampah->total_point }}</td>
                                    <td class="py-3 px-4 text-center">{{ $banksampah->tgl_setor }}</td>
                                    <td class="py-3 px-4 flex justify-center space-x-2">
                                        <form action="{{ route('banksampah.confirm', $banksampah->id) }}" method="POST" class="inline bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            @csrf
                                            <button type="submit" >Konfirmasi</button>
                                        </form>
                                        <form action="{{ route('banksampah.destroy', $banksampah->id) }}" method="POST" class="inline bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" >Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Riwayat Bank Sampah</h1>
            @if ($banksampahs->isEmpty())
                <div class="text-center text-gray-500">
                    Tidak ada riwayat setoran.
                </div>
            @else
                <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">ID</th>
                            <th class="px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">User</th>
                            <th class="px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Jenis Sampah</th>
                            <th class="px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Berat Sampah</th>
                            <th class="px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Total Poin</th>
                            <th class="px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Tanggal Setor</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($banksampahs as $banksampah)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="px-4 py-2 text-center">{{ $banksampah->id }}</td>
                                <td class="px-4 py-2 text-center">{{ optional($banksampah->user)->name ?? 'User Tidak Ditemukan' }}</td>
                                <td class="px-4 py-2 text-center">{{ optional($banksampah->jenisSampah)->jenis_sampah ?? 'Jenis Sampah Tidak Ditemukan' }}</td>
                                <td class="px-4 py-2 text-center">{{ $banksampah->berat_sampah }}</td>
                                <td class="px-4 py-2 text-center">{{ $banksampah->total_point }}</td>
                                <td class="px-4 py-2 text-center">{{ $banksampah->tgl_setor }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
