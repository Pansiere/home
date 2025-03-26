<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\FinancialInstitution;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => $this->faker->randomElement([1, 2]),
            'category_id' => null,
            'financial_institution_id' => null,
            'payment_method_id' => null,
            'value' => $this->faker->randomFloat(2, 10, 5000),
            'description' => $this->faker->sentence(6),
            'date' => $this->faker->date(),
        ];
    }
}
