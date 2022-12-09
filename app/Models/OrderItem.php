<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'orderables';

    protected $fillable = [
        'orderable_id',
        'orderable_type',
        'price',
    ];

    public $timestamps  = false;

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
