<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'percent',
        'expired_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'discount_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, "discount_id");
    }
}
