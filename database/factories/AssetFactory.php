<?php

namespace Database\Factories;

use App\Models\AssetCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $AssetCategories = AssetCategory::pluck('id')->toArray();

        return [
            'user_id' => 1,
            'asset_name' => $this->faker->word(),
            'submission_status' => 0,
            'asset_categories_id' => $this->faker->randomElement($AssetCategories),
        ];
    }
}
