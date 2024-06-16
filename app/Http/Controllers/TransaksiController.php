<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $transaksi = Transaksi::where('user_id', $user->id)
            ->with('detail_transaksi.keranjang.produk')
            ->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function adminIndex()
    {
        $transaksi = Transaksi::with('user', 'detail_transaksi.keranjang.produk')
            ->whereHas('detail_transaksi.keranjang', function ($query) {
                $query->where('status_keranjang', '1');
            })
            ->get();

        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function confirm($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status_pesanan = 1;
        $transaksi->save();

        return redirect()->back()->with('success', 'Transaksi berhasil dikonfirmasi.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
    }
}
