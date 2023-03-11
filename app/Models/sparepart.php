<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sparepart extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $with = ['type', 'categoryPart'];
    protected $load = ['stock', 'msparepart'];

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

    public function categoryPart()
    {
        return $this->belongsTo(categoryPart::class);
    }

    public function type()
    {
        return $this->belongsTo(type::class);
    }

    public function stock()
    {
        return $this->hasMany(stock::class);
    }

    public function msparepart()
    {
        return $this->hasMany(Msparepart::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
