<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaDanTips extends Model
{
    use HasFactory;

    protected $table = 'berita_dan_tips';
    protected $fillable = [
        'judul',
        'isi',
        'sumber',
        'gambar',
    ];
}
