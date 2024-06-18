<x-app-layout>
    <div class="container">
        <h1>Daftar Transaksi Belum Disetujui</h1>

        @if ($transaksi->isEmpty())
            <p>Tidak ada transaksi yang ditemukan.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Total Harga</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $transaksi)
                        <tr>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $transaksi->user->name }}</td>
                            <td>{{ number_format($transaksi->total_harga, 2) }}</td>
                            <td>{{ $transaksi->pembayaran }}</td>
                            <td>
                                <form action="{{ route('admin.transaksi.updateStatus') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="transaksi_id" value="{{ $transaksi->id }}">
                                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                                </form>
                                <form action="{{ route('admin.Ztransaksi.destroy', $transaksi->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
