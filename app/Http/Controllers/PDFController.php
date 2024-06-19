<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DetailTransaksi;
use Barryvdh\DomPDF\Facade\Pdf;


class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $users = User::where('role', 'pengguna')->with(['transaksi' => function ($query) {
            $query->where('status_pesanan', 1);
        }])->get();
        $data = [
            'title' => 'Welcome to EcoHarmony',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('struk.pdf');
    }
}
