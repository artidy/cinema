<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Right extends Model
{
    use HasFactory;

    public const READ = 'read';
    public const EDIT = 'edit';

    protected $fillable = [
        'title',
        'code',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
