<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Lending;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->words(rand(1,3),true),
            'description'=>$this->faker->sentences(rand(2,4),true),
            'author'=>$this->faker->name(),
            'category_id'=>Category::factory()
        ];
    }
}
