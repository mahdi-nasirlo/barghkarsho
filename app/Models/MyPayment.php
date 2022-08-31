<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'resnumber',
        'status',
        'verify_code'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
