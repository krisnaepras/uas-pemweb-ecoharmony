<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produk::all();
        return view('admin.produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi_produk' => 'required',
            'kategori_produk' => 'required',
        ]);

        $imageName = time() . '.' . $request->gambar_produk->extension();
        $request->gambar_produk->move(public_path('images'), $imageName);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'gambar_produk' => $imageName,
            'deskripsi_produk' => $request->deskripsi_produk,
            'kategori_produk' => $request->kategori_produk,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $product)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
            'gambar_produk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi_produk' => 'required',
            'kategori_produk' => 'required',
        ]);

        if ($request->hasFile('gambar_produk')) {
            $imageName = time() . '.' . $request->gambar_produk->extension();
            $request->gambar_produk->move(public_path('images'), $imageName);
            $product->gambar_produk = $imageName;
        }

        $product->update($request->except(['gambar_produk']));

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
