<?php

namespace App\Models\Shop;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Shop\Attribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Jackiedo\Cart\Contracts\UseCartable;
use Jackiedo\Cart\Traits\CanUseCart;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia, UseCartable
{
    use HasFactory;
    use CanUseCart;
    use HasSEO;
    use Sluggable;
    use InteractsWithMedia;

    protected $fillable = [
        "content",
        "published_at",
        "inventory",
        "cover_tag",
        "price",
        "cover",
        "short_information",
        "short_desc",
        "cover_hover",
        // "gallery",
        "slug",
        "name",
        "category_id"
    ];

    protected $casts = [
        "cover_tag" => "array",
        "short_information" => "array",
        'published_at' => "datetime",
        // "gallery" => "array"
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $attribute = [
        'gallery',
        'discounted_price',
        // 'rate'
    ];

    protected $appends = [
        'discounted_price',
        'rate'
    ];

    public function getRateAttribute()
    {
        if (!$this->comments()->count()) {
            return 0;
        }

        return ($this->comments()->sum('rating') / $this->comments()->count());
    }

    public function getGalleryAttribute()
    {
        return $this->getMedia("product.gallery");
    }

    public function getDiscountedPriceAttribute()
    {
        // return $this->attributes['price'];
        // return $this->discountItem ? $this->attributes['price'] : 0;
        return $this->discountItem ? (int) $this->attributes['price'] - ($this->attributes['price'] *  ($this->discountItem->percent / 100)) : $this->attributes['price'];
    }
    // FIXME check discord item percent if expierd is past

    public function getCoverUrl()
    {
        if (empty($this->cover))
            return "/placeholder.webp";
        else
            return "/storage/" . $this->cover;
    }

    public function attributes()
    {
        return $this->belongsToMany(
            Attribute::class,
            'attribute_product',
            'product_id',
            'attributes_id'
        )
            ->withPivot(['value']);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // public function category()
    // {
    //     return $this->morphToMany(
    //         Category::class,
    //         "categoryable",
    //     );
    // }


    public function orders()
    {
        return $this->morphToMany(Order::class, 'orderable');
    }

    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }

    public function discountItem()
    {
        return $this->belongsTo(DiscountItem::class, "discount_id");
    }
}
