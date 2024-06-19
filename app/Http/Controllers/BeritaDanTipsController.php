<?php

namespace App\Http\Controllers;

use App\Models\BeritaDanTips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;

class BeritaDanTipsController extends Controller
{
    public function index()
    {
        $beritas = BeritaDanTips::all();
        return view('berita.index', compact('beritas'));
    }

    public function adminIndex()
    {
        $beritas = BeritaDanTips::all();
        return view('admin.berita.adminIndex', compact('beritas'));
    }

    public function show($id)
    {
        $berita = BeritaDanTips::findOrFail($id);
        return view('berita.show', compact('berita'));
    }
    public function showAdmin($id)
    {
        $beritaAdmin = BeritaDanTips::findOrFail($id);
        return view('admin.berita.show', compact('beritaAdmin'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'sumber' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('gambar') ? $request->file('gambar')->store('images', 'public') : null;

        BeritaDanTips::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'sumber' => $request->sumber,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.berita.create');
    }

    public function destroy($id)
    {
        $berita = BeritaDanTips::findOrFail($id);
        if ($berita->gambar) {
            Storage::delete('public/' . $berita->gambar);
        }
        $berita->delete();
        return redirect()->route('berita.index');
    }

    
}
