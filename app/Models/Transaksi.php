<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;


    protected $table = 'transaksi';
    protected $fillable = [
        'total_transaksi',
        'status_pesanan',
    ];

    //detail_transaksi
    public function detail_transaksi()
    {
        return $this->belongsTo(DetailTransaksi::class);
    }
}
