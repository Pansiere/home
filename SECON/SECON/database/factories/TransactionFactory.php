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
            'user_id' => User::factory(),
            'type_id' => $this->faker->randomElement([1, 2]),
            'category_id' => function (array $attributes) {
                return Category::where('user_id', $attributes['user_id'])
                    ->inRandomOrder()
                    ->first()->id;
            },
            'financial_institution_id' => function (array $attributes) {
                return FinancialInstitution::where('user_id', $attributes['user_id'])
                    ->inRandomOrder()
                    ->first()->id;
            },
            'payment_method_id' => function (array $attributes) {
                return PaymentMethod::where('user_id', $attributes['user_id'])
                    ->inRandomOrder()
                    ->first()->id;
            },
            'value' => $this->faker->randomFloat(2, 10, 5000),
            'description' => $this->faker->sentence(4),
            'date' => $this->faker->date(),
        ];
    }
}
