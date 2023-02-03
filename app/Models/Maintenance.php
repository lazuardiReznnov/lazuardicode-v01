<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $with = ['unit'];
    protected $load = ['mfile', 'msparepart'];
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
}
