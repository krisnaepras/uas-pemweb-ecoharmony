<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $fillable = [
        'subtotal',
        'total',
    ];


    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
