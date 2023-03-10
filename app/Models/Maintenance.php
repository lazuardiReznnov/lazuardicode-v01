<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{
    use HasFactory;

    protected $with = ['unit'];
    protected $load = ['mfile', 'mspareparts'];
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function unit()
    {
        return $this->BelongsTo(unit::class);
    }

    public function mfile()
    {
        return $this->hasMany(mfile::class);
    }

    public function mspareparts()
    {
        return $this->hasMany(Msparepart::class);
    }

    public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
