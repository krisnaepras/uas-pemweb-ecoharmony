<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $fillable = ['keranjang_id', 'produk_id', 'transaksi_id', 'jumlah_barang', 'subtotal'];


    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
