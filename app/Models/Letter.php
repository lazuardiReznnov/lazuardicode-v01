<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Letter extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['unit', 'categoryletter'];

    public function categoryLetter()
    {
        return $this->belongsTo(CategoryLetter::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'regNum',
            ],
        ];
    }
}
