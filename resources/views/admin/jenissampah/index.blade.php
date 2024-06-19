@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6 font-poppins">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800 font-serif">Kelola Jenis Sampah</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenis Sampah</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Poin Sampah</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider" style="width: 200px;">Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($jenisSampah as $sampah)
                    <tr class="border-b">
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $sampah->jenis_sampah }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $sampah->poin_sampah }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded-full editButton"
                                data-id="{{ $sampah->id }}" data-jenis_sampah="{{ $sampah->jenis_sampah }}"
                                data-poin_sampah="{{ $sampah->poin_sampah }}">Edit</button>
                            <form action="{{ route('admin.jenis-sampah.destroy', $sampah->id) }}" method="POST"
                                class="inline bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button id="toggleForm"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 mb-4">Tambah Data
            Baru</button>

        <div id="formContainer" class="hidden">
            <form action="{{ route('admin.jenis-sampah.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="jenis_sampah" class="block text-sm font-medium text-gray-700">Jenis Sampah</label>
                    <input type="text" id="jenis_sampah" name="jenis_sampah"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        required>
                </div>
                <div class="mb-4">
                    <label for="poin_sampah" class="block text-sm font-medium text-gray-700">Poin Sampah</label>
                    <input type="number" id="poin_sampah" name="poin_sampah"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        required>
                </div>
                <div class="bg-green-600 hover:bg-green-700 text-center text-white font-bold py-2 px-4 rounded"
                    style="width: 120px;">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('toggleForm').addEventListener('click', function() {
            var formContainer = document.getElementById('formContainer');
            formContainer.classList.toggle('hidden');
        });

        document.querySelectorAll('.editButton').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var jenis_sampah = this.getAttribute('data-jenis_sampah');
                var poin_sampah = this.getAttribute('data-poin_sampah');

                var formContainer = document.getElementById('formContainer');
                formContainer.classList.remove('hidden');

                var form = document.createElement('form');
                form.action = '/admin/jenis-sampah/' + id;
                form.method = 'POST';

                var csrfField = document.createElement('input');
                csrfField.type = 'hidden';
                csrfField.name = '_token';
                csrfField.value = '{{ csrf_token() }}';
                form.appendChild(csrfField);

                var methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'PUT';
                form.appendChild(methodField);

                var jenisSampahField = document.createElement('div');
                jenisSampahField.className = 'mb-4';
                jenisSampahField.innerHTML = `
                    <label for="jenis_sampah" class="block text-sm font-medium text-gray-700">Jenis Sampah</label>
                    <input type="text" id="jenis_sampah" name="jenis_sampah"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        value="${jenis_sampah}" required>
                `;
                form.appendChild(jenisSampahField);

                var poinSampahField = document.createElement('div');
                poinSampahField.className = 'mb-4';
                poinSampahField.innerHTML = `
                    <label for="poin_sampah" class="block text-sm font-medium text-gray-700">Poin Sampah</label>
                    <input type="number" id="poin_sampah" name="poin_sampah"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        value="${poin_sampah}" required>
                `;
                form.appendChild(poinSampahField);

                var submitButton = document.createElement('button');
                submitButton.type = 'submit';
                submitButton.className =
                    'bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-full';
                submitButton.textContent = 'Update';
                form.appendChild(submitButton);

                formContainer.innerHTML = '';
                formContainer.appendChild(form);
            });
        });
    </script>
@endsection
