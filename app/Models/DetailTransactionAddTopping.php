<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransactionAddTopping extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_transaction_id',
        'topping_id',
    ];

    public function detailTransaction(){
        return $this->belongsTo(DetailTransaction::class);
    }

    public function topping(){
        return $this->belongsTo(Topping::class);
    }
}
