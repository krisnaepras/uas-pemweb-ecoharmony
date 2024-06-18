<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class DetailTransaksiController extends Controller
{


    public function create()
    {
        // Mendapatkan keranjang yang belum diproses
        $keranjang = Keranjang::where('status_keranjang', '0')
            ->where('user_id', Auth::id())
            ->with('produk')
            ->first();

        // Menghitung total harga keranjang
        $total_harga = $keranjang ? $keranjang->produk->sum('pivot.subtotal') : 0;

        // Mendapatkan wallet pengguna
        $wallet = Wallet::where('user_id', Auth::id())->first();

        // Mengirim data ke view
        return view('transaksi.create', [
            'keranjang' => $keranjang,
            'total_harga' => $total_harga,
            'wallet' => $wallet,
        ]);

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

        $total_harga = $keranjang ? $keranjang->produk->sum('pivot.subtotal') : 0;

        if ($request->pembayaran == 'poin') {
            $wallet = Wallet::where('user_id', Auth::id())->first();
            if ($wallet->poin < $total_harga) {
                return redirect()->back()->withErrors(['pembayaran' => 'Poin tidak mencukupi untuk melakukan transaksi ini.']);
            }
            // Kurangi poin di wallet
            $wallet->poin -= $total_harga;
            $wallet->save();
        }

        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'total_harga' => $total_harga,
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

        return redirect()->route('transaksi.show')->with('success', 'Transaksi berhasil dibuat.');
    }
}
