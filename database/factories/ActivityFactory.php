<?php

namespace Database\Factories;

use App\Models\ActivityCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $activity_categories = ActivityCategory::pluck('id')->toArray();
        return [
            'user_id'=>1,
            'activity_name'=>$this->faker->word(),
            'description'=>$this->faker->sentence(5),
            'schedule_start'=>$this->faker->dateTimeThisMonth('+1 days'),
            'schedule_end'=>$this->faker->dateTimeThisMonth('+1 days'),
            'status'=>0,
            'submission_status'=>1,
            'activity_categories_id'=>$this->faker->randomElement($activity_categories),
        ];
    }
}
