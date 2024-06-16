<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Tambah Produk -->
        <div class="mb-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="toggleForm()">Tambah Produk</button>
            <div id="addProductForm" class="mt-4 p-4 bg-white rounded shadow-md" style="display:none;">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" name="nama_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="harga_produk" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                        <input type="number" name="harga_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="stok_produk" class="block text-sm font-medium text-gray-700">Stok Produk</label>
                        <input type="number" name="stok_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="gambar_produk" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                        <input type="file" name="gambar_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi_produk" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                        <textarea name="deskripsi_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="kategori_produk" class="block text-sm font-medium text-gray-700">Kategori Produk</label>
                        <input type="text" name="kategori_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
                </form>
            </div>
        </div>

        <!-- Daftar Produk -->
        <div class="bg-white shadow-md rounded p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" style="width: 200px">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="javascript:void(0)" class="text-blue-500" onclick="toggleDetails({{ $product->id }})">
                                    {{ $product->nama_produk }}
                                </a>
                                <div id="productDetails{{ $product->id }}" class="mt-2 p-4 bg-gray-100 rounded shadow-inner" style="display:none;">
                                    <p>Harga: {{ $product->harga_produk }}</p>
                                    <p>Stok: {{ $product->stok_produk }}</p>
                                    <p>Kategori: {{ $product->kategori_produk }}</p>
                                    <p>Deskripsi: {{ $product->deskripsi_produk }}</p>
                                    <img src="{{ asset('images/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" class="w-24">

                                </div>
                                <div id="editProduct{{ $product->id }}" class="mt-2 p-4 bg-gray-100 rounded shadow-inner" style="display:none;">
                                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                            <input type="text" name="nama_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $product->nama_produk }}" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="harga_produk" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                                            <input type="number" name="harga_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $product->harga_produk }}" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="stok_produk" class="block text-sm font-medium text-gray-700">Stok Produk</label>
                                            <input type="number" name="stok_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $product->stok_produk }}" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="gambar_produk" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                                            <input type="file" name="gambar_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                            <img src="{{ asset('images/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" class="w-24 mt-2">
                                        </div>
                                        <div class="mb-4">
                                            <label for="deskripsi_produk" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                                            <textarea name="deskripsi_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>{{ $product->deskripsi_produk }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="kategori_produk" class="block text-sm font-medium text-gray-700">Kategori Produk</label>
                                            <input type="text" name="kategori_produk" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $product->kategori_produk }}" required>
                                        </div>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                                    </form>
                                </div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="inline-flex space-x-2">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="toggleEdit({{ $product->id }})">Edit</button>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleForm() {
            var form = document.getElementById('addProductForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

        function toggleDetails(id) {
            var details = document.getElementById('productDetails' + id);
            var editForm = document.getElementById('editProduct' + id);
            if (details.style.display === 'none' || details.style.display === '') {
                details.style.display = 'block';
                editForm.style.display = 'none';
            } else {
                details.style.display = 'none';
                editForm.style.display = 'none';
            }
        }

        function toggleEdit(id) {
            var details = document.getElementById('productDetails' + id);
            var editForm = document.getElementById('editProduct' + id);
            if (editForm.style.display === 'none' || editForm.style.display === '') {
                details.style.display = 'none';
                editForm.style.display = 'block';
            } else {
                details.style.display = 'none';
                editForm.style.display = 'none';
            }
        }
    </script>
</x-app-layout>
