<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'pengguna')->get();
        $transaksi = Transaksi::where('status_pesanan', 1)->get();
        $total = $transaksi->sum('total_harga');
        $usersCount = $user->count();

        $transaksi = Transaksi::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as jumlah'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $labels = $transaksi->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('d M');
        });

        $data = $transaksi->pluck('jumlah');
        return view('admin.dashboard.index', compact('total', 'usersCount', 'labels', 'data'));
    }

    public function listUsers()
    {
        $users = User::where('role', 'pengguna')->with('wallet')->get();
        return view('admin.users.index', compact('users'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
