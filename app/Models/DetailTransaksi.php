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
        'diskon',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
