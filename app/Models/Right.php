<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Right extends Model
{
    use HasFactory;

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
