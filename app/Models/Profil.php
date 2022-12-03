<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $with = ['User'];

    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
