@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6 bg-gray-100 min-h-screen">
        <div class="flex justify-between">
            <div></div>
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Transaksi</h1>
            <div class="flex text-right mb-6">
                <a href="{{ route('generate-pdf') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Download Laporan
                </a>
            </div>
        </div>

        @if ($users->isEmpty())
            <p class="text-gray-700 text-center">Tidak ada pengguna yang ditemukan.</p>
        @else
            @foreach ($users as $user)
                <div class="bg-white shadow-sm rounded-lg mb-4">
                    <div class="bg-gray-200 text-gray-800 px-4 py-2 font-semibold">{{ $user->name }}</div>
                    <div class="px-4 py-2">
                        @if ($user->transaksi->isEmpty())
                            <p class="text-gray-700">Tidak ada transaksi yang ditemukan untuk pengguna ini.</p>
                        @else
                            <table class="w-full bg-white">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-center text-sm font-medium">ID</th>
                                        <th class="px-4 py-2 text-center text-sm font-medium">Total</th>
                                        <th class="px-4 py-2 text-center text-sm font-medium">Pembayaran</th>
                                        <th class="px-4 py-2 text-center text-sm font-medium">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($user->transaksi as $transaksi)
                                        <tr class="border-b hover:bg-gray-100">
                                            <td class="px-4 py-2 text-center">{{ $transaksi->id }}</td>
                                            <td class="px-4 py-2 text-center">
                                                {{ number_format($transaksi->total_harga, 2) }}</td>
                                            <td class="px-4 py-2 text-center">{{ $transaksi->pembayaran }}</td>
                                            <td class="px-4 py-2 text-center">
                                                {{ $transaksi->status_pesanan == 1 ? 'Selesai' : 'Menunggu' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

        <div class="mt-8">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Transaksi Belum Disetujui</h2>

            @if ($transaksis->isEmpty())
                <p class="text-gray-700 text-center">Tidak ada transaksi yang ditemukan.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-2 text-center text-sm font-medium">ID</th>
                                <th class="px-4 py-2 text-center text-sm font-medium">Username</th>
                                <th class="px-4 py-2 text-center text-sm font-medium">Total Harga</th>
                                <th class="px-4 py-2 text-center text-sm font-medium">Pembayaran</th>
                                <th class="px-4 py-2 text-center text-sm font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($transaksis as $trans)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="px-4 py-2 text-center">{{ $trans->id }}</td>
                                    <td class="px-4 py-2 text-center">{{ $trans->user->name }}</td>
                                    <td class="px-4 py-2 text-center">{{ number_format($trans->total_harga, 2) }}</td>
                                    <td class="px-4 py-2 text-center">{{ $trans->pembayaran }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <form action="{{ route('admin.transaksi.updateStatus') }}" method="POST"
                                            class="inline-block bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                            @csrf
                                            <input type="hidden" name="transaksi_id" value="{{ $trans->id }}">
                                            <button type="submit"
                                                class="">Konfirmasi</button>
                                        </form>
                                        <form action="{{ route('admin.transaksi.destroy', $trans->id) }}" method="POST"
                                            class="inline-block ml-2 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                >Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
