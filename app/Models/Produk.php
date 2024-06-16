<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'stok_produk',
        'gambar_produk',
        'deskripsi_produk',
        'kategori_produk',
        'terjual'
    ];

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function keranjang()
    {
        return $this->belongsToMany(Keranjang::class, 'keranjang_produk')->withPivot('jumlah_barang', 'subtotal');
    }
}
