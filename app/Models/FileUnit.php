<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class FileUnit extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['unit'];

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

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
