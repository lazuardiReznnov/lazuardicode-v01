<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Brand extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
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

    public function type()
    {
        return $this->hasMany(Type::class);
    }

    public function units(): HasManyThrough
    {
        return $this->hasManyThrough(type::class, Unit::class);
    }
}
