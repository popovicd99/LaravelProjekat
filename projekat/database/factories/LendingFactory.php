<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $today = date("Y-m-d");
         
        return [
            'return_date'=>date('Y-m-d', strtotime($today. ' + 14 days')),
            'user_id'=>User::factory(),
            'book_id'=>Book::factory()
        ];
    }
}
