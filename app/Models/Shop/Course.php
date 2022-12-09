<?php

namespace App\Models\Shop;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Shop\DiscountItem;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Jackiedo\Cart\Contracts\UseCartable;
use Jackiedo\Cart\Traits\CanUseCart;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Tags\HasTags; // Interface
use Spatie\Tags\Tag;
// Trait

class Course extends Model implements UseCartable
{
    use CanUseCart;
    use HasFactory;
    use Sluggable;
    use HasTags;
    use HasSEO;

    protected $fillable = ['title', 'common_questions', 'attributes', "attributes", 'short_desc', 'slug', 'desc', 'price', 'inventory', "published_at", 'view', 'image', 'user_id'];

    protected $appends = [
        'discounted_price',
    ];

    public function getDiscountedPriceAttribute()
    {
        return $this->discountItem ? $this->attributes['price'] : 0;
        // return $this->discountItem ? (int) $this->attributes['price'] - ($this->attributes['price'] *  ($this->discountItem->percent / 100)) : $this->attributes['price'];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
        'attributes' => 'array',
        'common_questions' => 'array',
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

    // public function commonQuestions(): HasMany
    // {
    //     return $this->hasMany(CommonQuestion::class, 'course_id');
    // }

    // public function attributes(): HasMany
    // {
    //     return $this->hasMany(Attribute::class, 'course_id');
    // }

    public function orders()
    {
        return $this->morphToMany(Order::class, 'orderable', "orderables");
    }

    // public function discountItem()
    // {
    //     return $this->belongsTo(DiscountItem::class, "discount_id");
    // }
}
