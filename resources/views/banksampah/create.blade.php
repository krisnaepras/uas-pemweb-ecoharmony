<!-- resources/views/banksampah/create.blade.php -->

<x-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('banksampah.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="jenis_sampah">Jenis Sampah:</label>
                                <select name="jenis_sampah" class="form-control" id="jenis_sampah">
                                    <option value="">Pilih Jenis Sampah</option>
                                    @foreach ($jenisSampah as $sampah)
                                        <option value="{{ $sampah->id }}">{{ $sampah->jenis_sampah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="berat_sampah">Berat Sampah:</label>
                                <input type="text" name="berat_sampah" class="form-control" id="berat_sampah">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_setor">Tanggal Ingin Setor:</label>
                                <input type="date" name="tanggal_setor" class="form-control" id="tanggal_setor">
                            </div>
                            <!-- tambahkan input fields sesuai kebutuhan -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
