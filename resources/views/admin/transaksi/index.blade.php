<x-app-layout>
    <div class="container">
        <h2>Daftar Transaksi</h2>
        @if ($transaksi->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $t)
                        <tr>
                            <td>{{ $t->user->name }}</td>
                            <td>{{ $t->created_at }}</td>
                            <td>{{ $t->status_pesanan == 0 ? 'Diproses' : 'Selesai' }}</td>
                            <td>
                                <a href="{{ route('admin.transaksi.show', $t->id) }}" class="btn btn-info">Detail</a>
                                <form action="{{ route('admin.transaksi.destroy', $t->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada transaksi yang sedang diproses.</p>
        @endif
    </div>
</x-app-layout>
