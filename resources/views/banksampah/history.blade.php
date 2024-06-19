<x-app-layout>
    <div class="container mx-auto p-6 font-poppins bg-gray-100 h-screen">
        <h1 class="text-2xl text-green-950 font-bold mb-6 text-center">Riwayat Bank Sampah</h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            @if ($banksampahs->isEmpty())
                <p class="text-gray-700">Tidak ada riwayat setoran.</p>
            @else
                <table class="min-w-full bg-green-100 border border-green-500 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">User</th>
                            <th class="px-4 py-2 border">Jenis Sampah</th>
                            <th class="px-4 py-2 border">Berat Sampah</th>
                            <th class="px-4 py-2 border">Total Poin</th>
                            <th class="px-4 py-2 border">Tanggal Setor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banksampahs as $banksampah)
                            <tr class="bg-green-200">
                                <td class="px-4 py-2 border text-center">{{ $banksampah->id }}</td>
                                <td class="px-4 py-2 border text-center">{{ optional($banksampah->user)->name ?? 'User Tidak Ditemukan' }}</td>
                                <td class="px-4 py-2 border text-center">{{ optional($banksampah->jenisSampah)->jenis_sampah ?? 'Jenis Sampah Tidak Ditemukan' }}</td>
                                <td class="px-4 py-2 border text-center">{{ $banksampah->berat_sampah }}</td>
                                <td class="px-4 py-2 border text-center">{{ $banksampah->total_point }}</td>
                                <td class="px-4 py-2 border text-center">{{ $banksampah->tgl_setor }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="mt-4">
                <a href="{{ route('banksampah.create') }}"
                    class="block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg w-full text-center">Kembali
                    ke Setor Sampah</a>
            </div>
        </div>
    </div>
</x-app-layout>
