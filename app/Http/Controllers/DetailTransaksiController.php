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
    public function create()
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->where('status_keranjang', '1')->firstOrFail();

        $total = $keranjang->produk->sum('pivot.subtotal');

        return view('detail_transaksi.create', compact('keranjang', 'total'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->where('status_keranjang', '1')->firstOrFail();
        $total = $keranjang->produk->sum('pivot.subtotal');

        if ($request->pembayaran == 'poin' && $user->wallet->poin >= $total) {
            $user->wallet->poin -= $total;
            $user->wallet->save();
        } elseif ($request->pembayaran == 'cash') {
            // Logika pembayaran cash
        } else {
            return redirect()->back()->with('error', 'Poin tidak mencukupi untuk pembayaran.');
        }

        $transaksi = Transaksi::create([
            'user_id' => $user->id,
            'status_pesanan' => 0,
        ]);

        foreach ($keranjang->produk as $produk) {
            DetailTransaksi::create([
                'keranjang_id' => $keranjang->id,
                'produk_id' => $produk->id,
                'transaksi_id' => $transaksi->id,
                'pembayaran' => $request->pembayaran,
            ]);
        }

        $keranjang->update(['status_keranjang' => '1']);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat.');
    }
}
