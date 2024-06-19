<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\BeritaDanTips;

class UserController extends Controller
{
    public function index()
    {
        // Mendapatkan 3 berita terbaru
        $beritaTerbaru = BeritaDanTips::orderBy('created_at', 'desc')->take(3)->get();

        // Mendapatkan produk unggulan secara acak
        $produkUnggulan = Produk::inRandomOrder()->take(3)->get();

        return view('user.index', compact('beritaTerbaru', 'produkUnggulan'));
    }
}
