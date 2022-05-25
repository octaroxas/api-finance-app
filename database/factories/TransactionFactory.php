<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Wallet;
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
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['income', 'expense']),
            'description' => $this->faker->word(),
            'amount' => $this->faker->randomFloat(2),
            'date' => $this->faker->dateTimeBetween('-1 month'),
            'done' => $this->faker->boolean(),
            'category_id' => Category::all()->random(),
            'wallet_id' => Wallet::all()->random()
        ];
    }
}
