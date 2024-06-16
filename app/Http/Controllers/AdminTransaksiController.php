<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::where('status_pesanan', 0)->with('user')->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('detail_transaksi.produk', 'user')->findOrFail($id);
        return view('admin.transaksi.show', compact('transaksi'));
    }

    public function konfirmasi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $user = $transaksi->user;

        if ($transaksi->detail_transaksi->first()->pembayaran == 'poin') {
            $total = $transaksi->detail_transaksi->sum('produk.harga_produk');
            $user->wallet->poin -= $total;
            $user->wallet->save();
        }

        $transaksi->status_pesanan = 1;
        $transaksi->save();

        return redirect()->route('admin.transaksi.index')->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('admin.transaksi.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
