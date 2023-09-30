<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>1,
            'santri_name'=>$this->faker->name(),
            'tpq_grade'=>1,
            'birth_place'=>$this->faker->word(),
            'birth_date'=>$this->faker->dateTime(),
            'sex'=>$this->faker->numberBetween(1,2),
            'address'=>$this->faker->address(),
            'father_name'=>$this->faker->firstNameMale(),
            'mother_name'=>$this->faker->firstNameFemale(),
            'school_name'=>$this->faker->word(),
            'school_grade'=>$this->faker->numberBetween(0,7),
            'telp_number'=>$this->faker->phoneNumber(),
        ];
    }
}
