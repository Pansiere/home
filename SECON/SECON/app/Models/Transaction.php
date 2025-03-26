<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Factories\HasFactory, Relations\BelongsTo};

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'user_id', 'type_id', 'financial_institution_id',
        'payment_method_id', 'value', 'description', 'category_id','date'
    ];

    public const TYPE_INCOME = 1; // Receita
    public const TYPE_EXPENSE = 2; // Despesa

    protected function casts(): array
    {
        // may I add a cast 'encrypted' for the value?
        return [
            'date' => 'datetime',
            'description' => 'encrypted'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function financialInstitution(): BelongsTo
    {
        return $this->belongsTo(FinancialInstitution::class);
    }
}
