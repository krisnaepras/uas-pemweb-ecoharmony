<x-app-layout>
<div class="container">
    <h1>Konfirmasi Bank Sampah</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Jenis Sampah</th>
                <th>Berat Sampah</th>
                <th>Total Poin</th>
                <th>Tanggal Setor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banksampahs as $banksampah)
            <tr>
                <td>{{ $banksampah->id }}</td>
                <td>{{ $banksampah->user->name }}</td>
                <td>{{ $banksampah->jenisSampah->jenis_sampah }}</td>
                <td>{{ $banksampah->berat_sampah }}</td>
                <td>{{ $banksampah->total_point }}</td>
                <td>{{ $banksampah->tgl_setor }}</td>
                <td>
                    <form action="{{ route('banksampah.confirm', $banksampah->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </form>
                    <form action="{{ route('banksampah.destroy', $banksampah->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
