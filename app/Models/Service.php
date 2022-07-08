<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'message',
        'item_id'
    ];


    public function items()
    {
        return $this->belongsTo(ServiceItem::class, 'item_id');
    }
}
