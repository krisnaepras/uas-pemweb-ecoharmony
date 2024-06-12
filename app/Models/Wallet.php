<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;


    protected $table = 'wallet';
    protected $fillable = [
        'user_id',
        'poin',
    ];

    //user_id
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
