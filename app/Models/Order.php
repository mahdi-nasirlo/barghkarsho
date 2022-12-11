<?php

namespace App\Models;

use App\Models\Shop\Course;
use App\Models\Shop\Discount;
use App\Models\Shop\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_serial',
        'status',
        'price',
        'user_id',
        'course_id',
        'discount_percent'
    ];

    protected $appends = [
        'price_without_delivery',
        // 'amount_of_discount',
        'total_price',
    ];

    public function getTotalPriceAttribute()
    {
        return $this->attributes['price'] - $this->amount_of_discount;
    }

    public function getPriceWithoutDeliveryAttribute()
    {
        return $this->attributes['price'] - env("DELIVERY_PRICE");
    }

    // public function getAmountOfDiscountAttribute()
    // {

    //     $percent = $this->attributes['discount_percent'] === null
    //         ? 0
    //         : $this->attributes['discount_percent'] / 100;

    //     return $percent * $this->price_without_delivery;
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->morphedByMany(Course::class, 'orderable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'orderable');
    }

    public function payments()
    {
        return $this->hasMany(MyPayment::class);
    }

    public function canAccessToPayment()
    {
        return $this->status == "unpaid" or !$this->orderHasPayment();
    }

    public function orderHasPayment()
    {
        return $this->payments->isNotEmpty();
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function orderables()
    {
        return $this->morphTo();
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
