<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    use HasFactory;

    protected $table = 'bank_sampah';
    protected $fillable = [
        'berat_sampah',
        'total_point',
        'status_setor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function JenisSampah() {
        return $this->belongsTo(JenisSampah::class);
    }
}
