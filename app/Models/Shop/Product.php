<?php

namespace App\Models\Shop;

use App\Models\Shop\Attribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
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
        "gallery",
        "slug",
        "name",
        "rating",
        "category_id"
    ];

    protected $casts = [
        "cover_tag" => "array",
        "short_information" => "array",
        'published_at' => "datetime",
        "gallery" => "array"
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    // protected $attribute = [
    //     'gallery'
    // ];

    // public function getGalleryAttribute()
    // {
    //     return $this->getMedia("product.gallery");
    // }

    // public function getCoverAttribute($value)
    // {
    //     if (empty($value) or $value == "/placeholder.webp")
    //         return "/placeholder.webp";
    //     else
    //         return asset("/storage/" . $value);
    // }

    public function attributes()
    {
        return $this->belongsToMany(
            Attribute::class,
            'attribute_category_product',
            'product_id',
            'attributes_id'
        )
            ->withPivot(['value', 'category_id']);
    }

    // public function category()
    // {
    //     return $this->morphToMany(
    //         Category::class,
    //         "categoryable",
    //     );
    // }

    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }
}
