<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Banner extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'alt',
        'name',
        'path',
        'collection',
        'bannerable_type',
        'bannerable_id',
    ];

    public function bannerable()
    {
        return $this->morphTo();
    }
}
