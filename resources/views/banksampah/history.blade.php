<x-app-layout>
<div class="container">
    <h1>Riwayat Bank Sampah</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Jenis Sampah</th>
                <th>Berat Sampah</th>
                <th>Total Poin</th>
                <th>Tanggal Setor</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
