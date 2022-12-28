<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class type extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['brand', 'category'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->hasMany(Unit::class);
    }
}
