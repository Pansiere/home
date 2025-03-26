<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\HasMany};

class TransactionType extends Model
{
    protected $table = 'transaction_type';

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
