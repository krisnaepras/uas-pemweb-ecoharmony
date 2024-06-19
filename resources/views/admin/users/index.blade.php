@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6 font-poppins bg-white min-h-screen">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800 font-serif">Daftar Pengguna</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Username</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Total Poin</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $user->username }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $user->wallet->poin ?? 0 }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
