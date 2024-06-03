<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'topping_id',
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function topping(){
        return $this->belongsTo(Topping::class);
    }
}
