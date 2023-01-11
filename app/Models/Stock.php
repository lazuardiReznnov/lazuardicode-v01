<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Stock extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['sparepart', 'supplier'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function sparepart()
    {
        return $this->belongsTo(sparepart::class);
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }
}
