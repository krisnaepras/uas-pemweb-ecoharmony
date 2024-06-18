<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\DetailTransaksi;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::where('user_id', Auth::id())
            ->where('status_pesanan', 1)
            ->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function indexAdmin()
    {
        $users = User::with(['transaksi' => function ($query) {
            $query->where('status_pesanan', 1);
        }])->get();

        return view('admin.transaksi.index', compact('users'));
    }
    public function show()
    {
        $transaksi = Transaksi::where('user_id', Auth::id())
            ->where('status_pesanan', 0)
            ->get();

        return view('transaksi.show', compact('transaksi'));
    }

    // Untuk admin menyetujui pesanan
    public function showAdmin()
    {
        $transaksi = Transaksi::where('status_pesanan', 0)
            ->with('user')
            ->get();

        return view('admin.transaksi.show', compact('transaksi'));
    }

    public function updateStatus(Request $request)
    {
        $transaksi = Transaksi::findOrFail($request->transaksi_id);

        if ($transaksi->pembayaran == 'poin' && $transaksi->status_pesanan == 0) {
            $wallet = Wallet::where('user_id', $transaksi->user_id)->first();
            if ($wallet->poin < $transaksi->total_harga) {
                return redirect()->back()->withErrors(['pembayaran' => 'Poin pengguna tidak mencukupi untuk menyetujui transaksi ini.']);
            }
            // Kurangi poin di wallet
            $wallet->poin -= $transaksi->total_harga;
            $wallet->save();
        }

        $transaksi->status_pesanan = 1;
        $transaksi->save();

        return redirect()->route('admin.transaksi.show')->with('success', 'Status pesanan berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('admin.transaksi');
    }
}
