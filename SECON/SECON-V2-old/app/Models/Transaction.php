<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'type_id',
        'financial_institution_id',
        'payment_method_id',
        'value',
        'description',
        'category_id',
        'date'
    ];

    public const TYPE_INCOME = 1; // Receita
    public const TYPE_EXPENSE = 2; // Despesa

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function financialInstitution()
    {
        return $this->belongsTo(FinancialInstitution::class, 'financial_institution_id');
    }

    public function type()
    {
        return $this->belongsTo(TransactionType::class, 'type_id');
    }
}
