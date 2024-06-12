<x-app-layout>
    <div class="container">
        <h1>Daftar Berita</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Judul</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($beritas as $berita)
                <tr>
                    <td><a href="{{ route('berita.show', $berita->id) }}">{{ $berita->judul }}</a></td>
                    <td>
                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>