<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangProduk extends Model
{
    use HasFactory;

    protected $table = 'keranjang_produk';

    protected $fillable = ['keranjang_id', 'produk_id', 'jumlah_barang', 'subtotal'];

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
