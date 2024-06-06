<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankSampah;
use App\Models\User;
use App\Models\JenisSampah; // Add this line
use Illuminate\Support\Facades\Auth;

class BankSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan data bank sampah yang belum dikonfirmasi
        $banksampahs = BankSampah::where('status_setor', 'Belum Dikonfirmasi')->with('user')->get();
        return view('banksampah.index', compact('banksampahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisSampah = JenisSampah::all();
        return view('banksampah.create', compact('jenisSampah'));
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
    public function destroy(string $id)
    {
        //
    }
}
