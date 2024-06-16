<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah_barang',
        'total_harga',
        'subtotal',
        'status_keranjang',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'keranjang_produk')->withPivot('jumlah_barang', 'subtotal');
    }

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
