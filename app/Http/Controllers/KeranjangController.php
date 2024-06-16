<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\KeranjangProduk;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::where('status_keranjang', '0')
            ->where('user_id', Auth::id())
            ->with('produk')
            ->first();

        $total = $keranjang ? $keranjang->produk->sum('pivot.subtotal') : 0;

        return view('keranjang.index', compact('keranjang', 'total'));
    }

    public function store(Request $request)
    {
        $produk = Produk::find($request->produk_id);

        $keranjang = Keranjang::firstOrCreate([
            'user_id' => Auth::id(),
            'status_keranjang' => '0'
        ]);

        $keranjangProduk = $keranjang->produk()->where('produk_id', $request->produk_id)->first();

        if ($keranjangProduk) {
            $keranjangProduk->pivot->jumlah_barang += $request->jumlah_barang;
            $keranjangProduk->pivot->subtotal += $produk->harga_produk * $request->jumlah_barang;
            $keranjangProduk->pivot->save();
        } else {
            $keranjang->produk()->attach($request->produk_id, [
                'jumlah_barang' => $request->jumlah_barang,
                'subtotal' => $produk->harga_produk * $request->jumlah_barang
            ]);
        }

        // Update status keranjang menjadi '1' setelah checkout
        // $keranjang->update(['status_keranjang' => '1']);

        // Redirect langsung ke halaman detail transaksi setelah checkout
        return redirect()->route('detail_transaksi.create')->with('success', 'Checkout berhasil, lanjutkan ke transaksi.');
    }


    public function update(Request $request, $id)
{
    // Cari keranjang dengan user yang sedang login dan status 0
    $keranjang = Keranjang::where('user_id', Auth::id())->where('status_keranjang', '0')->firstOrFail();

    // Cari produk dalam keranjang
    $keranjangProduk = $keranjang->produk()->where('produk_id', $id)->firstOrFail();

    // Update jumlah barang dan subtotal
    $keranjangProduk->pivot->jumlah_barang = $request->jumlah_barang;
    $keranjangProduk->pivot->subtotal = $keranjangProduk->harga_produk * $request->jumlah_barang;
    $keranjangProduk->pivot->save();

    return redirect()->back()->with('success', 'Jumlah barang berhasil diperbarui');
}

    public function destroy($produk_id)
    {
        $keranjang = Keranjang::where('user_id', Auth::id())
            ->where('status_keranjang', '0')
            ->first();

        if ($keranjang) {
            $keranjang->produk()->detach($produk_id);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function checkout()
{
    $user = Auth::user();
    $keranjang = Keranjang::where('user_id', $user->id)->where('status_keranjang', '0')->firstOrFail();

    // Update status keranjang menjadi '1'
    $keranjang->update(['status_keranjang' => '1']);

    // Redirect ke halaman pembuatan detail transaksi
    return redirect()->route('detail_transaksi.create')->with('success', 'Checkout berhasil, lanjutkan ke transaksi.');
}

}
