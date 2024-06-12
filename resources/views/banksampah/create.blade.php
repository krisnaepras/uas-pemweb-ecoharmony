<!-- resources/views/banksampah/create.blade.php -->

<x-app-layout>
    <div class="container bg-green-200 w-full h-screen flex">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body bg-white rounded-lg p-8">
                        <form method="POST" action="{{ route('banksampah.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="jenis_sampah">Jenis Sampah:</label>
                                <select name="jenis_sampah" class="form-control" id="jenis_sampah">
                                    <option value="">Pilih Jenis Sampah</option>
                                    @foreach ($jenisSampah as $sampah)
                                        <option value="{{ $sampah->id }}">{{ $sampah->jenis_sampah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="berat_sampah">Berat Sampah:</label>
                                <input type="text" name="berat_sampah" class="form-control" id="berat_sampah">
                            </div>
                            <div class="form-group mb-4">
                                <label for="tanggal_setor">Tanggal Ingin Setor:</label>
                                <input type="date" name="tanggal_setor" class="form-control" id="tanggal_setor">
                            </div>
                            <!-- tambahkan input fields sesuai kebutuhan -->
                            <button type="submit"
                                class="btn bg-green-500 rounded-lg justify-center p-4">Submit</button>
                        </form>

                        <!-- Tambahkan bagian ini untuk menampilkan data bank sampah yang belum dikonfirmasi -->
                        <div class="mt-8">
                            <h2 class="text-lg font-bold mb-4">Data Bank Sampah Belum Dikonfirmasi</h2>
                            @if ($banksampahs->isEmpty())
                                <p>Tidak ada data yang belum dikonfirmasi.</p>
                            @else
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2">Jenis Sampah</th>
                                            <th class="px-4 py-2">Berat Sampah</th>
                                            <th class="px-4 py-2">Tanggal Setor</th>
                                            <th class="px-4 py-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banksampahs as $banksampah)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $banksampah->jenisSampah->jenis_sampah }}</td>
                                                <td class="border px-4 py-2">{{ $banksampah->berat_sampah }}</td>
                                                <td class="border px-4 py-2">{{ $banksampah->tgl_setor }}</td>
                                                <td class="border px-4 py-2">Belum dikonfirmasi</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- End of data display section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
