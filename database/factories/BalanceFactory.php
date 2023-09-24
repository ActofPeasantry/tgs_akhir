<?php

namespace Database\Factories;

use App\Models\BalanceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Balance>
 */
class BalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category_id = BalanceCategory::pluck('id')->toArray();
        return [
            'description' => $this->faker->word(),
            'no_invoice' => $this->faker->randomDigit(),
            'date_received' => $this->faker->dateTimeBetween('-1 year'),
            'total_amount' => $this->faker->randomNumber(7, true),
            // 'debit_credit' => $this->faker->numberBetween(0,3),
            'balance_category_id' => $this->faker->randomElement($category_id),
            'user_id' => 1,
        ];
    }
}
