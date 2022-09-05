<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop\Course;

class DiscountItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'percent',
        'expired_at'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, "discount_id");
    }
}
