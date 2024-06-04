<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    use HasFactory;

    protected $table = 'bank_sampah';
    protected $fillable = [
        'jenis_sampah',
        'berat_sampah',
        'total_point',
        'status_setor',
        'tanggal_setor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
