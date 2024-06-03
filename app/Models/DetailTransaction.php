<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'transaction_id',
        'quantity',
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function detailTransactionAddTopping(){
        return $this->hasMany(DetailTransactionAddTopping::class);
    }
}
