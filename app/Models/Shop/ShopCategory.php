<?php

namespace App\Models\Shop;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShopCategory extends Model
{
    use HasFactory;
    use Sluggable;


    /**
     * @var string
     */
    protected $table = 'shop_categories';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'is_visible',
    ];

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
        'is_visible' => 'boolean',
    ];

    public $allChildren = [];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_category_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function hasPost()
    {
        return $this->posts()->count() > 0;
    }

    public function categoryLink()
    {
        return ($this->isVIsible() and $this->is_visible) ? route('article.list', $this) : "javascript:void(0)";
    }

    public function hasChilde()
    {
        return $this->children->count() > 0;
    }

    public function isVIsible()
    {
        if ($this->hasPost()) {
            return true;
        }

        foreach ($this->children as  $child) {
            if ($child->hasPost()) {
                return true;
            }
            foreach ($child->children as $value) {
                if ($value->isVIsible()) {
                    return true;
                }
            }
        }
        return false;
    }

    public function childIsVisible()
    {
        foreach ($this->children as $child) {
            if ($child->isVIsible()) {
                return true;
            }
        }

        return false;
    }

    public function getChildrenIds(&$arr)
    {
        $children = $this->children;
        foreach ($children as $child) {
            if (count($child->children) > 0) {
                $arr[] = $child->id;
                $child->getChildrenIds($arr);
            } else
                array_push($arr, $child->id);
        }
    }

    public function tags($array = null)
    {
        $posts = $this->posts;
        $tags = [];

        foreach ($posts as  $post) {
            foreach ($post->tags->toArray() as $tag) {
                $tag['name'] = $tag['name']['fa'];
                array_push($tags, $array ? $tag['name'] : $tag);
            }
        }

        return $tags;
    }
}
