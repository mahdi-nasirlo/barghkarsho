<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'mobiles',
        'discount_value',
        "expired_at",
        "type",
        "is_delivery_free",
        "exception_product_category_id",
        "min_order_value"
    ];

    protected $casts = [
        'mobiles' => 'array'
    ];

    public function discountCategories()
    {
        return $this->belongsToMany(ShopCategory::class, "category_discount", "discount_id", "category_id");
    }

    public function discountUsers()
    {
        return $this->belongsToMany(User::class, "discount_user", "discount_id", "user_id");
    }

    public function discountProducts()
    {
        return $this->belongsToMany(Product::class, "discount_product", "discount_id", "product_id");
    }

    public function discountCourses()
    {
        return $this->belongsToMany(Course::class, "course_discount", "discount_id", "course_id");
    }
}
