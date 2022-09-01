<?php

namespace App\Models;

use App\Models\Shop\Course;
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
        'course_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
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
}
