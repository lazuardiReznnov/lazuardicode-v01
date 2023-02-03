<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msparepart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['maintenance', 'sparepart'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(sparepart::class);
    }
}
