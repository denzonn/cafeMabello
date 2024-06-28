<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_transaction',
        'chair_id',
        'user_id',
        'total_price',
        'status',
        'notes',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function chair(){
        return $this->belongsTo(ChairNumber::class);
    }

    public function detailTransaction(){
        return $this->hasMany(DetailTransaction::class);
    }
}
