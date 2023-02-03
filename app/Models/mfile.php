<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mfile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['maintenance'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }
}
