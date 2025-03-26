<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsTo, Model
};

class FinancialInstitution extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'financial_institutions';

    protected function casts(): array
    {
        return ['name' => 'encrypted'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
