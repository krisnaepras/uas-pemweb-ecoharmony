<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $transaki = Transaksi::where('user_id', Auth::id())->get();
        $detailTransaksi = DetailTransaksi::where('transaksi_id', $transaki->id)->get();
        return view('transaksi.index', compact('transaki', 'detailTransaksi'));
    }

    //indexAdmin
    public function indexAdmin()
    {
        $transaksi = Transaksi::all();
        $detailTransaksi = DetailTransaksi::all();
        return view('admin.transaksi.index', compact('transaksi', 'detailTransaksi'));
    }

    public function create()
    {
        return view('transaksi.create');
    }

    // Untuk menyimpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'pembayaran' => ['required', 'in:cash,poin'],
        ]);



        $keranjang = Keranjang::where('status_keranjang', '0')
            ->where('user_id', Auth::id())
            ->with('produk')
            ->first();

        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'total_harga' => $keranjang ? $keranjang->produk->sum('pivot.subtotal') : 0,
            'pembayaran' => $request->pembayaran,
            'status_pesanan' => 0,
        ]);

        foreach ($keranjang->produk as $produk) {
            DetailTransaksi::create([
                'keranjang_id' => $keranjang->id,
                'produk_id' => $produk->id,
                'transaksi_id' => $transaksi->id,
                'jumlah_barang' => $produk->pivot->jumlah_barang,
                'subtotal' => $produk->pivot->subtotal,
            ]);
        }
    }

    public function show()
    {
        $transaksi = Transaksi::where('status_pesanan', 0)->get();
        $detailTransaksi = DetailTransaksi::where('transaksi_id', $transaksi->id)->get();

        return view('transaksi.show', compact('transaksi', 'detailTransaksi'));
    }

    // Untuk admin menyetujui pesanan
    public function showAdmin()
    {
        $transaksi = Transaksi::where('status_pesanan', 0)->get();
        $detailTransaksi = DetailTransaksi::where('transaksi_id',)->get();
        return view('admin.transaksi', compact('transaksi', 'detailTransaksi'));
    }

    public function updateStatus(Request $request)
    {
        $transaksi = Transaksi::findOrFail($request->transaksi_id);
        $transaksi->status_pesanan = 1;
        $transaksi->save();

        return redirect()->route('admin.transaksi')->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('admin.transaksi');
    }
}
