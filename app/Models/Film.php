<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function genres(): HasMany
    {
        return $this->hasMany(Genre::class);
    }
}
