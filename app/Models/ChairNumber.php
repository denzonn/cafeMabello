<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChairNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'status'
    ];
}
