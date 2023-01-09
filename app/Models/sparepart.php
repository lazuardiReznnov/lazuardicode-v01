<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class sparepart extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $with = ['type', 'categoryPart'];

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
}
