<x-app-layout>
    <div class="container">
        <h1>Tambah Berita/Tips</h1>
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="sumber" class="form-label">Sumber</label>
                <input type="text" class="form-control" id="sumber" name="sumber" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
