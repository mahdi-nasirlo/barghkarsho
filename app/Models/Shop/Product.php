<?php

namespace App\Models\Shop;

use App\Models\Shop\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "content",
        "published_at",
        "inventory",
        "cover_tag",
        "price",
        "cover",
        "gallery",
        "slug",
        "name",
        "rating",
        "category_id"
    ];

    protected $casts = [
        "cover_tag" => "array",
        'published_at' => "datetime",
        "gallery" => "array"
    ];

    // protected $attribute = [
    //     'gallery'
    // ];

    // public function getGalleryAttribute()
    // {
    //     return $this->getMedia("product.gallery");
    // }

    public function getCoverAttribute($value)
    {
        return $value ?? "/placeholder.webp";
    }

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
