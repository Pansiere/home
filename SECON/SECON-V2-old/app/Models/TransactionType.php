<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $table = 'transaction_type';

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'type_id');
    }
}
