<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankSampah;
use App\Models\User;
use App\Models\JenisSampah;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class BankSampahController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisSampah = JenisSampah::all();
        $banksampahs = BankSampah::where('status_setor', '0')->with('user')->get();
        return view('banksampah.create', compact('jenisSampah', 'banksampahs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $request->validate([
                'jenis_sampah' => 'required|exists:jenis_sampah,id',
                'berat_sampah' => 'required|numeric',
                'tanggal_setor' => 'required|date',
            ]);

            $jenisSampah = JenisSampah::find($request->jenis_sampah);
            $totalPoint = $jenisSampah->poin_sampah * $request->berat_sampah;

            $bankSampah = new BankSampah($request->all());
            $bankSampah->user_id = auth()->user()->id;
            $bankSampah->jenis_sampah_id = $request->jenis_sampah;
            $bankSampah->tgl_setor = $request->tanggal_setor;
            $bankSampah->total_point = $totalPoint;
            $bankSampah->save();

            return redirect()->route('banksampah.create')->with('success', 'Data bank sampah berhasil ditambahkan.');
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bankSampah = BankSampah::findOrFail($id);
        $bankSampah->delete();

        return redirect()->route('banksampah.confirmation')->with('success', 'Data bank sampah berhasil dihapus.');
    }


    public function confirm($id)
    {
        $bankSampah = BankSampah::findOrFail($id);

        if ($bankSampah->status_setor != 1) {
            $bankSampah->status_setor = 1;
            $bankSampah->save();

            $wallet = Wallet::firstOrNew(['user_id' => $bankSampah->user_id]);
            $wallet->poin += $bankSampah->total_point;
            $wallet->save();

            return redirect()->route('banksampah.confirmation')->with('success', 'Data bank sampah berhasil dikonfirmasi dan poin telah ditambahkan ke wallet user.');
        }

        return redirect()->route('banksampah.confirmation')->with('info', 'Data bank sampah sudah pernah dikonfirmasi sebelumnya.');
    }

    

    public function history()
    {
        $banksampahs = BankSampah::where('status_setor', '1')->with('user', 'jenisSampah')->get();
        return view('banksampah.history', compact('banksampahs'));
    }
    public function historyAdmin()
    {
        $banksampahs = BankSampah::where('status_setor', '1')->with('user', 'jenisSampah')->get();
        $setoran = BankSampah::where('status_setor', '0')->with('user', 'jenisSampah')->get();

        return view('admin.banksampah.history', compact('banksampahs', 'setoran'));
    }
}
