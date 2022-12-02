<?php

namespace App\Models\Shop;

use App\Models\Shop\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_searchable',
        'values',
        'type',
        'attribute_group_id'
    ];

    protected $casts = [
        'values' => 'array'
    ];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'attribute_category_product',
            'attributes_id',
            'product_id',
        )
            ->withPivot(['value', 'category_id']);
    }
}
