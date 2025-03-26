<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\FinancialInstitution;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test',
            'password' => Hash::make('123123123'),
        ]);

        $transactions = Transaction::factory(50)->make();
        $categories = Category::factory(20)->for($user)->create();
        $paymentMethods = PaymentMethod::factory(20)->for($user)->create();
        $financialInstitutions = FinancialInstitution::factory(20)->for($user)->create();

        $transactions->each(function ($transaction) use ($user, $categories, $paymentMethods, $financialInstitutions) {
            $transaction->user_id = $user->id;
            $transaction->category_id = $categories->random()->id;
            $transaction->payment_method_id = $paymentMethods->random()->id;
            $transaction->financial_institution_id = $financialInstitutions->random()->id;
            $transaction->save();
        });;
    }
}
