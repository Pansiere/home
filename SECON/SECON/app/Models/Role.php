<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsToMany};

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
