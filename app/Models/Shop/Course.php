<?php

namespace App\Models\Shop;

use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use App\Models\Shop\DiscountItem;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Tags\HasTags;
use Spatie\Tags\Tag;

use Jackiedo\Cart\Contracts\UseCartable; // Interface
use Jackiedo\Cart\Traits\CanUseCart;     // Trait

class Course extends Model implements UseCartable
{
    use CanUseCart;
    use HasFactory;
    use Sluggable;
    use HasTags;


    protected $fillable = ['title', "attributes", 'short_desc', 'slug', 'desc', 'price', 'inventory', "published_at", 'view', 'image', 'user_id'];

    protected $appends = [
        'discounted_price'
    ];

    public function getDiscountedPriceAttribute()
    {
        return $this->discountItems ? (int) $this->attributes['price'] - ($this->attributes['price'] *  ($this->discountItems->percent / 100)) : $this->attributes['price'];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function commonQuestions(): HasMany
    {
        return $this->hasMany(CommonQuestion::class, 'course_id');
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class, 'course_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function discountItems()
    {
        return $this->belongsTo(DiscountItem::class, "discount_id");
    }
}
