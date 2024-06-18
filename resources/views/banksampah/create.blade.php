
<x-app-layout>
<div class="container mx-auto p-6 font-poppins bg-white min-h-screen">
<div class="bg-white rounded-lg p-8 shadow-lg w-full max-w-10xl">
<h1 class="text-4xl text-green-950 font-bold text-center mb-6">Bank Sampah Desa Janti</h1>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body bg-white rounded-lg p-8">
                        <form method="POST" action="{{ route('banksampah.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                        <label for="jenis_sampah">Jenis Sampah :</label>
                        <select name="jenis_sampah" class="form-control w-full p-2 border border-green-500 rounded-lg" id="jenis_sampah">
                            <option value="">Pilih Jenis Sampah</option>
                            @foreach ($jenisSampah as $sampah)
                                <option value="{{ $sampah->id }}">{{ $sampah->jenis_sampah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="berat_sampah">Berat Sampah (gram) :</label>
                        <input type="text" name="berat_sampah" class="form-control w-full p-2 border border-green-500 rounded-lg" id="berat_sampah">
                    </div>
                    <div class="form-group mb-4">
                        <label for="tanggal_setor">Tanggal Ingin Setor :</label>
                        <input type="date" name="tanggal_setor" class="form-control w-full p-2 border border-green-500 rounded-lg" id="tanggal_setor">
                    </div>
                    <button type="submit" class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg w-full mb-4">Setor Sampah</button>
                    <a href="{{ route('banksampah.history') }}" class="block bg-emerald-950 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-lg w-full text-center">Riwayat Setor</a>
                </form>
                        <!-- Tambahkan bagian ini untuk menampilkan data bank sampah yang belum dikonfirmasi -->
                        <div class="mt-8">
                            <h2 class="text-lg font-bold mb-4">Data Bank Sampah Belum Dikonfirmasi</h2>
                            @if ($banksampahs->isEmpty())
                                <p>Tidak ada data yang belum dikonfirmasi.</p>
                                @else
                                <div class="overflow-hidden rounded-lg">
                                    <table class="table-auto w-full bg-green-100">
                                        <thead>
                                            <tr class="bg-green-800 text-white">
                                                <th class="px-4 py-2">Jenis Sampah</th>
                                                <th class="px-4 py-2">Berat Sampah (gram)</th>
                                                <th class="px-4 py-2">Tanggal Setor</th>
                                                <th class="px-4 py-2">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banksampahs as $banksampah)
                                                <tr class="bg-green-200">
                                                    <td class="border px-4 py-2 text-center">{{ $banksampah->jenisSampah->jenis_sampah }}</td>
                                                    <td class="border px-4 py-2 text-center">{{ $banksampah->berat_sampah }}</td>
                                                    <td class="border px-4 py-2 text-center">{{ $banksampah->tgl_setor }}</td>
                                                    <td class="border px-4 py-2 text-center">Menunggu dikonfirmasi</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <!-- End of data display section -->

                        <!-- Lokasi Bank Sampah -->
                <div class="mt-8">
                    <h2 class="text-lg text-green-950 font-bold mb-4">Lokasi Bank Sampah Desa Janti</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15819.909029645203!2d112.31883817503704!3d-7.577454108504147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e786b86b780dd09%3A0xc94121098db1912f!2sJanti%2C%20Kec.%20Mojoagung%2C%20Kabupaten%20Jombang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1718702946927!5m2!1sid!2sid" width="100%" height="450" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>