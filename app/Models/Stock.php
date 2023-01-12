<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stock extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['sparepart', 'invStock'];

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

    public function invStock()
    {
        return $this->belongsTo(invStock::class);
    }
}
