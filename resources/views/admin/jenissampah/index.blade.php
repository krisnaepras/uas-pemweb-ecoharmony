<x-app-layout>
    <div class="container">
        <h1>Kelola Jenis Sampah</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <button class="btn btn-primary" id="toggleForm">Tambah Data Baru</button>

        <div id="formContainer" style="display: none; margin-top: 20px;">
            <form action="{{ route('admin.jenis-sampah.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
                    <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" required>
                </div>
                <div class="mb-3">
                    <label for="poin_sampah" class="form-label">Poin Sampah</label>
                    <input type="number" class="form-control" id="poin_sampah" name="poin_sampah" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>

        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Jenis Sampah</th>
                    <th scope="col">Poin Sampah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisSampah as $sampah)
                    <tr>
                        <td>{{ $sampah->jenis_sampah }}</td>
                        <td>{{ $sampah->poin_sampah }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm editButton" data-id="{{ $sampah->id }}"
                                data-jenis_sampah="{{ $sampah->jenis_sampah }}"
                                data-poin_sampah="{{ $sampah->poin_sampah }}">Edit</button>
                            <form action="{{ route('admin.jenis-sampah.destroy', $sampah->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('toggleForm').addEventListener('click', function() {
            var formContainer = document.getElementById('formContainer');
            if (formContainer.style.display === 'none') {
                formContainer.style.display = 'block';
            } else {
                formContainer.style.display = 'none';
            }
        });

        document.querySelectorAll('.editButton').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var jenis_sampah = this.getAttribute('data-jenis_sampah');
                var poin_sampah = this.getAttribute('data-poin_sampah');

                var formContainer = document.getElementById('formContainer');
                formContainer.style.display = 'block';

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
                jenisSampahField.className = 'mb-3';
                jenisSampahField.innerHTML = `
                    <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
                    <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" value="${jenis_sampah}" required>
                `;
                form.appendChild(jenisSampahField);

                var poinSampahField = document.createElement('div');
                poinSampahField.className = 'mb-3';
                poinSampahField.innerHTML = `
                    <label for="poin_sampah" class="form-label">Poin Sampah</label>
                    <input type="number" class="form-control" id="poin_sampah" name="poin_sampah" value="${poin_sampah}" required>
                `;
                form.appendChild(poinSampahField);

                var submitButton = document.createElement('button');
                submitButton.type = 'submit';
                submitButton.className = 'btn btn-success';
                submitButton.textContent = 'Update';
                form.appendChild(submitButton);

                formContainer.innerHTML = '';
                formContainer.appendChild(form);
            });
        });
    </script>
</x-app-layout>
