<x-app-layout>
    <div class="container mx-auto p-12 bg-green-200">
        <h1 class="text-3xl font-bold font-serif mb-8 text-center text-green-800">Transaksi Belum Disetujui</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            @if ($transaksi->isEmpty())
                <div class="p-6">
                    <p class="text-gray-700">Tidak ada transaksi yang ditemukan.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-green-800">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    ID</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Total Harga</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Pembayaran</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($transaksi as $trx)
                                <tr>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $trx->id }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ number_format($trx->total_harga, 2) }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $trx->pembayaran }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <span
                                            class="px-4 py-3 inline-flex text-xs leading-5 font-semibold rounded-full {{ $trx->status_pesanan == 1 ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $trx->status_pesanan == 1 ? 'Selesai' : 'Menunggu' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
