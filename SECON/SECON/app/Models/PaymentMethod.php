<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsTo, Model
};

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'payment_methods';

    protected function casts(): array
    {
        return ['name' => 'encrypted'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
