<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    protected $fillable = [
        'jumlah_barang',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function detail_transaksi()
    {
        return $this->belongsTo(DetailTransaksi::class);
    }
}
