<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSampah;
use Illuminate\Support\Facades\Redirect;

class JenisSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisSampah = JenisSampah::all();
        return view('admin.jenissampah.index', compact('jenisSampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisSampah = JenisSampah::all();
        return view('banksampah.create', compact('jenisSampah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'poin_sampah' => 'required|numeric',
        ]);

        JenisSampah::create($request->all());

        return Redirect::route('admin.jenis-sampah.index')->with('success', 'Jenis sampah berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'poin_sampah' => 'required|numeric',
        ]);

        $jenisSampah = JenisSampah::findOrFail($id);
        $jenisSampah->update($request->all());

        return Redirect::route('admin.jenis-sampah.index')->with('success', 'Jenis sampah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisSampah = JenisSampah::findOrFail($id);
        $jenisSampah->delete();

        return Redirect::route('admin.jenis-sampah.index')->with('success', 'Jenis sampah berhasil dihapus.');
    }
}
