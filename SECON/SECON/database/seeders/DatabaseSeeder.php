<?php

namespace Database\Seeders;

use App\Models\{User, Transaction};
use Illuminate\{Database\Seeder, Support\Facades\Hash};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()
            ->hasCategories(15)
            ->hasPaymentMethods(15)
            ->hasFinancialInstitutions(15)
            ->create([
                'name' => 'Test User',
                'email' => '2@2',
                'password' => Hash::make('123123123'),
            ]);
        $user->roles()->attach(1);

        Transaction::factory()
            ->count(15)
            ->create(['user_id' => $user->id]);
    }
}
